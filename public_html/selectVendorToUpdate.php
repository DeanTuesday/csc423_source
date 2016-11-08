<?php

// Header file will use this to set the page title
$PageTitle="Select Vendor To Update";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/vendorFormValidator.js" type="text/javascript"></script>
	<script src="./js/setSelectedVendor.js" type="text/javascript"></script>
<?php }


// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<h2 align='center'>Update a Vendor</h1>

<h3 align='center'>Select a Vendor to Update:</h2>
<form id='selectVendorForm' name='updateVendor' method='POST' action='updateVendor.php' onsubmit='setSelectedVendor();'>
	<table align='center'>
		<tr>
			<td>
				<select id='vendorOptions'>";
	        		<option>Select a Vendor</option>";
					<?php
					include_once('./dbScriptPopulateVendors.php');
					?>
				</select>
			</td>
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
?>