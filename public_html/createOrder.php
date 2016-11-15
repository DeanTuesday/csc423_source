<?php

// Header file will use this to set the page title
$PageTitle="Select Vendor for Order";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/setSelectedVendor.js" type="text/javascript"></script>
<?php }


// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<h2 align='center'>Create an Order</h1>

<h3 align='center'>Select a Store:</h2>
<form id='selectVendorForm' name='updateVendor' method='POST' action='createOrder.php' onsubmit='setSelectedVendor();'>
	<table align='center'>
		<tr>
			<td>
				<select id='vendorOptions'>";
	        		<option>Select store:</option>";
					<?php
					// include db script for stores: include_once('dbScriptPopulateStores');
					?>
				</select>
			</td>
			<hr>
		<tr>
			<td>Complete Order Details:</td>
		</tr>
			<?php // include db script for items for sale stores: include_once('dbScriptPopulateItems');?>
			<td>
				<input type='submit' value='Go'>
				<input name='SubmitCheck' type='hidden' value='sent'>
				<input name='vendorId' id='vendorId' type='hidden'>
			</td>
		</tr>
	</table>
</form>

<?php
// Footer
include_once('./templates/footer.php');