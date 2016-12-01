<?php
    $PageTitle="Enter Item Type";
    $config = include('./inc2/config.php');
    $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);
    
    if (!$conn){
        die('Could not connect: '.mysql_error());
    }
    
    mysql_select_db($config['db']);
                        
    $itname = $_POST['itname'];
    $units = $_POST['units'];
    $unitmeasure = $_POST['unitmeasure'];
    $vdays = $_POST['vdays'];
    $barcodeprefix = $_POST['barcodeprefix'];
    $reorderpoint = $_POST['reorderpoint'];
    $agesent = $_POST['agesent'];
    $notes = $_POST['notes'];
    
   
    
    $sql = "insert into InventoryItemType (ItemTypeName, Units, UnitMeasure, ValidityDays, BarcodePrefix, ReorderPoint, AgeSensitive, Notes) ".
            "values ('$itname', '$units', '$unitmeasure', '$vdays', '$barcodeprefix', '$reorderpoint', '$agesent', '$notes')";

		
	mysql_close($conn);

include_once('./templates/header.php');

?>