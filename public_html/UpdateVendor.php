<?php
	if(isset($_POST['SubmitCheck']) || isset($_POST['SubmitChangesCheck']))
	{
		if (isset($_POST['SubmitCheck']))
		{

			$vendorId=htmlspecialchars(($_POST['vendorId']));
			$vendorCode="";
			$vendorName="";
			$address="";
			$city="";
			$state="";
			$zip="";
			$phone="";
			$contactPersonName="";
		
		}

		if (isset($_POST['SubmitChangesCheck']))
		{
			$vendorId=htmlspecialchars(($_POST['vendorId']));
			$vendorCode=htmlspecialchars(($_POST['vendorCode']));
			$vendorName=htmlspecialchars(($_POST['vendorName']));
			$address=htmlspecialchars(($_POST['address']));
			$city=htmlspecialchars(($_POST['city']));
			$state=htmlspecialchars(($_POST['state']));
			$zip=htmlspecialchars(($_POST['zip']));
			$phone=htmlspecialchars(($_POST['phone']));
			$contactPersonName=htmlspecialchars(($_POST['contactPersonName']));
		}

			
		/*
		$password=($_POST['password']);
		$newPassword=($_POST['newPassword']);
		$confirmPassword=($_POST['confirmPassword']);
		*/

		echo "
			<html>
				<head>
				<title>Update a Vendor</title>
				</head>
				<body>
					<h2 align='center'>Update a Vendor</h1>

					<h3 align='center'>Update Vendor Information:</h2>
						<form id='updateForm' name='updateForm' method='POST' action='UpdateVendor.php'>
							<table align='center'>
								<tr><td colspan='2'><center><label><b>Vendor ID: $vendorId <input type='hidden' name='vendorId' value=$vendorId></b></center></label>															</td></tr>
								<!-----Vendor Details----->
								<tr><td><label>Vendor Code:</label>												</td>	<td><input type='text' id='vendorCode' name='vendorCode' value=". "'$vendorCode'" . ">					</td></tr>
								<tr><td><label>Vendor Name:</label>												</td>	<td><input type='text' id='vendorName' name='vendorName' value='$vendorName'>							</td></tr>
								<tr><td><label>Address:</label>													</td>	<td><input type='text' id='address' name='address' value=$address>										</td></tr>
								<tr><td><label>City:</label>													</td>	<td><input type='text' id='city' name='city' value=$city>												</td></tr>
								<tr><td><label>State:</label>													</td>	<td><input type='text' id='state' name='state' value=$state>											</td></tr>
								<tr><td><label>ZIP:</label>														</td>	<td><input type='text' id='zip' name='zip' value=$zip>													</td></tr>
								<tr><td><label>Phone:</label>													</td>	<td><input type='text' id='phone' name='phone' value=$phone>											</td></tr>
								<tr><td><label>Contact Person:</label>											</td>	<td><input type='text' id='contactPersonName' name='contactPersonName' value=$contactPersonName>		</td></tr>
								<tr><td colspan='2'><hr>																																										</td></tr>
								<!-----Password Details----->
								<tr><tr><td><label><b>Update Password:</b></label>								</td>	<td>																									</td></tr>
								<tr><td><label>Current Password:</label>										</td>	<td><input type='password' id='password' name='password'>												</td></tr>
								<tr><td><label>New Password:</label>											</td>	<td><input type='password' id='newPassword' name='newPassword'>											</td></tr>
								<tr><td><label>Confirm New Password:</label>									</td>	<td><input type='password' id='confirmNewPassword' name='confirmNewPassword'>							</td></tr>
								<tr><td><center><br><input type='submit' value='Submit Changes'></center>		</td>	<td><center><br><input type='button' value='Undo Changes'></center>										</td></tr>
							</table>

							<input name='SubmitChangesCheck' type='hidden' value='sent'>
						</form>
				</body>
			</html>
			";

		if(isset($_POST['SubmitChangesCheck']))
		{
			echo "Vendor Updated!";
		};

	}
	else
	{
		echo "Sorry mate, that's an error!";
	};
?>