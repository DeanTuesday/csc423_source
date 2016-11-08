<?php


	//Connect to the database and get the info

	$vendorId=($_POST['vendorId']);
	
	$addr = 'localhost';
	$user = 'wdean2';
	$pass = 'csc423?';
	$db = 'fal16_csc423_wdean2';

	$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
	echo("Connected to Database<br>");
	$query = "Select VendorCode, VendorName, Address, City, State, ZIP, Phone, ContactPersonName, Status, Password from Vendor Where VendorId=$vendorId";
	$result = $db->query($query);

	if($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc())
		{
			$vendorCode = $row["VendorCode"];
			$vendorName = $row["VendorName"];
			$vendorAddress = $row["Address"];
			$vendorCity = $row["City"];
			$vendorState = $row["State"];
			$vendorZip = $row["ZIP"];
			$vPhone = $row["Phone"];
			$vContact = $row["ContactPersonName"];
			$vendorStatus = $row["Status"];
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
			$status=($_POST['vStatus']);

			$vendorCode=htmlspecialchars($vendorCode);
			$vendorName=htmlspecialchars($vendorName);
			$address=htmlspecialchars($address);
			$city=htmlspecialchars($city);
			$state=htmlspecialchars($state);
			$zip=htmlspecialchars($zip);
			$phone=htmlspecialchars($phone);
			$contactPersonName=htmlspecialchars($contactPersonName);

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
				$updateQuery= "Update Vendor Set VendorCode='$vendorCode', VendorName='$vendorName', Address='$address', City='$city', State='$state', ZIP='$zip', Phone='$phone', ContactPersonName='$contactPersonName', Password='$newPassword', Status='$status' Where VendorId=$vendorId";
			}
			else
			{
				$updateQuery= "Update Vendor Set VendorCode='$vendorCode', VendorName='$vendorName', Address='$address', City='$city', State='$state', ZIP='$zip', Phone='$phone', ContactPersonName='$contactPersonName', Status='$status' Where VendorId=$vendorId";
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
/*
		echo "
		<html>
		<head>
		<title>Update a Vendor</title>

		<script type='text/javascript' language='javascript'>

		function validateTheDatas()
		{

			setSelectedStatus();
			
			return true;
		}

		function setSelectedStatus()
		{
			var selectedStatus=	document.getElementById('statusOptions');   

			document.getElementById('vStatus').value = selectedStatus.options[selectedStatus.selectedIndex].value;
		}
			
		</script>

		</head>";	


		echo "
			<body>
				

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
*/