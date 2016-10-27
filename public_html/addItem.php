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
				
				$sql = "insert into InventoryItem (ItemId, Description, Size, Division, Department, Category, itemCost, ItemRetail, ImageFileName, VendorId) ".
						"values ('$ItemId', '$description', '$size', '$division', '$department', '$category', '$cost', '$retail', '$image', '$vid')";
						
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
                        <td align="right">Item Id:</td><td><input type="text" name="itemid" id="ItemId"></td>
                    </tr>
                    <tr>
                        <td align="right">Description:</td><td align="left"><input type="text" size="45" name="description" id="description"></td>
                    </tr>
                    <tr>
                        <td align="right">Size:</td><td><input type="text" name="size" id="size"></td>
                    </tr>
                    <tr>
                        <td align="right">Division:</td><td>
                        <td><select align="left" name="Division" id="Division"> 
                                <option>Select a Division</option>
                                <?php
                                
                                // TODO: THIS IS NOT A DATABASE YET
                                $divquery = "Select ItemId, Division from InventoryItem";
								$divresult = $db->query($divquery);

								if($divresult->num_rows > 0)
								{
									while($divrow = $divresult->fetch_assoc())
									{

										$ItemId = $divrow["ItemId"];
                                        $Division = $divrow["Division"];

										echo"<option value='$ItemId'>$Division</option>";
									}
								}
								else
								{
								    echo "0 results";
								}
										if(isset($_POST['submitCheck'])) {
						$addr = 'localhost';
						$user = 'wdean2';
						$pass = 'csc423?';
						$db = 'fal16_csc423_wdean2';
				
									$conn = mysql_connect($addr, $user, $pass);
							mysql_select_db('$db');

			$sql = "SELECT Division FROM InventoryItem";
$result = mysql_query($sql);

echo "<select name='Division'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['Division'] ."'>" . $row['Division'] ."</option>";
}
echo "</select>";

                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td align="right">Department:</td><td><input type="text" name="department" id="department"></td>
                    </tr>
                    <tr>
                    	<td align="right">Category:</td><td>
                        <td><select align="left" name="category" id="category"> 
                                <option>Select a Category</option>
                                <?php
                                
                                // TODO: THIS IS NOT A DATABASE YET
                                $catquery = "Select CategoryId, CategoryName from InventoryItemCategory";
								$catresult = $db->query($catquery);

								if($catresult->num_rows > 0)
								{
									while($catrow = $catresult->fetch_assoc())
									{

										$categoryid = $catrow["CategoryId"];
                                        $category = $catrow["CategoryName"];

										echo"<option value='$categoryid'>$category</option>";
									}
								}
								else
								{
								    echo "0 results";
								}
								
                                ?>
                            </select></td>
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
                        <td align="right">Vendor:</td>
                        <td><select align="left" name="category" id="category"> 
                                <option>Select a Vendor</option>
                                <?php
                                $vquery = "Select VendorId, VendorCode, VendorName from Vendor";
								$vresult = $db->query($vquery);

								if($vresult->num_rows > 0)
								{
									while($vrow = $vresult->fetch_assoc())
									{

										$vid = $vrow["VendorId"];
										$vCode = $vrow["VendorCode"];
										$vName = $vrow["VendorName"];

										echo"<option value='$vid'>$vCode - $vName</option>";
									}
								}
								else
								{
								    echo "0 results";
								}
                                ?>
                            </select></td>
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
