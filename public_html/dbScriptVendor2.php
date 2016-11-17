<?php

// Header file will use this to set the page title
$PageTitle="Add Vendor to DB";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
    <script src="./js/vendorFormValidator.js" type="text/javascript" language="javascript"></script>
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
    $vcode = mysql_real_escape_string($_POST['vcode']);
    $vname = mysql_real_escape_string($_POST['vname']);
    $address = mysql_real_escape_string($_POST['address']);
    $city = mysql_real_escape_string($_POST['city']);
    $state = mysql_real_escape_string($_POST['state']);
    $zip = mysql_real_escape_string($_POST['zip']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $contact = mysql_real_escape_string($_POST['contact']);
    $pwd = mysql_real_escape_string($_POST['pwd']);
    $pwdc = mysql_real_escape_string($_POST['pwdc']);
    
    $sql = "insert into Vendor (VendorCode, VendorName, Address, City, State, ZIP, Phone, ContactPersonName, Password) ".
            "values ('$vcode', '$vname', '$address', '$city', '$state', '$zip', '$phone', '$contact', '$pwd')";
            
    $result = mysql_query($sql);
    
    if(!$result ) {
       die('Could not enter data: ' . mysql_error());
    }
    
    echo "Entered data successfully\n";
    
    mysql_close($conn);
}
    

if(isset($_POST['updateVendorFlag'])) 
{
    $config = include('./inc/config.php');
    $conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
    if($conn->connect_errno){
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $conn->connect_errno . "\n";
        echo "Error: " . $conn->connect_error . "\n";
        exit;
    }
  
    //Get new values from previous page:    
    $vendorId = $_POST['vendorId'];
    $vcode = $_POST["vcode"];
    $vname = $_POST["vname"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $phone = $_POST["phone"];
    $contact = $_POST["contact"];
    $vendorStatus = $_POST["vstatus"];

    $query= "update Vendor ".
            "set VendorName='$vname', Address='$address', City='$city', State='$state', ZIP='$zip', Phone='$phone', ContactPersonName='$contact', Status='$vendorStatus'".
            "where VendorId=$vendorId";

    $result = $conn->query($query);

    if(!$result)
    {
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $query . "\n";
        echo "Errno: " . $conn->errno . "\n";
        echo "Error: " . $conn->error . "\n";
        exit;
    }
    else
    {
        echo 'Vendor information updated successfully!';
    }


    // Always close the connection
    $conn->close();

    if($_POST['updatePasswordFlag']=='true')
    {
        // Do a DB Query to get the real PWD
        include('./dbScriptGetVendor.php');
        
        // If correct update the PWD and echo success 
        if($_POST['userPwd']==$vendorPwd)
        {
            $vendorPwd = $_POST['newPwd'];
            $config = include('./inc/config.php');
            $conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
            if($conn->connect_errno){
                echo "Error: Failed to make a MySQL connection, here is why: \n";
                echo "Errno: " . $conn->connect_errno . "\n";
                echo "Error: " . $conn->connect_error . "\n";
                exit;
            }
        
            $query= "update Vendor ".
            "set Password='$vendorPwd'".
            "where VendorId=$vendorId";

            $result = $conn->query($query);

            if(!$result)
            {
                echo "Error: Our query failed to execute and here is why: \n";
                echo "Query: " . $query . "\n";
                echo "Errno: " . $conn->errno . "\n";
                echo "Error: " . $conn->error . "\n";
                exit;
            }
            else
            {
                echo '<br>Vendor password updated successfully!';
            }
            
            // Always close the connection
            $conn->close();
        }
        // If incorrect don't update the PWD and echo statement saying correct pwd needed
        else
        {
            echo '<br>Vendor password not updated! Original password was incorrect.';
        }
    }
    else if($_POST['updatePasswordFlag']=='false')
    {

    }
}
?>
<!-- Body Content Goes Here -->
<table align="center">
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
