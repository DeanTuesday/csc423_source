<?php

if(!isset($_POST['submit'])){
    // TODO The selection page was skipped so kill the process
    echo "Error - Page was accessed illegally <br>";
    echo "<a href='./selectOrderToAdd.php'>Start an Update</a> <br>";
    echo "<a href='./index.php'>Home</a>";
    exit;
}

$orderId = $_POST['chooseOrder'];

include("./classes/DBHandler.php");
$dbHandler = new DBHandler();

$query = "SELECT VendorId FROM `Order` WHERE OrderId = '$orderId';";
$vendor = $dbHandler->runQuery($query)->fetch_row()[0];

$query = "SELECT ItemId, Description FROM InventoryItem WHERE VendorId = '$vendor';";
$items = $dbHandler->runQuery($query);

// Header file will use this to set the page title
$PageTitle="Update Order Form";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <script src="./js/returnValidator.js" type="text/javascript"></script>
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content goes here -->
<form method="POST" action="updateOrderProcessor.php" name="updateOrderForm" id="updateOrderForm" onsubmit="return validate()">
    <h3>Update an Order</h3>
    <p>Current Order Id: <?= isset($orderId) ? $orderId : "0"?></p>
    <hr/>
    <h3>Add an Item to Existing Order</h3>
    <table>
        <tr>
            <td>Choose an Item:</td>
            <td>
                <select name="chooseItem" id="chooseItem">";
                    <?php
                        while($row = $items->fetch_row())
                        {
                            $iId = $row[0];
                            $iDescription = $row[1];
                            echo"<option value='$iId'>$iId - $iDescription</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Quantity:</td>
            <td><input type="text" name="quantity" id="quantity"></td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr>
            <td><button type="submit" name="submit">Submit Information</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
    <input type="hidden" name="orderId" value="<?= $orderId?>">
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
