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



?>
<!-- Body Content Goes Here -->
<table align="center">
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./addVendor.php' class='button'>Add A Vendor</a></td>
        <td><a href='./selectVendorToUpdate.php' class='button'>Update A Vendor</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
