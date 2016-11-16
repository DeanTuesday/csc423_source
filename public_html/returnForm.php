<?php

include("./classes/DBHandler.php");
$dbHandler = new DBHandler();

// when creating a brand new ReturnToVendor entry
if(isset($_POST['date'])){
    $vendorId = $_POST['chooseVendor'];
    $storeId = $_POST['chooseStore'];
    $date = $_POST['date'];

    $query = "INSERT INTO ReturnToVendor (VendorId, StoreId, DateTimeOfReturn) ".
        "VALUES ($vendorId, $storeId, '$date'); ";
    $insertResult = $dbHandler->runQuery($query);
}

$lastReturnId;
if(isset($_POST['returnId'])){
    $lastReturnId = $_POST['returnId'];
}
else{
    // Get the latest ReturnToVendor entry for ease of use
    $query = "SELECT ReturnToVendorId FROM ReturnToVendor ORDER BY ReturnToVendorId DESC LIMIT 1;";
    $lastReturnId = $dbHandler->runQuery($query)->fetch_row()[0];
}

// Get all ReturnToVendor entries
$query = "SELECT ReturnToVendorId FROM ReturnToVendor;";
$returns = $dbHandler->runQuery($query);

// Get all Items
$query = "SELECT ItemId, Description FROM InventoryItem;";
$items = $dbHandler->runQuery($query);

// Header file will use this to set the page title
$PageTitle="Return Item Form";

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
<form method="POST" action="returnProcessor.php" name="returnItem" id="returnItem" onsubmit="return validate()">
    <h3>Return Description</h3>
    <table>
        <tr>
            <td>select the return id:</td>
            <td>
                <select name="chooseReturn" id="chooseReturn">";
                    <?php
                        while($row = $returns->fetch_row())
                        {
                            $rId = $row[0];
                            if($rId == $lastReturnId){
                                echo"<option value='$rId' selected='selected'>$rId</option>";
                            }
                            else{
                                echo"<option value='$rId'>$rId</option>";
                            }
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>select item to return:</td>
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
            <td>quantity returned:</td>
            <td><input type="text" name="quantity" id="quantity"></td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr>
            <td><button type="submit" name="submit">Submit Return</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
