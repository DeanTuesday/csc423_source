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
			$query = "Select Description, Size, ItemCost, ItemRetail from InventoryItem Where ItemId=$ItemId";
			$result = $db->query($query);
			if($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					//$iid = $row["ItemId"];
					$vDescription = $row["Description"];
					$vSize = $row["Size"];
					$viCost = $row["ItemCost"];
					$vrCost = $row["ItemRetail"];
					
					//$itemCode=htmlspecialchars($iCode);
					$description=htmlspecialchars($vDescription);
					$size=htmlspecialchars($vSize);
					$itemc=htmlspecialchars($viCost);
					$itemr=htmlspecialchars($vrCost);
					
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
			$ItemId=htmlspecialchars(($_POST['ItemId']));
			$description=htmlspecialchars(($_POST['Description']));
			$size=htmlspecialchars(($_POST['Size']));
			$itemc=htmlspecialchars(($_POST['ItemCost']));
			$itemr=htmlspecialchars(($_POST['ItemRetail']));
			
		}

			
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
			<td><b>Description</b></td><td><input type='text' name='description' id='description' value="$description" width='20'>
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
			<td><b>Item Cost</b></td><td><input type='text' name='itemcost' id='itemcost' value=$itemc>
			</td>
</tr>
<tr>
			<td><b>Item Retail</b></td><td><input type='text' name='Itemretail' id='itemretail' value=$itemr>
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