<?php

// Header file will use this to set the page title
$PageTitle="Add Vendor Form";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/vendorFormValidatorTest.js" type="text/javascript"></script>
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
        </tr>
        <tr>
            <td align="right">Vendor Name:</td><td><input type="text" name="vname" id="vname"></td>
        </tr>
        <tr>
            <td align="right">Address:</td><td colspan="3" align="left"><input type="text" size="45" name="address" id="address"></td>
        </tr>
        <tr>
            <td align="right">City:</td><td><input type="text" name="city" id="city"></td>
        </tr>
        <tr>
            <td align="right">State:</td>
            <td>
            	<select name="state" id="state">
                <option>Select A State</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </td>
        </tr>
        <tr>
            <td align="right">Zip:</td><td><input type="text" name="zip" id="zip"></td>
        </tr>
        <tr>
            <td align="right">Phone:</td><td><input type="text" name="phone" id="phone"></td>
        </tr>
        <tr>
            <td align="right">Contact Name:</td><td><input type="text" name="contact" id="contact"></td>
        </tr>
        <tr>
        	<td align="right">Enter Password:</td><td><input type="password" name="pwd" id="pwd"></td>
        </tr>
        <tr>
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
    <input type='hidden' id='updatePasswordFlag' name='updatePasswordFlag' value='false'>
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
