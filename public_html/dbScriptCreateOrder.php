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
	$storeId=$_POST['storeId'];
	$month = date('m');
	$day = date('d');
	$year = date('Y');
	$t = $month.$day.$year;

    $sql = "INSERT INTO `Order`(`VendorId`, `StoreId`, `DateTimeOfOrder`, `Status`, `DateTimeOfFulfillment`) VALUES ($vendorId, $storeId, $t, 'Pending', 000000);";

    $orderId = runDbInsertQuery($sql);

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

		    $sql = "INSERT INTO `OrderDetail` (`OrderId` , `ItemId`, `QuantityOrdered` ) VALUES ($orderId, $itemId, $quantityOrdered)";
			$insertId=runDbInsertQuery($sql);

			echo"$description : $quantityOrdered : ".htmlspecialchars('$')."$itemCost<br>";
			$total = $total + ($quantityOrdered * $itemCost);
		}
	}

    echo"Order ID is $orderId<br>";
    echo"Order total is: ".htmlspecialchars('$')."$total.<br>";
    echo"<br>Order successfully created! You may view this order at any time.<br>";
    ?>
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
