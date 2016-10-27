<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Item</title>
        <link rel="stylesheet" type="text/css" href="./css/styles.css" />
        <script type="text/javascript">
			function validateFunction(){
				validateItemId();
				validateDescription();
				validateSize();
                validateDepartment();
				validateCost();
				validateRetail();
				validateImage();
			}
			function validateItemId(){
				var iid = document.getElementById("itemid").value;
				if (!/^120[0-9]{4}$/.test(iid)){
                    alert("Item Id was not valid.");
				}
			}
			function validateDescription(){
				var desc = document.getElementById("description").value;
				if (!/^[a-zA-Z0-9 .]+$/.test(desc)){
                    alert("Item Description was not valid.");
				}
			}
			function validateSize(){
				var size = document.getElementById("size").value;
				if (!/^[0-9]+[a-zA-Z]+$/.test(size)){
					alert("Size was not valid.");
				}
			}
            function validateDepartment(){
				var department = document.getElementById("department").value;
				if (!/^[a-zA-Z]+$/.test(department)){
					alert("Department was not valid.");
				}
			}
			function validateCost(){
				var cost = document.getElementById("cost").value;
				if (!/^[0-9]+.[0-9]{2}*$/.test(cost)){
					alert("Cost Price was not valid.");
				}
			}
			function validateRetail(){
				var retail = document.getElementById("retail").value;
				if (!/^[0-9]+.[0-9]{2}*$/.test(retail)){
					alert("Retail Price was not valid.");
				}
			}
			function validateImage(){
				var image = document.getElementById("image").value;
				if (!/^[0-9a-zA-Z _.]+.jpg$/.test(image)){
                    alert("Image Name was not valid.");
				}
            }
		</script>
    </head>
    
    <body>
		<?php
			if(isset($_POST['submitCheck'])) {
				$addr = 'localhost';
				$user = 'wdean2';
				$pass = 'csc423?';
				$db = 'fal16_csc423_wdean2';
				
				//$conn = new mysqli($addr, $user, $pass, $db);
				$conn = mysql_connect($addr, $user, $pass);
                
				if (!$conn){
					die('Could not connect: '.mysql_error());
				}
				else{
					echo("Connected to Database<br>");
				}
                
                mysql_select_db($db);
                
				$ItemId = $_POST['ItemId'];
				$Division = $_POST['Division'];
				$description = $_POST['description'];
				$size = $_POST['size'];
				$cost = $_POST['cost'];
				$retail = $_POST['retail'];
				$image = $_POST['image'];
				$category = $_POST['category'];
				$department = $_POST['department'];
				$vendorid = $_POST['vendorid'];
				
				
				$sql = "insert into InventoryItem (ItemId, Description, Size, Division, Department, Category, itemCost, ItemRetail, ImageFileName, VendorId) ".
						"values ('$ItemId', '$description', '$size', '$division', '$department', '$category', '$cost', '$retail', '$image', '$vendorid')";
						
				// mysql_select_db('fal16_csc423_wdean2');
				$result = mysql_query($sql);
				// $result = $db->query($sql);
				
				if(!$result ) {
				   die('Could not enter data: ' . mysql_error());
				}
				
				echo "Entered data successfully\n";
				
				mysql_close($conn);
			}
			else{
		?>
        
    	<div>
        	<form method="POST" action="additem.php" name="addItem">
                <h3>Add an Item</h3>
                <table>
                    <tr>
                        <td align="right">Item Id:</td><td><input type="text" name="ItemId" id="ItemId"></td>
                    </tr>
                    <tr>
                        <td align="right">Description:</td><td align="left"><input type="text" size="45" name="description" id="description"></td>
                    </tr>
                    <tr>
                        <td align="right">Size:</td><td><input type="text" name="size" id="size"></td>
                    </tr>
                    <tr>
                        	<td><b>Division</b></td><td><select name='Division' id='division'>
				<option value='FoodConvenience'>Food Convenience</option>
				<option value='GeneralMerchandise'>General Merchandise</option>
			</td>
                    </tr>
                    <tr>
                        <td align="right">Department:</td><td><input type="text" name="department" id="department"></td>
                    </tr>
                    <tr>
                    	<td><b>Category</b></td><td><select name='category' id='category'>
				<option value='CandyFood'>Candy & Food Items</option>
				<option value='BeverageAlcohol'>Beverage Alcohol</option>
				<option value='HealthAids'>Health Aids</option>
			</td>
                    </tr>
                    <tr>
                        <td align="right">Item Cost:</td><td><input type="text" name="cost" id="cost"></td>
                    </tr>
                    <tr>
                        <td align="right">Item Retail:</td><td><input type="text" name="retail" id="retail"></td>
                    </tr>
                    <tr>
                        <td align="right">Image Name:</td><td><input type="text" name="image" id="image"></td>
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
                <hr/>
                <table>
                    <tr>
                        <td><button type="submit" onclick="validateFunction()">Submit Information</button></td>
                        <td><input type="reset"></td>
                    </tr>
                </table>
                <hr/>
                <p>
                    <i>Last updated:
                        <!-- #BeginDate format:Am1 -->October 25, 2016<!-- #EndDate --></i>
                </p>
                <input type="hidden" name="submitCheck">
            </form>
        </div>
        <?php
			}
		?>
    </body>
</html>
