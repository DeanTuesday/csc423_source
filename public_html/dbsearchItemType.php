<?php

// Header file will use this to set the page title
$PageTitle="Vendor Orders";

// Header file will use this function to link your page to other css or js files



// Run the DB Script and output any errors for debugging

    // Always connect to DB
	
	$config = include('./inc2/config.php');
    $conn = $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);								
	
	
  
   mysql_select_db($config['db']);

        $itemtypename = $_POST['itemtypename'];
		$barcodeprefix = $_POST['barcodeprefix'];
		// check to see if vendor id and password are valid
		
		if(!$itemtypename)
		{
			
			$query = "Select ItemTypeName, BarcodePrefix, AgeSensitive, ValidityDays, Notes, Status ".
			"FROM InventoryItemType WHERE BarcodePrefix LIKE '%".$barcodeprefix."%';";
			
			
		}
		
		else{
			
			if(!$barcodeprefix)
			{
				
				$query= "Select ItemTypeName, BarcodePrefix, AgeSensitive, ValidityDays, Notes, Status ".
			"FROM InventoryItemType WHERE ItemTypeName LIKE '%".$itemtypename."%';";
				
				
				
			}
			
			else{
				
				$query= "Select ItemTypeName, BarcodePrefix, AgeSensitive, ValidityDays, Notes, Status ".
			"FROM InventoryItemType WHERE ItemTypeName LIKE '%".$itemtypename."%' AND BarcodePrefix LIKE '%".$barcodeprefix."%';";
						
			}
				
		}
		
		$result = mysql_query($query);
	
      ?>
 
<table border="2">
  <thead>
    <tr>
	 
      <th>ItemTypeName</th>
      <th>Barcode Prefix</th>
      <th>Age Sensitive</th>
      <th>Validity Days</th>
	  <th>Notes</th>
	  <th>Status</th>
    </tr>
  </thead>
  <tbody>
		  <?php 
		
       while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$itemtypename = $row['ItemTypeName'];
			$barcodeprefix = $row['BarcodePrefix'];
			$agesensitive = $row['AgeSensitive'];
			$validitydays = $row['ValidityDays'];
			$notes  = $row['Notes'];
			$status  = $row['Status'];
			    echo "<tr><td>$itemtypename</td><td>$barcodeprefix</td><td>$agesensitive</td><td>$validitydays</td><td>$notes</td><td>$$status</td></tr>\n";
	   }
		echo "</table>";
		
 mysql_close($conn);
  






// Header

?>