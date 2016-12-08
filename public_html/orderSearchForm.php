<?php

include("./classes/DBHandler.php");

$dbHandler = new DBHandler();
$query = "  SELECT StoreId, StoreCode, StoreName 
            FROM RetailStore
            ORDER BY StoreId ASC;";
$stores = $dbHandler->runQuery($query);

$beforeDay = date("d");
$beforeMonth = date("m");
$beforeYear = date("Y");

$afterDay = "";
$afterMonth = "";
$afterYear = "";
if(intval($beforeDay) < 8){
    if($beforeMonth == "01"){
        $afterDay = 24 + intval($beforeDay);
        $afterMonth = "12";
        $afterYear = intval($beforeYear) - 1;
    }
    else{
        $afterMonth = intval($beforeMonth) - 1;
        $afterYear = intval($beforeYear);

        if(intval($afterMonth) == 1 || intval($afterMonth) == 3 || intval($afterMonth) == 5 || intval($afterMonth) == 7 || intval($afterMonth) == 8 || intval($afterMonth) == 10 || intval($afterMonth) == 12){
            $afterDay = 24 + intval($beforeDay);
        }
        else if(intval($afterMonth) == 4 || intval($afterMonth) == 6 || intval($afterMonth) == 9 || intval($afterMonth) == 11){
            $afterDay = 23 + intval($beforeDay);
        }
        else{
            $afterDay = 21 + intval($beforeDay);
        }
    }
}
else{
    $afterDay = intval($beforeDay) - 7;
    $afterMonth = $beforeMonth;
    $afterYear = $beforeYear;
}

if(intval($afterMonth) < 10){
    $afterMonth = "0".$afterMonth;
}
if(intval($afterDay) < 10){
    $afterDay = "0".$afterDay;
}

// Header file will use this to set the page title
$PageTitle="Delivered Orders Search";

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
<form method="POST" action="orderSearchResults.php" name="returnSearchForm" id="returnSearchForm">
    <h3>Search Store for Delivered Orders</h3>
    <table>
        <tr>
            <td colspan="3">
                <select name="chooseStore" id="chooseStore">";
                    <option>Select a Store</option>";
                    <?php
                        while($row = $stores->fetch_row())
                        {
                            $sId = $row[0];
                            $sCode = $row[1];
                            $sName = $row[2];
                            echo"<option value='$sId'>Id- $sId, code- $sCode, name- $sName</option>";
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
