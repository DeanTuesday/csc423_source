<?php

// Header file will use this to set the page title
$PageTitle="Add Item to DB";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
<?php }

// Header
include_once('./templates/header.php');


// Run the DB script and echo any errors to the screen so we can debug
if(isset($_POST['addItem'])) {
    $config = include('./inc/config.php');

    $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);
    
    if (!$conn){
        die('Could not connect: '.mysql_error());
    }
    else{
        echo("Connected to Database<br>");
    }
    
    mysql_select_db($config['db']);
    
    $itemId = $_POST['itemId'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $division = $_POST['division'];
    $department = $_POST['department'];
    $category = $_POST['category'];
    $cost = $_POST['cost'];
    $retail = $_POST['retail'];
    $image = $_POST['image'];
    $vendorId = $_POST['vendorId'];
    
    $sql = "insert into InventoryItem (ItemId, Description, Size, Division, Department, Category, ItemCost, ItemRetail, ImageFileName, VendorId) ".
            "values ('$itemId', '$description', '$size', '$division', '$department', '$category', '$cost', '$retail', '$image', '$vendorId')";

    $result = mysql_query($sql);
    
    if(!$result ) {
        die('Could not enter data: ' . mysql_error());
    }
    
    echo "Entered data successfully\n";
    
    mysql_close($conn);
}

if(isset($_POST['updateItem'])) {
    //TODO
}
?>

<!-- Body Content Goes Here -->
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./addItem.php' class='button'>Add An Item</a></td>
        <td><a href='./selectItemToUpdate.php' class='button'>Update An Item</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
