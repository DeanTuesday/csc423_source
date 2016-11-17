<?php
    $config = include('./inc/config.php');
    $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);
    
    if (!$conn){
        die('Could not connect: '.mysql_error());
    }
    
    mysql_select_db($config['db']);
    
	$sql = "Select OrderId, Vendor.VendorId, VendorName FROM `Vendor` ".
			"JOIN `Order` ON `Order`.VendorId = `Vendor`.VendorId;";

    $result = mysql_query($sql);

    if(!$result ) {
        die('Could not enter data: ' . mysql_error());
    }
	
	
	while($row = mysql_fetch_assoc($result))
	{
		$oId = $row["OrderId"];
		$vId = $row["VendorId"];
		$vName = $row["VendorName"];
		echo "<option value='".$oId."'>".$oId." - ".$vId." ".$vName."</option>";
	}
    mysql_close($conn);
?>