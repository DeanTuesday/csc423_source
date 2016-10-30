<?php

// Header file will use this to set the page title
$PageTitle="Add Customer to DB";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
<?php }

// Header
include_once('./templates/header.php');


// Run the DB script and echo any errors to the screen so we can debug
if(isset($_POST['addCustomer'])) {
    $config = include('./inc/config.php');

    $db = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']) or die ("Unable to Connect");
                
    $cId = $_POST['cId'];
    $cName = $_POST['cName'];
    $cAddress = $_POST['cAddress'];
    $cCity = $_POST['cCity'];
    $cState = $_POST['cState'];
    $cZip = $_POST['cZip'];
    $cPhone = $_POST['cPhone'];
    $cEmail = $_POST['cEmail'];
    
    $query = "insert into Customer (CustomerId, Name, Address, City, State, ZIP, Phone, Email) ".
            "values ('$cId', '$cName', '$cAddress', '$cCity', '$cState', '$cZip', '$cPhone', '$cEmail')";
   
    $result = $db->query($query);
    
    if(!$result) {
        echo "Error updating record ";
    }
    else {
        echo "Customer Record a successfully" ;
    }
    
    $db->close();
}

if(isset($_POST['updateCustomer'])) {
    //TODO
}
?>

<!-- Body Content Goes Here -->
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./addCustomer.php' class='button'>Add A Customer</a></td>
        <td><a href='./selectCustomerToUpdate.php' class='button'>Update A Customer</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
