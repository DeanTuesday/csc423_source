<?php

if(!isset($_POST['submit'])){
    // TODO The selection page was skipped so kill the process
    echo "Error - Page was accessed illegally <br>";
    echo "<a href='./returnSearchForm.php'>Start a New Search</a> <br>";
    echo "<a href='./index.php'>Home</a>";
    exit;
}

include("./classes/DBHandler.php");
$dbHandler = new DBHandler();

$vendor = $_POST['chooseVendor'];
$query = "SELECT VendorName FROM Vendor WHERE VendorId = '$vendor'";
$vendorName = $dbHandler->runQuery($query)->fetch_row()[0];

$beforeDate = $_POST['beforeYear']."-".$_POST['beforeMonth']."-".$_POST['beforeDay'];
$afterDate = $_POST['afterYear']."-".$_POST['afterMonth']."-".$_POST['afterDay'];

// find the top 10 highest quantity items returned for the chosen vendor
$query = "  SELECT t1.ItemId, Description, QuantityReturned
            FROM (
                SELECT ItemId, QuantityReturned
                FROM `ReturnToVendor`
                INNER JOIN `ReturnToVendorDetail` ON ReturnToVendor.ReturnToVendorId = ReturnToVendorDetail.ReturnToVendorId
                WHERE VendorId = '$vendor'
                    AND DateTimeOfReturn <= CAST( '$beforeDate' AS DATE )
                    AND DateTimeOfReturn >= CAST( '$afterDate' AS DATE )
                ORDER BY QuantityReturned DESC
                LIMIT 0 , 10
            ) AS t1
            INNER JOIN InventoryItem ON t1.ItemId = InventoryItem.ItemId;";
$result = $dbHandler->runQuery($query);

// Header file will use this to set the page title
$PageTitle="Return Search Results";

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
<h2>Top 10 Returns For <?= $vendorName ?></h2>
<table>
    <tr>
        <td><span style="font-weight: bold;">ItemId</span></td>
        <td><span style="font-weight: bold;">Description</span></td>
        <td><span style="font-weight: bold;">Quantity Returned</span></td>
    </tr>
    <?php
        while($row = $result->fetch_row()){
            $itemId = $row[0];
            $description = $row[1];
            $quantity = $row[2];
            echo "<tr>";
            echo "<td>$itemId</td>";
            echo "<td>$description</td>";
            echo "<td>$quantity</td>";
            echo "</tr>";
        }
    ?>
</table>
<hr/>
<table>
    <tr>
        <td><a href='./returnSearchForm.php' class='button'>Start A New<br>Search</a></td>
        <td><a href='./index.php' class='button'>Home Page</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
