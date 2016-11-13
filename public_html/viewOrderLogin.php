<?php

// Header file will use this to set the page title
$PageTitle="View Order";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/itemFormValidator.js" type="text/javascript"></script>
<?php }


// Run the DB Script and output any errors for debugging
if(isset($_POST['submit'])){
    // Always connect to DB
    $config = include('./inc/config.php');
    $conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
    if($conn->connect_errno){
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        exit;

$username=$_POST['username']; 
$password=md5($_POST['pass']);

// To protect MySQL injection 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM Vendor WHERE VendorId='$username' and Password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if ($count==1) {
    echo "Success! $count";
} else {
    echo "Unsuccessful! $count";
}


// Header
include_once('./templates/header.php');
?>
	
<!-- Body Content Goes Here -->
 <form action="viewOrder.php" method="POST">
      <h3>Please Login</h3>

      User Name: <input type="text" name="username"><br>
      Password: <input type="password" name="password">

      <input type="submit" name="submit" value="login">
	  </form>
<?php
// Footer
include_once('./templates/footer.php');
?>
