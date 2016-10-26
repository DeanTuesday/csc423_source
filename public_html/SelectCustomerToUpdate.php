<?php
echo "
<html>
	<head>
	<title>Update a Customer</title>
		<script type='text/javascript' language='javascript'>
		function setSelectedCustomer()
		{
			var selectedCustomer =	document.getElementById('customerOptions');   

			document.getElementById('CustomerId').value = selectedCustomer.options[selectedCustomer.selectedIndex].value;
		}

		function addOptionToCustomers(text, value)
		{
			ddl = document.getELementById('CustomerOptions');
			var option = document.createElement('option');
			option.value = value;
			option.text = text;
			ddl.options.add(option);	
		}

		</script>
	</head>
	<body>
		<h2 align='center'>Update a Customer</h1>

		<h3 align='center'>Select a Customer to Update:</h2>
			<form id='selectCustomerForm' name='selectCustomerForm' method='POST' action='UpdateCustomer.php' onsubmit='setSelectedCustomer();'>
				<table align='center'>
					<tr>
						<td>
							<select id='customerOptions'>
								<option>Select a Customer</option>
								";

								$addr = 'localhost';
								$user = 'wdean2';
								$pass = 'csc423?';
								$db = 'fal16_csc423_wdean2';

								$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
								echo("Connected to Database<br>");

								$query = "Select * from Customer";
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
					                $cEmail = $row["Email"];

										echo"<option value='$cId'> $cName -$cPhone</option>";
									}
								}
								else
								{
								    echo "0 results";
								}

								$db->close();
							echo
								"
							</select>
						</td>
						<td>
							<input type='submit' value='Go'>
							<input name='SubmitCheck' type='hidden' value='sent'>
							<input name='CustomerId' id='CustomerId' type='hidden'>
							<input name='CustomerName' id='CustomerName' type='hidden'>
						</td>
					</tr>
				</table>
			</form>
		<body>
</html>
";
?>