<?php

// Header file will use this to set the page title
$PageTitle="Add Vendor to DB";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
<?php }

// Header
include_once('./templates/header.php');
include_once('./inc/runDbQuery.php');

// Run the DB script and echo any errors to the screen so we can debug
if(isset($_POST['createOrderFlag']))
{
	$vendorId=$_POST['vendorId'];
	//$storeId=$_POST['storeId'];

	//$result = runDbQuery("");

	$result = runDbQuery("Select * From InventoryItem Where VendorId=$vendorId");
	$total=0;
	while($row = $result->fetch_assoc())
	{
		$itemId = $row["ItemId"];
		$description = $row["Description"];
		$itemCost = $row["ItemCost"];
		if(isset($_POST["$itemId"]) && $_POST["$itemId"] != 0)
		{
			$quantityOrdered=$_POST["$itemId"];
			echo"$description : $quantityOrdered : ".htmlspecialchars('$')."$itemCost<br>";
			$total = $total + ($quantityOrdered * $itemCost);
		}
	}

    echo"<br>Order successfully created! You may view this order at any time.<br>";
    echo"Order total is: $total.<br>Press the button if you are ready to place order for delivery:<br>";
    ?>
    <input type="button" value="Confirm For Delivery.">
    <?php

}
    
?>
<!-- Body Content Goes Here -->
<br>
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./selectOrderVendor.php' class='button'>Create an Order</a></td>
        <td><a href='./selectVendorToUpdate.php' class='button'>View an Order</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
