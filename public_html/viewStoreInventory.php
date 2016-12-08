<?php
include_once('./inc/runDbQuery.php');

$storeId=$_POST['storeId'];
$result= runDbQuery("Select * From RetailStore where StoreId=$storeId");
while($row=$result->fetch_assoc())
{
	 $storeName = htmlspecialchars($row['StoreName']);
}
// Header file will use this to set the page title
$PageTitle="$storeName Inventory";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
    <script src="./js/vendorFormValidator.js" type="text/javascript" language="javascript"></script>

<?php }


// Header
include_once('./templates/header.php');
echo "<center><h2>Inventory for $storeName</h2></center>";
?>
<!-- Body Content Goes Here -->
<table align='center'>
	<tr>
		<td bgcolor="#FFFFFF"><center><h4>Item Description</h4></center></td>
		<td bgcolor="#FFFFFF"><center><h4>Retail Price</label></h4></td>
		<td bgcolor="#FFFFFF"><center><h4>Quantity In Stock</h4></center></td>
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
			</tr>
		";
	}
	?>
</table>
<table align="center">
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./selectStorePurchase.php' class='button'>Customer Purchase</a></td>
        <td><a href='./selectStoreInventory.php' class='button'>View Store Inventory</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
