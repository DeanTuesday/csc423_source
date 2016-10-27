<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Vendor</title>
        <link rel="stylesheet" type="text/css" href="./css/styles.css" />
        <script type="text/javascript">
			function validateFunction(){
				validateVCode();
				validateVName();
				validateAddress();
				validateCity();
				validateState();
				validateZip();
				validatePhone();
				validateContactName();
			}
			function validateVCode(){
				var vc = document.getElementById("vcode").value;
				if (!/^[a-zA-Z0-9]*$/.test(vc)||/^$/.test(vc)){
                    alert("Vendor Code was not valid.");
				}
			}
			function validateVName(){
				var vn = document.getElementById("vname").value;
				if (!/^[a-zA-Z]+-? ?[a-zA-Z]*$/.test(vn)){
                    alert("Vendor name was not valid.");
				}
			}
			function validateAddress(){
				var a = document.getElementById("address").value;
				if (!/^[\d]+ [a-zA-Z]+ [a-zA-Z]+\.?$/.test(a)){
					alert("Address was not valid.");
				}
			}
			function validateCity(){
				var city = document.getElementById("city").value;
				if (!/^[a-zA-Z]+[a-zA-Z -]*$/.test(city)){
					alert("City was not valid.");
				}
			}
			function validateState(){
				var state = document.getElementById("state").value;
				if (!/^[a-zA-Z]+[- ]*[a-zA-Z]*$/.test(state)){
					alert("State was not valid.");
				}
			}
			function validateZip(){
				var zip = document.getElementById("zip").value;
				if (!/[0-9]{5}/.test(zip)){
                    alert("Zip code was not valid.");
				}
			}
			function validatePhone(){
				var phone = document.getElementById("phone").value;
				if (!/^[0-9]{3}[ -]?[0-9]{3}[ -]?[0-9]{4}$/.test(phone)){
                    alert("Phone Number was not valid.");
				}
			}
			function validateContactName(){
				var cn = document.getElementById("contact").value;
				if (!/^[a-zA-Z]+[a-zA-Z -]*$/.test(cn)){
                    alert("Contact Name was not valid.");
				}
			}
			function validatePassword(){
				var pwd = document.getElementById("pwd").value;
				if (!/^[a-zA-Z0-9]+[a-zA-Z -]*$/.test(pwd)){
                    alert("Contact Name was not valid.");
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
                
				$vid = null;
				$vcode = $_POST['vcode'];
				$vname = $_POST['vname'];
				$address = $_POST['address'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$zip = $_POST['zip'];
				$phone = $_POST['phone'];
				$contact = $_POST['contact'];
				$pwd = $_POST['pwd'];
				$pwdc = $_POST['pwdc'];
				
				$sql = "insert into Vendor (VendorCode, VendorName, Address, City, State, ZIP, Phone, ContactPersonName, Password) ".
						"values ('$vcode', '$vname', '$address, '$city', '$state', '$zip', '$phone', '$contact', '$pwd')";
						
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
        	<form method="POST" action="addVendor2.php" name="addVendor2">
                <h3>Register a Vendor</h3>
                <table>
                    <tr>
                        <td align="right">Vendor Code:</td><td><input type="text" name="vcode" id="vcode"></td>
                        <td align="right">Vendor Name:</td><td><input type="text" name="vname" id="vname"></td>
                    </tr>
                    <tr>
                        <td align="right">Address:</td><td colspan="3" align="left"><input type="text" size="45" name="address" id="address"></td>
                    </tr>
                    <tr>
                        <td align="right">City:</td><td><input type="text" name="city" id="city"></td>
                        <td align="right">State:</td><td><input type="text" name="state" id="state"></td>
                    </tr>
                    <tr>
                        <td align="right">Zip:</td><td><input type="text" name="zip" id="zip"></td>
                        <td align="right">Phone:</td><td><input type="text" name="phone" id="phone"></td>
                    </tr>
                    <tr>
                        <td align="right">Contact Name:</td><td><input type="text" name="contact" id="contact"></td>
                    </tr>
                    <tr>
                    	<td align="right">Enter Password:</td><td><input type="password" name="pwd" id="pwd"></td>
                        <td align="right">Confirm Password:</td><td><input type="password" name="pwdc" id="pwdc"></td>
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
