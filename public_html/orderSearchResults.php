<?php

if(!isset($_POST['submit'])){
    // TODO The selection page was skipped so kill the process
    echo "Error - Page was accessed illegally <br>";
    echo "<a href='./orderSearchForm.php'>Start a New Search</a> <br>";
    echo "<a href='./index.php'>Home</a>";
    exit;
}

include("./classes/DBHandler.php");
$dbHandler = new DBHandler();

$store = $_POST['chooseStore'];
$query = "SELECT StoreName FROM RetailStore WHERE StoreId = '$store'";
$storeName = $dbHandler->runQuery($query)->fetch_row()[0];

$beforeDate = $_POST['beforeYear']."/".$_POST['beforeMonth']."/".$_POST['beforeDay'];
$afterDate = $_POST['afterYear']."/".$_POST['afterMonth']."/".$_POST['afterDay'];

$query = "  SELECT t1.OrderId, ItemId, QuantityOrdered
            FROM (
                SELECT OrderId
                FROM `Order`
                WHERE Status = 'Delivered'
            ) AS t1
            INNER JOIN OrderDetail ON t1.OrderId = OrderDetail.OrderId
            ORDER BY OrderId ASC";

$result = $dbHandler->runQuery($query);

// Header file will use this to set the page title
$PageTitle="Order Search Results";

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
<h2>Delivered Orders to <?= $storeName ?></h2>
<table>
    <tr>
        <td><span style="font-weight: bold;">OrderId</span></td>
        <td><span style="font-weight: bold;">ItemId</span></td>
        <td><span style="font-weight: bold;">Quantity Ordered</span></td>
    </tr>
    <?php
        while($row = $result->fetch_row()){
            $orderId = $row[0];
            $itemId = $row[1];
            $quantity = $row[2];
            echo "<tr>";
            echo "<td>$orderId</td>";
            echo "<td>$itemId</td>";
            echo "<td>$quantity</td>";
            echo "</tr>";
        }
    ?>
</table>
<hr/>
<table>
    <tr>
        <td><a href='./orderSearchForm.php' class='button'>Start A New<br>Search</a></td>
        <td><a href='./index.php' class='button'>Home Page<br>&nbsp;</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
