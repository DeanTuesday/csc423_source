<?php

// Header file will use this to set the page title
$PageTitle="Select Vendor To Update";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/vendorFormValidator.js" type="text/javascript"></script>
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<form id='selectVendorForm' name='updateVendor' method='POST' action='dbScriptVendor.php' onsubmit='setSelectedVendor();'>
	<table align='center'>
		<tr>
			<td>
				<select id='vendorOptions'>
					<option>Select a Vendor</option>

					<input type="hidden" name="selectVendor">
					<?php
					include_once('./dbScriptVendor.php');
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