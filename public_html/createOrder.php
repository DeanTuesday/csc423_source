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
<h2 align='center'>Create an Order</h2>

<h3 align='center'>Select a Store:</h3>
<form id='createOrderForm' name='createOrderForm' method='POST' action='dbScriptCreateOrder.php'>
	<table align='center'>
		<tr>
			<td colspan='2'>
				<center>
					<select id='vendorOptions'>";
		        		<option>Select store:</option>";
						<?php
						include_once('./dbScriptPopulateStores.php');
						?>
					</select>
				</center>
			</td>
			
		<tr>
			<td colspan='2'>
				<h3 align='center'>Select Items for Order:</h3>
			</td>
		</tr>
			<?php 
			// include db script for items for sale stores: include_once('dbScriptPopulateItems');
			?>
		<tr>	
			<td>
				<input type='submit' value='Create Order'>
				<input type='hidden' name='createOrderFlag' value='true'>
				<input name='vendorId' id='vendorId' type='hidden'>
			</td>
			<td>
				<input type='button' value='Go Back (no changes)'>
			</td>
		</tr>
	</table>
</form>

<?php
// Footer
include_once('./templates/footer.php');