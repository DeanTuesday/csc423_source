<?php

// Header file will use this to set the page title
$PageTitle="Add Vendor to DB";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
<?php }

// Header
include_once('./templates/header.php');


// Run the DB script and echo any errors to the screen so we can debug
if(isset($_POST['addVendor'])) {
    $config = include('./inc/config.php');

    $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);
    
    if (!$conn){
        die('Could not connect: '.mysql_error());
    }
    else{
        echo("Connected to Database<br>");
    }
    
    mysql_select_db($config['db']);
    
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
            "values ('$vcode', '$vname', '$address', '$city', '$state', '$zip', '$phone', '$contact', '$pwd')";
            
    $result = mysql_query($sql);
    
    if(!$result ) {
       die('Could not enter data: ' . mysql_error());
    }
    
    echo "Entered data successfully\n";
    
    mysql_close($conn);
}

if(isset($_POST['updateVendor'])) {
    //TODO
}
?>

<!-- Body Content Goes Here -->
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./addVendor.php' class='button'>Add A Vendor</a></td>
        <td><a href='./selectVendorToUpdate.php' class='button'>Update A Vendor</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
