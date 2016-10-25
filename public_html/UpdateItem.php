<?php


	if(isset($_POST['SubmitCheck']) || isset($_POST['SubmitChangesCheck']))
	{
		if (isset($_POST['SubmitCheck']))
		{
			$ItemId=($_POST['ItemId']);
			
			$addr = 'localhost';
			$user = 'wdean2';
			$pass = 'csc423?';
			$db = 'fal16_csc423_wdean2';

			$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
			echo("Connected to Database<br>");
			$query = "Select Description, Size from InventoryItem Where ItemId=$ItemId";
			$result = $db->query($query);
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					//$iid = $row["ItemId"];
					$vDescription = $row["Description"];
					$vSize = $row["Size"];
					/*$vCity = $row["City"];
					$vState = $row["State"];
					$vZip = $row["ZIP"];
					$vPhone = $row["Phone"];
					$vContact = $row["ContactPersonName"];
					$vPassword = $row["Password"];
*/
					//$itemCode=htmlspecialchars($iCode);
					$description=htmlspecialchars($vDescription);
					$size=htmlspecialchars($vSize);
					/*$city=htmlspecialchars($vCity);
					$state=htmlspecialchars($vState);
					$zip=htmlspecialchars($vZip);
					$phone=htmlspecialchars($vPhone);
					$contactPersonName=htmlspecialchars($vContact);
					$vendorPassword=htmlspecialchars($vPassword);
					*/
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
			$ItemId=htmlspecialchars(($_POST['ItemId']));
			$description=htmlspecialchars(($_POST['Description']));
			$size=htmlspecialchars(($_POST['Size']));
			/*$address=htmlspecialchars(($_POST['address']));
			$city=htmlspecialchars(($_POST['city']));
			$state=htmlspecialchars(($_POST['state']));
			$zip=htmlspecialchars(($_POST['zip']));
			$phone=htmlspecialchars(($_POST['phone']));
			$contactPersonName=htmlspecialchars(($_POST['contactPersonName']));
			$vendorPassword=htmlspecialchars(($_POST['password']));
			$vendorNewPassword=htmlspecialchars(($_POST['newPassword']));
			$vendorConfirmNewPassword=htmlspecialchars(($_POST['confirmNewPassword']));

			$vPassword = ($_POST['password']);
			*/
		}

			
		/*
		$password=($_POST['password']);
		$newPassword=($_POST['newPassword']);
		$confirmPassword=($_POST['confirmPassword']);
		*/

echo"
<html>
<head>
<center>
	<title>Add Item</title>
</center>
</head>
";
echo "
<body>
<center>
	<h1>Add Item</h1>
</center>
		<form id='updateForm' name='updateForm' method='POST' action='UpdateItem.php'>
			<table align='center'>
<tr>
			<td><b>Item id</b></td><td><input type='text' name='ItemId' id='ItemId' value=$ItemId>
			</td>
</tr>
<tr>
			<td><b>Description</b></td><td><input type='text' name='description' id='description' value=$description>
			</td>
</tr>
<tr>
			<td><b>Size</b></td><td><input type='text' name='size' id='size' value=$size>
			</td>
</tr>

<tr>
			<td><b>Division</b></td><td><select name='division' id='division'>
				<option value='FoodConvenience'>Food Convenience</option>
				<option value='GeneralMerchandise'>General Merchandise</option>
			</td>
</tr>

<tr>
			<td><b>Category</b></td><td><select name='category' id='category'>
				<option value='CandyFood'>Candy & Food Items</option>
				<option value='BeverageAlcohol'>Beverage Alcohol</option>
				<option value='HealthAids'>Health Aids</option>
			</td>
</tr>
</select>
<tr>
			<td><b>Item Cost</b></td><td><input type='text' name='itemcost' id='itemcost'>
			</td>
</tr>
<tr>
			<td><b>Item Retail</b></td><td><input type='text' name='Itemretail' id='itemretail'>
			</td>
</tr>
<tr>
			<td><b>Image File Name</b></td><td><input type='text' name='imgfn' id='imgfn'>
			</td>
</tr>
<tr>
			<td><b>Vendor</b></td><td><select name='vendorid' id='vendorid'>
				<option value='1'>FDS-MERCHANDISE</option>
				<option value='2'>STEFANELLI DISTRIBUTING (DSD)</option>
				<option value='3'>GLAZER'S INC (TX-WINE) DSD</option>
				<option value='4'>AMERICAN BEVERAGE CORP (VERONA P)</option>
				<option value='2'>STEFANELLI DISTRIBUTING (DSD)</option>
				<option value='5'>PEPIN DISTRIBUTION CO</option>
				<option value='6'>HOSTESS BRANDS LLC</option>
				<option value='7'>FLOWERS FOODS SPECIALTY GROUP LLC</option>
				<option value='8'>FUTURE SALES & LIQUIDATIONS (D3)</option>
				<option value='9'>GENERAL MILLS INC</option>
				<option value='10'>FOURSTAR GROUP(XIAMEN-HK BK)(LC)</option>
				<option value='11'>JUST BORN INC</option>
				<option value='12'>PIEDMONT CANDY CO (SEASONAL)</option>
				<option value='13'>FOURSTAR GRP(D12-YANTIAN-HK BK)</option>
				<option value='14'>R L ALBERT & SON INC</option>
				<option value='15'>MARS CHOCOLATE NA LLC</option>
				<option value='16'>PERFETTI VAN MELLE USA INC)</option>
				<option value='17'>DEMET'S CANDY COMPANY</option>
				<option value='18'>RAGOLD CONFECTIONS</option>
				<option value='19'>SARA LEE BAKERY GROUP INC (WEST)</option>
				<option value='20'>SUNRISE CONFECTIONS</option>
				<option value='21'>KELLOGG SALES COMPANY</option>
				<option value='22'>INTERBAKE FOODS INC SIOUX CITY D</option>
				<option value='23'>LANCE INC (PP-GA)</option>
				<option value='24'>MONDELEZ GLOBAL LLC (CAT 361)</option>
				<option value='25'>FLASH SALES INC</option>
				<option value='26'>GIBSON ENTERPRISES INC</option>
				<option value='27'>J M SMUCKER (COFFEE PREPAID)</option>
				<option value='28'>CLEMENT PAPPAS & CO INC (P-MOUNT)</option>
			</td>
</tr>
			</table>
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