<?php


	if(isset($_POST['SubmitCheck']) || isset($_POST['SubmitChangesCheck']))
	{
		if (isset($_POST['SubmitCheck']))
		{
			$customerId=($_POST['customerId']);
			
			$addr = 'localhost';
			$user = 'wdean2';
			$pass = 'csc423?';
			$db = 'fal16_csc423_wdean2';

			$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
			echo("Connected to Database<br>");
			$query = "Select CustomerId, Name, Address, City, State, ZIP, Phone, Email from Customer Where CustomerId=$customerId";
			$result = $db->query($query);
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$cId = $row["CustomerId"];
					$cName = $row["Name"];
					$cAddress = $row["Address"];
					$cCity = $row["City"];
					$cState = $row["State"];
					$cZip = $row["ZIP"];
					$cPhone = $row["Phone"];
					$cContact = $row["Email"];
					

					$customerId=htmlspecialchars($cId);
					$customerName=htmlspecialchars($cName);
					$address=htmlspecialchars($cAddress);
					$city=htmlspecialchars($cCity);
					$state=htmlspecialchars($cState);
					$zip=htmlspecialchars($cZip);
					$phone=htmlspecialchars($cPhone);
					$email=htmlspecialchars($cContact);
					
				}
			}
			else
			{
			    echo "0 results";
			}

			$db->close();

			//$vendorId=htmlspecialchars(($_POST['vendorId']));
			
			/*
			$vendorCode="";
			$vendorName="";
			$address="";
			$city="";
			$state="";
			$zip="";
			$phone="";
			$contactPersonName="";
			*/

		}

		if (isset($_POST['SubmitChangesCheck']))
		{
			$customerId=htmlspecialchars(($_POST['customerId']));
			
			$customerName=htmlspecialchars(($_POST['customerName']));
			$address=htmlspecialchars(($_POST['address']));
			$city=htmlspecialchars(($_POST['city']));
			$state=htmlspecialchars(($_POST['state']));
			$zip=htmlspecialchars(($_POST['zip']));
			$phone=htmlspecialchars(($_POST['phone']));
			$email=htmlspecialchars(($_POST['email']));
			
		}

			
		/*
		$password=($_POST['password']);
		$newPassword=($_POST['newPassword']);
		$confirmPassword=($_POST['confirmPassword']);
		*/

		echo"
			<html>
			<head>
			<title>Update a Customer</title>

			<script type='text/javascript' language='javascript'>

			function confirmNewPassword()
			{
				/*
				var userPass = document.getElementById('password').value;
				var newPass = document.getElementById('newPassword').value;
				var confirmNewPass = document.getElementById('confirmNewPassword').value;

				if(userPass== '' && newPass == '' && confirmNewPass == '')
				{
					return true;
				}

				else if(userPass != $vPassword)
				{
					alert('Enter your current password to change your password.');
					return false;
				}
				else if(newPass != confirmNewPass)
				{
					alert('New password does not match confirmation field.');
				}
				*\
			}
			</script>
			</head>
			";	


		echo "
			<body>
				<h2 align='center'>Update a Customer</h1>
				<h3 align='center'>Update Customer Information:</h2>
					<form id='updateForm' name='updateForm' method='POST' action='UpdateCustomer.php'>
						<table align='center'>
							<tr><td colspan='2'><center><label><b>Customer ID: $customerId <input type='hidden' name='customerId' value=$customerId></b></center></label>															</td></tr>
							<!-----Customer Details----->
												
							<tr><td><label>Customer Name:</label>												</td>	<td><input type='text' id='customerName' name='customerName' value='$cName'>							</td></tr>
							<tr><td><label>Address:</label>													</td>	<td><input type='text' id='address' name='address' value=$address>										</td></tr>
							<tr><td><label>City:</label>													</td>	<td><input type='text' id='city' name='city' value=$city>												</td></tr>
							<tr><td><label>State:</label>													</td>	<td><input type='text' id='state' name='state' value=$state>											</td></tr>
							<tr><td><label>ZIP:</label>														</td>	<td><input type='text' id='zip' name='zip' value=$zip>													</td></tr>
							<tr><td><label>Phone:</label>													</td>	<td><input type='text' id='phone' name='phone' value=$phone>											</td></tr>
							<tr><td><label>Email:</label>											</td>	<td><input type='text' id='email' name='email' value=$email>		</td></tr>
																																																	</td></tr>

								<tr><td><center><br><input type='submit' value='Submit Changes' onsubmit='confirmNewPassword();'></center>		</td>	<td><center><br><input type='button' value='Undo Changes'></center>		</td></tr>
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