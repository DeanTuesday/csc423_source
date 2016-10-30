<?php

// Header file will use this to set the page title
$PageTitle="Select Customer";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content goes here -->
<h2 align='center'>Update a Customer</h1>
<h3 align='center'>Select a Customer to Update:</h2>
<form id='selectCustomerForm' name='selectCustomerForm' method='POST' action='updateCustomer.php'>
    <table align='center'>
        <tr>
            <td>
                <select name="chooseCustomer" id='chooseCustomer'>
                    <option>Select a Customer</option>
                    <?php fillDropdownMenu(); ?>
                </select>
            </td>
            <td>
                <input type='submit' name='submit' value='Go'>
            </td>
        </tr>
    </table>
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>

<?php
// Function for filling out the select-customer drop down menu
function fillDropdownMenu(){
    $config = include('./inc/config.php');
    $conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
    if($conn->connect_errno){
        echo "Error: Failed to make a MySQL connection, here is why: \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        exit;
    }

    $query = "Select * from Customer";
    $result = $conn->query($query);
    
    if(!$result) {
        echo "Error: Our query failed to execute and here is why: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

    if($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {

        $cId = $row["CustomerId"];
        $cName = $row["Name"];
        $cPhone = $row["Phone"];

            echo"<option value='$cId'> $cName - $cPhone</option>";
        }
    }
    else
    {
        echo "0 results";
    }

    $conn->close();
}
?>
