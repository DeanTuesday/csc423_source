<?php

// Header file will use this to set the page title
$PageTitle="View Existing Order";

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
<h3>Enter the Order ID to view an existing order and add items to that order<h3><hr>
<form  method="POST" action="updateOrderToAdd.php" name="updateItemsToOrder" id="updateItemsToOrder" >
<table cellspacing='5' align='center'>
<tr><td>OrderId:</td><td><input type="text" name="OrderId"/></td></tr>
<tr><td></td><td><input type='submit' name="submit" value="Submit"/></td></tr>
</table>
   
    <input type="hidden" name="updateItemsToOrder">
</form>


<?php
// Footer
include_once('./templates/footer.php');
?>