<?php

// Header file will use this to set the page title
$PageTitle="Handle a Customer Purchase";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
    <script src="./js/vendorFormValidator.js" type="text/javascript" language="javascript"></script>

<?php }

// Header
include_once('./templates/header.php');
echo "<h2>Purchase Confirmation</h2>";
echo "Purchase for *name* Successful!<br>";
echo "Order Amount: 1337.69<br>";
echo "Date and Time of Order: 12/12/16 12:59:59<br>";

?>
<!-- Body Content Goes Here -->
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./selectStorePurchase.php' class='button'>Customer Purchase</a></td>
        <td><a href='./selectStoreInventory.php' class='button'>View Store Inventory</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
