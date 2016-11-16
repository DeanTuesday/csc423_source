<?php

// Header file will use this to set the page title
$PageTitle="Add Vendor to DB";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
    <script src="./js/vendorFormValidator.js" type="text/javascript" language="javascript"></script>
<?php }

// Header
include_once('./templates/header.php');

// Run the DB script and echo any errors to the screen so we can debug
if(isset($_POST['createOrderFlag']))
{
    echo"Order created successfully!";
}
    
?>
<!-- Body Content Goes Here -->
<table align="center">
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./addVendor.php' class='button'>Create an Order</a></td>
        <td><a href='./selectVendorToUpdate.php' class='button'>View an Order</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
