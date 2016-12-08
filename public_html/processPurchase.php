<?php
include_once('./inc/runDbQuery.php');
// Header file will use this to set the page title
$PageTitle="Handle a Customer Purchase";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
    <script src="./js/vendorFormValidator.js" type="text/javascript" language="javascript"></script>

<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<?php
$customerId = $_POST['customerId'];
$storeId = $_POST['storeId'];
$result= runDbQuery("Select * from Customer where CustomerId='$customerId'");
while($row=$result->fetch_assoc())
{
     $customerName = htmlspecialchars($row['Name']);
}

$purchaseTotal=0;
$result= runDbQuery("Select * From InventoryItem");
while($row=$result->fetch_assoc())
{   
     $itemId = $row['ItemId'];

     if(isset($_POST["$itemId"]) && $_POST["$itemId"] != 0)
     {
        $purchaseTotal += ($_POST["$itemId"] * $row['ItemRetail']);
        $result2 = runDbQuery("Select * from Inventory where ItemId=$itemId");
        while($row2=$result2->fetch_assoc())
        {
            $quantityInStock = $row2['QuantityInStock'];
            $quantityInStock -= $_POST["$itemId"];

            $result3 = runDbQuery("Update Inventory set QuantityInStock = $quantityInStock where ItemId=$itemId");
            $orderTime = (new \DateTime())->format('Y-m-d H:i:s');
            $quantityOrdered = $_POST["$itemId"];
            $result4 = runDbQuery("Insert Into CustomerPurchase (CustomerId, DateTimeOfPurchase, ItemId, QuantityPurchased, StoreId) values ('$customerId', '$orderTime', '$itemId', $quantityOrdered, $storeId)");
        }
     }
}

echo "<h2>Purchase Confirmation</h2>";
echo "Purchase for $customerName Successful!<br>";
echo "Order Amount: $purchaseTotal<br>"; 
echo "Date and Time of Order: $orderTime<br>";
?>
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./selectStorePurchase.php' class='button'>Customer Purchase</a></td>
        <td><a href='./selectStoreInventory.php' class='button'>View Store Inventory</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
