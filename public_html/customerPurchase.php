<?php

// Header file will use this to set the page title
$PageTitle="Select Items to Purchase";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/setSelectedStore.js" type="text/javascript"></script>
	<link rel="stylesheet" href="./css/styles.css" />
<?php }


// Header
include_once('./templates/header.php');
include_once('./inc/runDbQuery.php');

$storeId=$_POST['storeId'];

$result= runDbQuery("Select * From RetailStore where StoreId=$storeId");
while($row=$result->fetch_assoc())
{
	 $storeName = htmlspecialchars($row['StoreName']);
}
?>

<!-- Body Content Goes Here -->

<h2 align='center'><?php echo"$storeName";?><br>Select Items to Purhcase</h2>

<h3 align='center'>Enter Customer ID:</h3>

<form id='purchaseForm' name='purchaseForm' method='POST' action='processPurchase.php'>
	<input type="hidden" id="storeId" name="storeId" value=<?php echo"'$storeId'"; ?>>
	<center>
	<input type="text" id="customerId" name="customerId">
	</center>
	<table align='center'>

			<td colspan='4' bgcolor="#FFFFFF">
				<h3 align='center'>Select Items for Order:</h3>
			</td>
		</tr>
		<tr>
			<td bgcolor="#FFFFFF"><center><h4>Item Description</h4></center></td>
			<td bgcolor="#FFFFFF"><center><h4>Retail Price</label></h4></td>
			<td bgcolor="#FFFFFF"><center><h4>Quantity In Stock</h4></center></td>
			<td bgcolor="#FFFFFF"><center><h4>Amount To Order</label></h4></td>
		</tr>
		<?php 
		$result= runDbQuery("Select * From Inventory inner join InventoryItem On Inventory.ItemId=InventoryItem.ItemId Where Inventory.StoreId=$storeId");

		while($row=$result->fetch_assoc())
		{
			$description=htmlspecialchars($row['Description']);
			$retailPrice=htmlspecialchars($row['ItemRetail']);
			$quantityInStock=htmlspecialchars($row['QuantityInStock']);
			$itemId=htmlspecialchars($row['ItemId']);
			echo"
				<tr>
					<td><label>$description</label></td>
					<td><center><label>$retailPrice</label></center></td>
					<td><center><label>$quantityInStock</label></center></td>							
					<td><input name='$itemId' id='$itemId' type='number' value='0'></td>
					<td>
				</tr>
			";
		}
		?>
	</table>
	<table align = "center">
		<tr>	
			<td>
				<input type='submit' value='Place Order'>
				<input type='hidden' name='createOrderFlag' value='true'>
			</td>
			<td>
        		<!--<input type='button' name='cancel' id='cancel' value='Home (no changes)' onclick="index.php">-->
				<a href='./index.php' class='button'>Home</a>
			</td>
		</tr>
	</table>
</form>

<?php
// Footer
include_once('./templates/footer.php');