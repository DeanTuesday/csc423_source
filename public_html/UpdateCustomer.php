<?php


	if(isset($_POST['SubmitCheck']) || isset($_POST['SubmitChangesCheck']))
	{
		if (isset($_POST['SubmitCheck']))
		{
			$CustomerId=($_POST["CustomerId"]);
			
			
			$addr = 'localhost';
			$user = 'wdean2';
			$pass = 'csc423?';
			$db = 'fal16_csc423_wdean2';

			$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
			echo("Connected to Database<br>");
			$query = "Select Name, Address, City, State, ZIP, Phone, Email from Customer Where CustomerId LIKE '$CustomerId'";
            $result = $db->query($query);
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
				
					$cName = $row["Name"];
					$cAddress = $row["Address"];
					$cCity = $row["City"];
					$cState = $row["State"];
					$cZip = $row["ZIP"];
					$cPhone = $row["Phone"];
					$cEmail = $row["Email"];
					

				
					$CustomerName=htmlspecialchars($cName);
					$Address=htmlspecialchars($cAddress);
					$City=htmlspecialchars($cCity);
					$State=htmlspecialchars($cState);
					$Zip=htmlspecialchars($cZip);
					$Phone=htmlspecialchars($cPhone);
					$Email=htmlspecialchars($cEmail);
					
				}
			}
			else
			{
			    echo "0 results";
			}

			$db->close();

		}

		if (isset($_POST['SubmitChangesCheck']))
		{
			$CustomerId=htmlspecialchars(($_POST['CustomerId']));
			$CustomerName=htmlspecialchars(($_POST['CustomerName']));
			$Address=htmlspecialchars(($_POST['Address']));
			$City=htmlspecialchars(($_POST['City']));
			$State=htmlspecialchars(($_POST['State']));
			$Zip=htmlspecialchars(($_POST['Zip']));
			$Phone=htmlspecialchars(($_POST['Phone']));
			$Email=htmlspecialchars(($_POST['Email']));
			
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


			
			</head>
			";	


		echo "
			<body>
				<h2 align='center'>Update a Customer</h1>
				<h3 align='center'>Update Customer Information:</h2>
					<form id='updateForm' name='updateForm' method='POST' action='UpdateCustomer.php'>
						<table align='center'>
							<tr><td colspan='2'><center><label><b>Customer ID: $CustomerId <input type='hidden' name='customerId' value=$CustomerId></b></center></label>															</td></tr>
							<!-----Customer Details----->
							<tr><td><label>Customer Id:</label>												</td>	<td><input type='text' id='customerId' name='customerId' value= $CustomerId>					</td></tr>		
							<tr><td><label>Customer Name:</label>												</td>	<td><input type='text' id='customerName' name='customerName' value='$CustomerName'>							</td></tr>
							<tr><td><label>Address:</label>													</td>	<td><input type='text' id='address' name='address' value='$Address'>										</td></tr>
							<tr><td><label>City:</label>													</td>	<td><input type='text' id='city' name='city' value=$City>												</td></tr>
							<tr><td><label>State:</label>													</td>	<td><input type='text' id='state' name='state' value=$State>											</td></tr>
							<tr><td><label>ZIP:</label>														</td>	<td><input type='text' id='zip' name='zip' value=$Zip>													</td></tr>
							<tr><td><label>Phone:</label>													</td>	<td><input type='text' id='phone' name='phone' value=$Phone>											</td></tr>
							<tr><td><label>Email:</label>											</td>	<td><input type='text' id='email' name='email' value=$Email>		</td></tr>
																																																	</td></tr>

								<tr><td><center><br><input type='submit' value='Submit Changes' ></center>		</td>	<td><center><br><input type='button' value='Undo Changes'></center>		</td></tr>
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