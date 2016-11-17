<?php

if(!isset($_POST['submit'])){
    // TODO The selection page was skipped so kill the process
    echo "Error - Page was accessed illegally <br>";
    echo "<a href='./selectOrderToAdd.php'>Start a Update</a> <br>";
    echo "<a href='./index.php'>Home</a>";
    exit;
}

include("./classes/DBHandler.php");
$dbHandler = new DBHandler();

$itemId = $_POST['chooseItem'];
$quantity = $_POST['quantity'];
$orderId = $_POST['orderId'];

// go into the ReturnToVendor table to grab the specified StoreId for this return
$query = "INSERT INTO OrderDetail (OrderId, ItemId, QuantityOrdered) VALUES ('$orderId', '$itemId', '$quantity')";
$result = $dbHandler->runQuery($query);

// Header file will use this to set the page title
$PageTitle="Update Order Processor";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<h2>Processed an Order Update</h2>
<hr/>
<table>
    <tr>
        <td>
            <a href="./selectOrderToAdd.php" class="button">Update Another<br>Order</a>
        </td>
        <td><a href='./index.php' class='button'>Home Page</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
