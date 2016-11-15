<?php

// Header file will use this to set the page title
$PageTitle="Select Vendor To Update";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/vendorFormValidator.js" type="text/javascript"></script>
	<script src="./js/setUpdatePasswordFlag.js" type="text/javascript"></script>
	
<?php }

// Header
include_once('./templates/header.php');

if(isset($_POST['vendorId']))
{
?>
	<?php
	// Get the vendor Id to search for database row
	$vendorId = $_POST['vendorId'];
	// Run the database script with the vendor ID to get the current values
	include_once('./dbScriptGetVendor.php');
	?>


	<h2 align='center'>Update a Vendor</h1>
	<h3 align='center'>Update Vendor Information:</h2>
		<form id='updateForm' name='updateForm' method='POST' action='dbScriptVendor.php' onsubmit='return validate();'>
			<table align='center'>
				<tr>
					<td>
						<input type='hidden' name='vendorId' value=
							<?php $disp=htmlspecialchars($vendorId); echo"'$disp'"; ?>>
					</td>

				</tr>
				<tr>
					<td><label>Vendor Code:</label></td>
					<td><?php $disp=htmlspecialchars($vcode); echo"$disp"; ?>
						<input type='hidden' id='vcode' name='vcode' value=
						<?php $disp=htmlspecialchars($vcode); echo"'$disp'"; ?>></td>
				</tr>
				<tr>
					<td><label>Vendor Name:</label></td>
					<td><input type='text' id='vname' name='vname' value=
						<?php $disp=htmlspecialchars($vname); echo"'$disp'"; ?>></td>
				</tr>
				<tr>
					<td><label>Address:</label></td>
					<td><input type='text' id='address' name='address' value=
						<?php $disp=htmlspecialchars($address); echo"'$disp'"; ?>></td>
				</tr>
				<tr>
					<td><label>City:</label></td>
					<td><input type='text' id='city' name='city' value=
						<?php $disp=htmlspecialchars($city); echo"'$disp'"; ?>></td>
				</tr>
				<tr>
					<td><label>State:</label></td>
					<td><input type='text' id='state' name='state' value=
						<?php $disp=htmlspecialchars($state); echo"'$disp'"; ?>></td>
				</tr>
				<tr>
					<td><label>ZIP:</label></td>
					<td><input type='text' id='zip' name='zip' value=
						<?php $disp=htmlspecialchars($zip); echo"'$disp'"; ?>></td>
				</tr>
				<tr>
					<td><label>Phone:</label></td>
					<td><input type='text' id='phone' name='phone' value=
						<?php $disp=htmlspecialchars($phone); echo"'$disp'"; ?>></td>
				</tr>
				<tr>
					<td><label>Contact Person:</label></td>
					<td><input type='text' id='contact' name='contact' value=
							<?php $disp=htmlspecialchars($contact); echo"'$disp'"; ?>></td>
				</tr>
				<tr>
					<td><label>Vendor Status:</label></td>
					<td><?php include_once('./inc/setVendorStatusOption.php'); ?>
					<input type='hidden' name='vstatus' id='vstatus'>
					</td>

				</tr>

				<tr>
					<td colspan='2'><hr></td></tr>
				<tr>
					
				<tr>
					<td><label><b>Update Password:</b></label></td>
					<td></td>
				</tr>
				<tr>
					<td><label>Current Password:</label></td>
					<td>
						<input type='password' id='userPwd' name='userPwd' onchange="setUpdatePasswordFlag();">
						<input type='hidden' id='updatePasswordFlag' name='updatePasswordFlag' value='false'>
					</td>
				</tr>
				<tr>
					<td><label>New Password:</label></td>
					<td><input type='password' id='newPwd' name='newPwd'></td>
				</tr>
				<tr>
					<td><label>Confirm New Password:</label></td>
					<td><input type='password' id='confirmNewPwd' name='confirmNewPwd'></td>
				</tr>
				<tr>
					<td><center><br><input type='submit' value='Submit Changes'></center></td>
					<td><center><br><a href='./index.php' class='button'>Go Back (no changes)</a></center></td>
				</tr>
			</table>
			<input name='updateVendorFlag' type='hidden' value='sent'>
		</form>
	<?php

	?>
<?php
}

else
{
	?>

	<link rel="stylesheet" href="./css/styles.css" />
	<?php

		echo "<b>Must select a vendor to update first.</b>";
	?>
		<table align="center">
	    <tr>
	        <td><a href='./index.php' class='button'>Home</a></td>
	        <td><a href='./addVendor.php' class='button'>Add A Vendor</a></td>
	        <td><a href='./selectVendorToUpdate.php' class='button'>Update A Vendor</a></td>
	    </tr>
	</table>
	<?php

}
	// Footer
	include_once('./templates/footer.php');
?>