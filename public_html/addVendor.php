<?php

// Header file will use this to set the page title
$PageTitle="Add Vendor Form";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/vendorFormValidator.js" type="text/javascript"></script>
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<form method="POST" action="dbScriptVendor.php" name="addVendor" onsubmit="return validate()" >
    <h3>Register a Vendor</h3>
    <table>
        <tr>
            <td align="right">Vendor Code:</td><td><input type="text" name="vcode" id="vcode"></td>
            <td align="right">Vendor Name:</td><td><input type="text" name="vname" id="vname"></td>
        </tr>
        <tr>
            <td align="right">Address:</td><td colspan="3" align="left"><input type="text" size="45" name="address" id="address"></td>
        </tr>
        <tr>
            <td align="right">City:</td><td><input type="text" name="city" id="city"></td>
            <td align="right">State:</td><td><input type="text" name="state" id="state"></td>
        </tr>
        <tr>
            <td align="right">Zip:</td><td><input type="text" name="zip" id="zip"></td>
            <td align="right">Phone:</td><td><input type="text" name="phone" id="phone"></td>
        </tr>
        <tr>
            <td align="right">Contact Name:</td><td><input type="text" name="contact" id="contact"></td>
        </tr>
        <tr>
        	<td align="right">Enter Password:</td><td><input type="password" name="pwd" id="pwd"></td>
            <td align="right">Confirm Password:</td><td><input type="password" name="pwdc" id="pwdc"></td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr>
            <td><button type="submit">Submit Information</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
    <input type="hidden" name="addVendor">
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
