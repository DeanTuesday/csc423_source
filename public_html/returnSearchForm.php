<?php

include("./classes/DBHandler.php");

$dbHandler = new DBHandler();
$query = "  SELECT VendorId, VendorCode, VendorName 
            FROM Vendor
            ORDER BY VendorId ASC;";
$vendors = $dbHandler->runQuery($query);

$beforeDay = date("d");
$beforeMonth = date("m");
$beforeYear = date("Y");
$afterDay = "01";
$afterMonth = "";
$afterYear = "";
if(intval($beforeMonth) > 6){
    $afterMonth = intval($beforeMonth) - 6;
    $afterYear = $beforeYear;
}
else{
    $afterMonth = intval($beforeMonth) + 6;
    $afterYear = intval($beforeYear) - 1;
}
if(intval($afterMonth) < 10){
    $afterMonth = "0".$afterMonth;
}

// Header file will use this to set the page title
$PageTitle="Popular Returns Search";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content goes here -->
<form method="POST" action="returnSearchResults.php" name="returnSearchForm" id="returnSearchForm">
    <h3>Most Popular Returns for the Desired Vendor</h3>
    <table>
        <tr>
            <td colspan="3">
                <select name="chooseVendor" id="chooseVendor">";
                    <option>Select a Vendor</option>";
                    <?php
                        while($row = $vendors->fetch_row())
                        {
                            $vId = $row[0];
                            $vcode = $row[1];
                            $vname = $row[2];
                            echo"<option value='$vId'>Id- $vId, code- $vcode, name- $vname</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>After:</td>
            <td></td>
            <td>Before:</td>
        </tr>
        <tr>
            <td>
                <input type="text" name="afterMonth" value="<?= $afterMonth ?>" size="1">
                /
                <input type="text" name="afterDay" value="<?= $afterDay ?>" size="1">
                /
                <input type="text" name="afterYear" value="<?= $afterYear ?>" size="1">
            </td>
            <td>-</td>
            <td>
                <input type="text" name="beforeMonth" value="<?= $beforeMonth ?>" size="1">
                /
                <input type="text" name="beforeDay" value="<?= $beforeDay ?>" size="1">
                /
                <input type="text" name="beforeYear" value="<?= $beforeYear ?>" size="1">
            </td>
        </tr>
    </table>
    <table>
        <tr>
            <td><button type="submit" name="submit">Submit Information</button></td>
            <td><input type="reset"></td>
        </tr>
    </table>
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>
