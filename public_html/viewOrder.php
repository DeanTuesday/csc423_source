<?php

// Header file will use this to set the page title
$PageTitle="View Order";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/itemFormValidator.js" type="text/javascript"></script>


ob_start();
$host=""; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name=""; // Database name 
$tbl_name=""; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password") or die(mysql_error());
echo "Connected to MySQL<br />";
mysql_select_db("$db_name") or die(mysql_error());
echo "Connected to Database<br />";
// Check $username and $password 
/*
if(empty($_POST['username']))
{
    echo "UserName/Password is empty!";
    return false;
}
if(empty($_POST['password']))
{
    echo "Password is empty!";
    return false;
}
*/

// Define $username and $password 
$username=$_POST['username']; 
$password=md5($_POST['pass']);


// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if ($count==1) {
    echo "Success! $count";
} else {
    echo "Unsuccessful! $count";
}

ob_end_flush();

<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->

<?php
// Footer
include_once('./templates/footer.php');
?>
