<?php

// Header file will use this to set the page title
$PageTitle="Add Customer Form";

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
<h2>Add a Customer</h1>
<h3>Customer Information:</h2>
<form method="POST" action="dbScriptCustomer.php" name="customerForm" id="customerForm" onsubmit="return validate()">
    <h3>Register a Customer</h3>
    <table>
        <tr>
            <td align="right">Customer Id:</td>
            <td><input type="text" name="cId" id="cId"></td>
        </tr>
        <tr>
            <td align="right">Name:</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td align="right">Address:</td>
            <td colspan="3" align="left"><input type="text" size="45" name="address" id="address"></td>
        </tr>
        <tr>
            <td align="right">City:</td>
            <td><input type="text" name="city" id="city"></td>
        </tr>
        <tr>
            <td align="right">State:</td>
            <td><input type="text" name="state" id="state"></td>
        </tr>
        <tr>
            <td align="right">Zip:</td>
            <td><input type="text" name="zip" id="zip"></td>
        </tr>
        <tr>
            <td align="right">Phone:</td>
            <td><input type="text" name="phone" id="phone"></td>
        </tr>
        <tr>
            <td align="right">Email:</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr>
            <td><button type="submit" name="submit">Submit Information</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
    <input type="hidden" name="addCustomer">
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
