<?php

	if(isset($_POST['SubmitCheck']) || isset($_POST['SubmitChangesCheck']))
	{
		if (isset($_POST['SubmitCheck']))
		{
			$storeId=($_POST['storeId']);
			
			$addr = 'csdb.brockport.edu';
			$user = 'wdean2';
			$pass = 'csc423?';
			$db = 'fal16_csc423_wdean2';

			$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
			echo("Connected to Database<br>");
			$query = "Select StoreCode, StoreName, Address, City, State, ZIP, Phone, ManagerName from RetailStore Where StoreId=$storeId";
			$result = $db->query($query);
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					$sCode = $row["StoreCode"];
					$sName = $row["StoreName"];
					$sAddress = $row["Address"];
					$sCity = $row["City"];
					$sState = $row["State"];
					$sZip = $row["ZIP"];
					$sPhone = $row["Phone"];
					$sContact = $row["ManagerName"];

					$storeCode=htmlspecialchars($sCode);
					$storeName=htmlspecialchars($sName);
					$address=htmlspecialchars($sAddress);
					$city=htmlspecialchars($sCity);
					$state=htmlspecialchars($sState);
					$zip=htmlspecialchars($sZip);
					$phone=htmlspecialchars($sPhone);
					$managerName=htmlspecialchars($sManager);
				}
			}
			else
			{
			    echo "0 results";
			}

			$db->close();

			//$vendorId=htmlspecialchars(($_POST['storeId']));
			
			/*
			$storeCode="";
			$storeName="";
			$address="";
			$city="";
			$state="";
			$zip="";
			$phone="";
			$managerName="";
			*/

		}

		if (isset($_POST['SubmitChangesCheck']))
		{
			$storeId=htmlspecialchars(($_POST['storeId']));
			$storeCode=htmlspecialchars(($_POST['storeCode']));
			$storeName=htmlspecialchars(($_POST['storeName']));
			$address=htmlspecialchars(($_POST['address']));
			$city=htmlspecialchars(($_POST['city']));
			$state=htmlspecialchars(($_POST['state']));
			$zip=htmlspecialchars(($_POST['zip']));
			$phone=htmlspecialchars(($_POST['phone']));
			$managerName=htmlspecialchars(($_POST['managerName']));
		}

		echo "
		<html>
			<head>
			<title>Update a Location</title>
			</head>
			<body>
				<h2 align='center'>Update Store Location</h1>
				<h3 align='center'>Update Store Location Information:</h2>
					<form id='updateForm' name='updateForm' method='POST' action='updateLocation.php'>
						<table align='center'>
							<tr><td colspan='2'><center><label><b>Store ID: $storeId <input type='hidden' name='storeId' value=$storeId></b></center></label> </td></tr>
							<!-----Store Details----->
							<tr><td><label>Store Code:</label>	</td>	<td><input type='text' id='storeCode' name='storeCode' value=". "'$storeCode'" . ">	</td></tr>
							<tr><td><label>Store Name:</label>	</td>	<td><input type='text' id='storeName' name='storeName' value='$storeName'>			</td></tr>
							<tr><td><label>Address:</label>		</td>	<td><input type='text' id='address' name='address' value=$address>						</td></tr>
							<tr><td><label>City:</label>		</td>	<td><input type='text' id='city' name='city' value=$city>								</td></tr>
							<tr><td><label>State:</label>		</td>	<td><input type='text' id='state' name='state' value=$state>							</td></tr>
							<tr><td><label>ZIP:</label>			</td>	<td><input type='text' id='zip' name='zip' value=$zip>									</td></tr>
							<tr><td><label>Phone:</label>				</td>	<td><input type='text' id='phone' name='phone' value=$phone>					    </td></tr>
							<tr><td><label>Managers Name:</label>		</td>	<td><input type='text' id='managerName' name='managerName' value=$managerName>		</td></tr>
							<tr><td colspan='2'><hr>																										        </td></tr>
							<tr><td><center><br><input type='submit' value='Submit Changes' </center>	</td>	<td><center><br><input type='button' value='Undo Changes'></center>	</td></tr>
							</table>
							<input name='SubmitChangesCheck' type='hidden' value='sent'>
						</form>
				</body>
			</html>";

		if(isset($_POST['SubmitChangesCheck']))
		{
			echo "Store Location Updated!";
		};

	}
	else
	{
		echo "Sorry, there was an error!";
	};
?>