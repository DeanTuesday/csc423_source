<?php


	//Connect to the database and get the info

	$vendorId=($_POST['vendorId']);
	
	$addr = 'localhost';
	$user = 'wdean2';
	$pass = 'csc423?';
	$db = 'fal16_csc423_wdean2';

	$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
	echo("Connected to Database<br>");
	$query = "Select VendorCode, VendorName, Address, City, State, ZIP, Phone, ContactPersonName, Password from Vendor Where VendorId=$vendorId";
	$result = $db->query($query);

	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$vCode = $row["VendorCode"];
			$vName = $row["VendorName"];
			$vAddress = $row["Address"];
			$vCity = $row["City"];
			$vState = $row["State"];
			$vZip = $row["ZIP"];
			$vPhone = $row["Phone"];
			$vContact = $row["ContactPersonName"];
			$vPass = $row["Password"];

			$vendorCode=htmlspecialchars($vCode);
			$vendorName=htmlspecialchars($vName);
			$address=htmlspecialchars($vAddress);
			$city=htmlspecialchars($vCity);
			$state=htmlspecialchars($vState);
			$zip=htmlspecialchars($vZip);
			$phone=htmlspecialchars($vPhone);
			$contactPersonName=htmlspecialchars($vContact);
		}
	}
	else
	{
	    echo "0 results";
	}

	$db->close();

	//Check to see if there was an attempt to change the password
	if(isset($_POST['newPwd']) && $_POST['newPwd'] != '')
	{
		//validate the new password by checking current password and new password confirmation
		//if the data is not valid, then echo password error then terminate
		if($_POST['userPwd'] != $vPass)
		{
			echo('<br>Please enter a password to change your password<br>');
			die;
		}
		else if($_POST['newPwd'] != $_POST['confirmNewPwd'])
		{
			echo('<br>Confirmation password does not match<br>');
			die;
		}
	}

	if(isset($_POST['SubmitCheck']) || isset($_POST['SubmitChangesCheck']))
	{
		if (isset($_POST['SubmitCheck']))
		{

		}
		if (isset($_POST['SubmitChangesCheck']))
		{



			$vendorId=($_POST['vendorId']);
			$vendorCode=($_POST['vendorCode']);
			$vendorName=($_POST['vendorName']);
			$address=($_POST['address']);
			$city=($_POST['city']);
			$state=($_POST['state']);
			$zip=($_POST['zip']);
			$phone=($_POST['phone']);
			$contactPersonName=($_POST['contactPersonName']);

		//	$vendorPassword=($_POST['password']);
		//	$vendorNewPassword=($_POST['newPassword']);
		//	$vendorConfirmNewPassword=($_POST['confirmNewPassword']);
			
			$addr = 'localhost';
			$user = 'wdean2';
			$pass = 'csc423?';
			$db = 'fal16_csc423_wdean2';
			
			if (isset($_POST['newPwd']) && $_POST['newPwd'] != '')
			{
				$newPassword=($_POST['newPwd']);
				$updateQuery= "Update Vendor Set VendorCode='$vendorCode', VendorName='$vendorName', Address='$address', City='$city', State='$state', ZIP='$zip', Phone='$phone', ContactPersonName='$contactPersonName', Password='$newPassword' Where VendorId=$vendorId";
			}
			else
			{
				$updateQuery= "Update Vendor Set VendorCode='$vendorCode', VendorName='$vendorName', Address='$address', City='$city', State='$state', ZIP='$zip', Phone='$phone', ContactPersonName='$contactPersonName' Where VendorId=$vendorId";
			}

			$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
			
		//	echo("Connected to Database<br>");

			if ($db->query($updateQuery) === TRUE)
			{
			    echo "Record updated successfully";
			}
			else
			{
			    echo "Error updating record: " . $db->error;
			}

			$db->close();


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

		<script type='text/javascript' language='javascript'>

		function validateTheDatas()
		{

		}

		</script>

		</head>";	


		echo "
			<body>
				<h2 align='center'>Update a Vendor</h1>
				<h3 align='center'>Update Vendor Information:</h2>
					<form id='updateForm' name='updateForm' method='POST' action='UpdateVendor.php' onsubmit='validateTheDatas();'>
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
							<tr><td><label>Current Password:</label>										</td>	<td><input type='password' id='userPwd' name='userPwd'>												</td></tr>
							<tr><td><label>New Password:</label>											</td>	<td><input type='password' id='newPwd' name='newPwd'>											</td></tr>
							<tr><td><label>Confirm New Password:</label>									</td>	<td><input type='password' id='confirmNewPwd' name='confirmNewPwd'>							</td></tr>
								<tr><td><center><br><input type='submit' value='Submit Changes'></center>		</td>	<td><center><br><input type='button' value='Undo Changes'></center>		</td></tr>
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