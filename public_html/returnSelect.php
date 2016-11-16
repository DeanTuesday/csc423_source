<?php

include("./classes/DBHandler.php");

$dbHandler = new DBHandler();
$query = "select VendorId, VendorCode, VendorName from Vendor";
$vendors = $dbHandler->runQuery($query);
$query = "select StoreId, StoreCode, StoreName from RetailStore";
$stores = $dbHandler->runQuery($query);

// Header file will use this to set the page title
$PageTitle="Return Item Form";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content goes here -->
<form method="POST" action="returnItem.php" name="returnSelect" id="returnSelect">
    <h3>Return an Item</h3>
    <table>
        <tr>
            <td>
                <select id='vendors'>";
                    <option>Select a Vendor</option>";
                    <?php
                        while($row = $vendors->fetch_row())
                        {
                            $vId = $row[0];
                            $vcode = $row[1];
                            $vname = $row[2];
                            echo"<option value='$vId'>$vcode - $vname</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <select id='stores'>";
                    <option>Select a Retail Store</option>";
                    <?php
                        while($row = $stores->fetch_row())
                        {
                            $sId = $row[0];
                            $sCode = $row[1];
                            $sName = $row[2];
                            echo"<option value='$sId'>$sCode - $sName</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr>
            <td><button type="submit" name="submit">Submit Information</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
    <input type="hidden" name="date" id="date" value="<?= date("d/m/Y")?>">
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
