<?php



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

		
	if(isset($_POST['SubmitCheck']) || isset($_POST['SubmitChangesCheck']))
	{
		if (isset($_POST['SubmitCheck']))
		{
		}
			
				if (isset($_POST['SubmitChangesCheck']))
		{	
			
			
			$CustomerId=($_POST['CustomerId']);
			$CustomerName=($_POST['CustomerName']);
			$Address=($_POST['Address']);
			$City=($_POST['City']);
			$State=($_POST['State']);
			$Zip=($_POST['Zip']);
			$Phone=($_POST['Phone']);
			$Email=($_POST['Email']);
			
			
			
			
			
			
			
			$CustomerId=htmlspecialchars($CustomerId);
			$CustomerName=htmlspecialchars($CustomerName);
			$Address=htmlspecialchars($Address);
			$City=htmlspecialchars($City);
			$State=htmlspecialchars($State);
			$Zip=htmlspecialchars($Zip);
			$Phone=htmlspecialchars($Phone);
			$Email=htmlspecialchars($Email);
			
			$addr = 'localhost';
			$user = 'wdean2';
			$pass = 'csc423?';
			$db = 'fal16_csc423_wdean2';
			
			$updateQuery= "Update Customer Set Name='$CustomerName', Address='$Address', City='$City',State='$State', ZIP='$Zip', Phone='$Phone', Email='$Email' Where CustomerId LIKE '$CustomerId'";
			
			$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
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
				<h2 align='center'>Update a Customer</h1>
				<h3 align='center'>Update Customer Information:</h2>
					<form id='updateForm' name='updateForm' method='POST' action='UpdateCustomer.php' onsubmit='validateTheDatas();'>
						<table align='center'>
							<tr><td colspan='2'><center><label><b>Customer ID: $CustomerId <input type='hidden' name='customerId' value=$CustomerId></b></center></label>															</td></tr>
							<!-----Customer Details----->
							<tr><td><label>Customer Id:</label>												</td>	<td><input type='text' id='customerId' name='CustomerId' value= $CustomerId>					</td></tr>		
							<tr><td><label>Customer Name:</label>												</td>	<td><input type='text' id='customerName' name='CustomerName' value='$CustomerName'>							</td></tr>
							<tr><td><label>Address:</label>													</td>	<td><input type='text' id='Address' name='Address' value='$Address'>										</td></tr>
							<tr><td><label>City:</label>													</td>	<td><input type='text' id='City' name='City' value=$City>												</td></tr>
							<tr><td><label>State:</label>													</td>	<td><input type='text' id='State' name='State' value=$State>											</td></tr>
							<tr><td><label>ZIP:</label>														</td>	<td><input type='text' id='Zip' name='Zip' value=$Zip>													</td></tr>
							<tr><td><label>Phone:</label>													</td>	<td><input type='text' id='Phone' name='Phone' value=$Phone>											</td></tr>
							<tr><td><label>Email:</label>											</td>	<td><input type='text' id='email' name='Email' value=$Email>		</td></tr>
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