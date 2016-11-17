<?php

include("./classes/DBHandler.php");

$dbHandler = new DBHandler();
$query = "SELECT OrderId FROM `Order`;";
$orders = $dbHandler->runQuery($query);

// Header file will use this to set the page title
$PageTitle="Return Item To Vendor";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content goes here -->
<form method="POST" action="updateOrderToAdd.php" name="orderSelect" id="orderSelect">
    <h3>Select existing Order ID to view and existing order and add to it</h3>
    <table>
        <tr>
            <td>
                <select name="chooseOrder" id="chooseOrder">";
                    <option>Select an Order</option>";
                    <?php
                        while($row = $orders->fetch_row())
                        {
                            $oId = $row[0];
                            echo"<option value='$oId'>$oId</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
    </table>
    <hr/>
    <table>
        <tr>
            <td><button type="submit" name="submit">Submit</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
