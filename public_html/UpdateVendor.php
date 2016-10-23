<?php

	if(isset($_POST['SubmitCheck']))
	{
		$vendorId=($_POST['vendorId']);
		$vendorCode=($_POST['vendorId']);
		$vendorName=($_POST['vendorId']);
		$address=($_POST['vendorId']);
		$city=($_POST['vendorId']);
		$state=($_POST['vendorId']);
		$zip=($_POST['vendorId']);
		$phone=($_POST['vendorId']);
		$contactPersonName=($_POST['vendorId']);
		$password=($_POST['vendorId']);
		$newPassword=($_POST['vendorId']);
		$confirmPassword=($_POST['vendorId']);
	}
	else
	{
		$vendorId=0;
		$vendorCode="";
		$vendorName="";
		$address="";
		$city="";
		$state="";
		$zip="";
		$phone="";
		$contactPersonName="";
		$password="";
		$newPassword="";
		$confirmPassword="";
	};

echo "
<html>
	<head>
	<title>Update a Vendor</title>
	</head>
	<body>
		<h1 align='center'>Update a Vendor</h1>

		<h2 align='center'>Select a Vendor to Update:</h2>
			<form id='selectVendorForm' name='selectVendorForm' method='POST' action='UpdateVendor.php'>
			</form>
		<h2 align='center'>Update Vendor Information:</h2>
				<form id='updateForm' name='updateForm' method='POST' action='UpdateVendor.php'>
					<table align='center'>
						<tr><td colspan='2'> <center><label><b>Vendor ID: $vendorId <input type='hidden' name='vendorId' value=$vendorId></b></center></label>	</td></tr>
						<tr><td><label>Vendor Code:</label>											</td>	<td><input type='text' id='vendorCode' name='vendorCode' value=$vendorCode>				</td></tr>
						<tr><td><label>Vendor Name:</label>											</td>	<td><input type='text' id='vendorName' name='vendorName' value=$vendorName>				</td></tr>
						<tr><td><label>Address:</label>												</td>	<td><input type='text' id='address' name='address' value=$address>				</td></tr>
						<tr><td><label>City:</label>												</td>	<td><input type='text' id='city' name='city' value=$city>					</td></tr>
						<tr><td><label>State:</label>												</td>	<td><input type='text' id='state' name='state' value=$state>				</td></tr>
						<tr><td><label>ZIP:</label>													</td>	<td><input type='text' id='zip' name='zip' value=$zip>					</td></tr>
						<tr><td><label>Phone:</label>												</td>	<td><input type='text' id='phone' name='phone' value=$phone>					</td></tr>
						<tr><td><label>Contact Person:</label>										</td>	<td><input type='text' id='contactPersonName' name='contactPersonName' value=$contactPersonName>		</td></tr>
						<tr><td colspan='2'><hr>																												</td></tr>
						<tr><tr><td><label><b>Update Password:</b></label>							</td>	<td>												</td></tr>
						<tr><td><label>Current Password:</label>									</td>	<td><input type='password' id='password' name='password'>			</td></tr>
						<tr><td><label>New Password:</label>										</td>	<td><input type='password' id='newPassword' name='newPassword'>		</td></tr>
						<tr><td><label>Confirm New Password:</label>								</td>	<td><input type='password' id='confirmNewPassword' name='confirmNewPassword'>	</td></tr>
						<tr><td><center><br><input type='submit' value='Submit Changes'></center>	</td>	<td><center><br><input type='button' value='Undo Changes'></center></td></tr>
					</table>
					<input name='SubmitCheck' type='hidden' value='sent'>
				</form>

	</body>
</html>
";
		if(isset($_POST['SubmitCheck']))
		{
			echo "Vendor Updated!";
		};


?>