<?php

// Header file will use this to set the page title
$PageTitle="Nanno's Foods";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<link rel="stylesheet" href="./css/styles.css" />
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<h2>CSC 423 Team 2 - Nanno's Foods</h2>
<hr/>
<p>This website should currently implement functionality to register vendors, modify/delete vendors, add/modify/delete store locations, add/modify/delete stocked items, and add/modify/delete customers.</p>
<table class="indexTable">
	<tr>
		<td><a href='./selectStorePurchase.php' class='indexButton'>Customer <br> Purchase</a></td>
		<td><a href='./selectStoreInventory.php' class='indexButton'>View Store <br> Inventory</a></td>
	</tr>	
	<tr>
		<td><a href='./selectOrderVendor.php' class='indexButton'>Create An <br> Order</a></td>
		<td><a href='./viewOrderLogin.php' class='indexButton'>View An <br> Order</a></td>
		<td><a href='./selectOrderToAdd.php' class='indexButton'>Add Item to <br> Existing Order</a></td>
		<td><a href='./returnSelect.php' class='indexButton'>Return An <br> Item</a></td>
	</tr>	
	<tr>
		<td><a href='./addVendor.php' class='indexButton'>Add A <br> Vendor</a></td>
		<td><a href='./addItem.php' class='indexButton'>Add An <br> Item</a></td>
		<td><a href='./addLocation.php' class='indexButton'>Add A <br> Location</a></td>
		<td><a href='./addCustomer.php' class='indexButton'>Add A <br> Customer</a></td>
	</tr>
	<tr>
		<td><a href='./selectVendorToUpdate.php' class='indexButton'>Update A <br> Vendor</a></td>
		<td><a href='./selectItemToUpdate.php' class='indexButton'>Update An <br> Item</a></td>
		<td><a href='./selectLocationToUpdate.php' class='indexButton'>Update A <br> Location</a></td>
		<td><a href='./selectCustomerToUpdate.php' class='indexButton'>Update A <br> Customer</a></td>
	</tr>
	<!--<tr>
		<td><a href='./selectVendorToDelete.php' class='indexButton'>Delete A Vendor</a></td>//
		<td><a href='./selectItemToDelete.php' class='indexButton'>Delete An Item</a></td>
		<td><a href='./selectLocationToDelete.php' class='indexButton'>Delete A Location</a></td>
		<td><a href='./selectCustomerToDelete.php' class='indexButton'>Delete A Customer</a></td>
	</tr>-->
	<tr>
		<td><a href='./selectDeliveryToProcess.php' class='indexButton'>Process a <br> Delivery</a></td>
		<td><a href='./reportQuantityOverstocked.php' class='indexButton'>View Quantity <br> OverStocked</a></td>
	</tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
