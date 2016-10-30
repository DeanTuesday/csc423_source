<?php

// Script for getting the existing customer out of the database
//------------------------------------------------------------------------------------------
if(isset($_POST['submit'])){
// connect to the db
$config = include('./inc/config.php');
$conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
if($conn->connect_errno){
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}

// get the selected customer from previous page
$customerId = $_POST['chooseCustomer'];
$query = "select Name, Address, City, State, ZIP, Phone, Email from Customer Where CustomerId LIKE '$customerId'";
$result = $conn->query($query);
if(!$result) {
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $query . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
}

if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
        $name = htmlspecialchars($row["Name"]);
        $address = htmlspecialchars($row["Address"]);
        $city = htmlspecialchars($row["City"]);
        $state = htmlspecialchars($row["State"]);
        $zip = htmlspecialchars($row["ZIP"]);
        $phone = htmlspecialchars($row["Phone"]);
        $email = htmlspecialchars($row["Email"]);
    }
}
else{
    echo "0 results";
}
$conn->close();
}
else{
// TODO The selection page was skipped so kill the process
echo "Error - Page was accessed illegally <br>";
echo "<a href='./selectCustomerToUpdate.php'>Back</a>";
exit;
}
//------------------------------------------------------------------------------------------

// Header file will use this to set the page title
$PageTitle="Update Existing Customer";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <script src="./js/customerFormValidator.js" type="text/javascript"></script>
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content goes here -->
<h2>Update a Customer</h1>
<h3>Customer Information:</h2>
<form method='POST' action='dbScriptCustomer.php' name='customerForm' id='customerForm'  onsubmit='return validate();'>
	<table>
		<!-- Customer Details -->
		<tr>
			<td align="right">Customer Id:</td>
			<td><input type='text' id='cId' name='cId' value=<?= $customerId ?> readonly></td>
		</tr>		
		<tr>
			<td align="right">Name:</td>
			<td><input type='text' id='name' name='name' value=<?= $name ?>></td>
		</tr>
		<tr>
			<td align="right">Address:</td>
			<td><input type='text' id='address' name='address' value=<?= $address ?>></td>
		</tr>
		<tr>
			<td align="right">City:</td>
			<td><input type='text' id='city' name='city' value=<?= $city ?>></td>
		</tr>
		<tr>
			<td align="right">State:</td>
			<td><input type='text' id='state' name='state' value=<?= $state ?>></td>
		</tr>
		<tr>
			<td align="right">Zip:</td>
			<td><input type='text' id='zip' name='zip' value=<?= $zip ?>></td>
		</tr>
		<tr>
			<td align="right">Phone:</td>
			<td><input type='text' id='phone' name='phone' value=<?= $phone ?>></td>
		</tr>
		<tr>
			<td align="right">Email:</td>
			<td><input type='text' id='email' name='email' value=<?= $email ?>></td>
		</tr>
    </table>
    <hr/>
	<table>
        <tr>
            <td><button type="submit" name="submit">Update Customer</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
    <input type="hidden" name="updateCustomer">
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
