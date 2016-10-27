<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Customer</title>
        <link rel="stylesheet" type="text/css" href="./css/styles.css" />
        <script type="text/javascript">
			function validateFunction(){
				//validateVCode();
				//validateVName();
				//validateAddress();
				//validateCity();
				//validateState();
				//validateZip();
				//validatePhone();
				//validateContactName();
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
				$addr = 'csdb.brockport.edu';
				$user = 'wdean2';
				$pass = 'csc423?';
				$db = 'fal16_csc423_wdean2';
				
			$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
                
			
                //$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
              
                
				    $cId = $row['$cId'];
				    $cName = $row['$cName'];
					$cAddress = $row['$cAddress'];
					$cCity = $row['$cCity'];
					$cState = $row['$cState'];
					$cZip = $row['$cZip'];
					$cPhone = $row['$cPhone'];
					$cEmail = $row['$cEmail'];
				
				$query = "insert into Customer (CustomerId, Name, Address, City, State, ZIP, Phone, Email) ".
						"values ('$cId', '$cName', '$cAddress', '$cCity', '$cState', '$cZip', '$cPhone', '$cEmail')";
						
				// mysql_select_db('fal16_csc423_wdean2');
				 $result = $db->query($query);
				// $result = $db->query($sql);
				
				if(!$result ) {
				   die('Could not enter data: ' . mysql_error());
				}
				
				echo "Entered data successfully\n";
				
				$db->close();
			}
			else{
		?>
        
    	<div>
        	<form method="POST" action="addCustomer.php" name="addCustomer">
                <h3>Register a Customer</h3>
                <table>
                    <tr>
                        <td align="right">CustomerId:</td><td><input type="text" name="cId" id="cId"></td>
                        <td align="right">Name:</td><td><input type="text" name="cName" id="cName"></td>
                    </tr>
                    <tr>
                        <td align="right">Address:</td><td colspan="3" align="left"><input type="text" size="45" name="cAddress" id="cAddress"></td>
                    </tr>
                    <tr>
                        <td align="right">City:</td><td><input type="text" name="cCity" id="cCity"></td>
                        <td align="right">State:</td><td><input type="text" name="cState" id="cState"></td>
                    </tr>
                    <tr>
                        <td align="right">Zip:</td><td><input type="text" name="cZip" id="cZip"></td>
                        <td align="right">Phone:</td><td><input type="text" name="cPhone" id="cPhone"></td>
                    </tr>
                    <tr>
                        <td align="right">Email:</td><td><input type="text" name="cEmail" id="cEmail"></td>
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
