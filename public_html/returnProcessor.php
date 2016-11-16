<?php

if(!isset($_POST['submit'])){
    // TODO The selection page was skipped so kill the process
    echo "Error - Page was accessed illegally <br>";
    echo "<a href='./returnSelect.php'>Start a New Return</a> <br>";
    echo "<a href='./returnForm.php'>Return an Item</a> <br>";
    echo "<a href='./index.php'>Home</a>";
    exit;
}

include("./classes/DBHandler.php");
$dbHandler = new DBHandler();

$returnId = $_POST['chooseReturn'];
$itemId = $_POST['chooseItem'];
$quantity = $_POST['quantity'];

// go into the ReturnToVendor table to grab the specified StoreId for this return
$query = "SELECT StoreId FROM ReturnToVendor WHERE ReturnToVendorId = '$returnId';";
$storeId = $dbHandler->runQuery($query)->fetch_row()[0];

// go into Inventory table to find the InventoryId and existing Quantity for the specified store and item
$query = "SELECT InventoryId, QuantityInStock FROM Inventory WHERE StoreId = '$storeId' AND ItemId = '$itemId';";
$row = $dbHandler->runQuery($query)->fetch_row();
$inventoryId = $row[0];
$existingQuantity =  $row[1];

// check to make sure existing Quantity is > Quantity we want to return
if($quantity > $existingQuantity){
    $message = "You are returning too many items.";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
else{
    $query = "UPDATE Inventory SET QuantityInStock = QuantityInStock - '$quantity' WHERE InventoryId = '$inventoryId';";
    $result = $dbHandler->runQuery($query);
}

// Header file will use this to set the page title
$PageTitle="Process A Return";

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
<h2>Processed a Return</h2>
<hr/>
<form method="POST" action="./returnForm.php" id="form">
    <input type="hidden" name="returnId" id="returnId" value="<?= $returnId ?>">
    <table>
        <tr>
            <td>
                <a class='button' onclick="document.getElementById('form').submit();">Return Another<br>Item</a>
            </td>
            <td><a href='./returnSelect.php' class='button'>Start A New<br>Return</a></td>
            <td><a href='./index.php' class='button'>Home Page</a></td>
        </tr>
    </table>
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
