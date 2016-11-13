<?php

// Header file will use this to set the page title
$PageTitle="View Order";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/itemFormValidator.js" type="text/javascript"></script>

<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<h1>Login<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>User name:</td><td><input type='text' name='name'/></td></tr>
<tr><td>Password:</td><td><input type='password' name='pwd'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>

</form>
<?php
session_start();
if(isset($_POST['submit']))
{
$addr = 'csdb.brockport.edu';
$user = 'wdean2';
$pass = 'csc423?';
$db = 'fal16_csc423_wdean2';
$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
echo("Connected to Database<br>");
 {
   $query=mysql_query("Select * From Vendor Where VendorId='".$name."' And Password='".$pwd."'") or die(mysql_error());
   $res=mysql_fetch_row($query);
   if($res)
   {
    $_SESSION['name']=$name;
    header('location:index.php');
   }
   else
   {
    echo'You entered username or password is incorrect';
   }
 }
  echo'Enter both username and password';
 }

?>

<?php
// Footer
include_once('./templates/footer.php');
?>