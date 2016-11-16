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
	while($row = $result->fetch_assoc())
	{
		$itemId = $row["ItemId"];
		if(isset($_POST["$itemId"]) && $_POST["$itemId"] != 0)
		{
			echo "hi";
		}
	}

    echo"Order created successfully!";
}
    
?>
<!-- Body Content Goes Here -->
<table align="center">
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./addVendor.php' class='button'>Create an Order</a></td>
        <td><a href='./selectVendorToUpdate.php' class='button'>View an Order</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
