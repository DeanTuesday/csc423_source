<?php

// Header file will use this to set the page title
$PageTitle="Add Item Form";

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
<form method="POST" action="dbScriptItem.php" name="addItem" onsubmit="return validate()">
    <h3>Add an Item</h3>
    <table>
        <tr>
            <td align="right">Item Id:</td>
            <td><input type="text" name="itemId" id="itemId"></td>
        </tr>
        <tr>
            <td align="right">Description:</td>
            <td><input type="text" size="45" name="description" id="description"></td>
        </tr>
        <tr>
            <td align="right">Size:</td>
            <td><input type="text" name="size" id="size"></td>
        </tr>
        <tr>
            <td align="right"><b>Division</b></td>
            <td>
            	<select name='division' id='division'>
				<option value='FoodConvenience'>Food Convenience</option>
				<option value='GeneralMerchandise'>General Merchandise</option>
			</td>
        </tr>
        <tr>
            <td align="right">Department:</td>
            <td><input type="text" name="department" id="department"></td>
        </tr>
        <tr>
        	<td align="right"><b>Category</b></td>
        	<td>
        		<select name='category' id='category'>
				<option value='CandyFood'>Candy &amp; Food Items</option>
				<option value='BeverageAlcohol'>Beverage Alcohol</option>
				<option value='HealthAids'>Health Aids</option>
			</td>
        </tr>
        <tr>
            <td align="right">Item Cost:</td>
            <td><input type="text" name="cost" id="cost"></td>
        </tr>
        <tr>
            <td align="right">Item Retail:</td>
            <td><input type="text" name="retail" id="retail"></td>
        </tr>
        <tr>
            <td align="right">Image Name:</td>
            <td><input type="text" name="image" id="image"></td>
        </tr>
        <tr>
            <td align="right"><b>Vendor</b></td>
            <td>
            	<select name='vendorid' id='vendorid'>
				<option value='1'>FDS-MERCHANDISE</option>
				<option value='2'>STEFANELLI DISTRIBUTING (DSD)</option>
				<option value='3'>GLAZER'S INC (TX-WINE) DSD</option>
				<option value='4'>AMERICAN BEVERAGE CORP (VERONA P)</option>
				<option value='2'>STEFANELLI DISTRIBUTING (DSD)</option>
				<option value='5'>PEPIN DISTRIBUTION CO</option>
				<option value='6'>HOSTESS BRANDS LLC</option>
				<option value='7'>FLOWERS FOODS SPECIALTY GROUP LLC</option>
				<option value='8'>FUTURE SALES &amp; LIQUIDATIONS (D3)</option>
				<option value='9'>GENERAL MILLS INC</option>
				<option value='10'>FOURSTAR GROUP(XIAMEN-HK BK)(LC)</option>
				<option value='11'>JUST BORN INC</option>
				<option value='12'>PIEDMONT CANDY CO (SEASONAL)</option>
				<option value='13'>FOURSTAR GRP(D12-YANTIAN-HK BK)</option>
				<option value='14'>R L ALBERT &amp; SON INC</option>
				<option value='15'>MARS CHOCOLATE NA LLC</option>
				<option value='16'>PERFETTI VAN MELLE USA INC)</option>
				<option value='17'>DEMET'S CANDY COMPANY</option>
				<option value='18'>RAGOLD CONFECTIONS</option>
				<option value='19'>SARA LEE BAKERY GROUP INC (WEST)</option>
				<option value='20'>SUNRISE CONFECTIONS</option>
				<option value='21'>KELLOGG SALES COMPANY</option>
				<option value='22'>INTERBAKE FOODS INC SIOUX CITY D</option>
				<option value='23'>LANCE INC (PP-GA)</option>
				<option value='24'>MONDELEZ GLOBAL LLC (CAT 361)</option>
				<option value='25'>FLASH SALES INC</option>
				<option value='26'>GIBSON ENTERPRISES INC</option>
				<option value='27'>J M SMUCKER (COFFEE PREPAID)</option>
				<option value='28'>CLEMENT PAPPAS &amp; CO INC (P-MOUNT)</option>
			</td>
		</tr>
    </table>
    <hr/>
    <table>
        <tr>
            <td><button type="submit">Submit Information</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
    <input type="hidden" name="addItem">
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
