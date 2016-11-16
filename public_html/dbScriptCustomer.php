<?php

// Header file will use this to set the page title
$PageTitle="Customer Sent to DB";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
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
    }

    // Always grab customer info from the form
   

    // Only run the following query if we are inserting
    if(isset($_POST['addCustomer'])){
		 $cId = $_POST['cId'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
        $query =    "insert into Customer (CustomerId, Name, Address, City, State, ZIP, Phone, Email) ".
                    "values ('$cId', '$name', '$address', '$city', '$state', '$zip', '$phone', '$email')";
   
        $result = $conn->query($query);
        if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        else {
            echo "Customer created successfully" ;
        }
    }

    // Only run the following query if we are updating
    if(isset($_POST['updateCustomer'])){
		 $cId = $_POST['cId'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
        $query= "update Customer ".
                "set Name='$name', Address='$address', City='$city',State='$state', ZIP='$zip', Phone='$phone', Email='$email' ".
                "where CustomerId='$cId'";

        $result = $conn->query($query);
        if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        else {
            echo "Customer updateded successfully" ;
        }
    }

	    if(isset($_POST['deleteCustomer'])){
			$cId = $_POST['chooseCustomer'];
        $query= "DELETE FROM Customer where CustomerId='$cId'";

        $result = $conn->query($query);
        if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        else {
            echo "Customer deleted successfully" ;
        }
    }
	
	
    // Always close the connection
    $conn->close();
}
else{
    echo "submitCheck failed.";
}

// Header
include_once('./templates/header.php');
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
