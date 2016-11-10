<?php

    $config = include('./inc/config.php');
    $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);
    
    if (!$conn){
        die('Could not connect: '.mysql_error());
    }
    
    mysql_select_db($config['db']);
                        
    $sql = "Select VendorCode, VendorName, Address, City, State, ZIP, Phone, ContactPersonName, Status, Password from Vendor Where VendorId=$vendorId";

    $result = mysql_query($sql);

        while($row = mysql_fetch_assoc($result))
        {
			$vcode = $row["VendorCode"];
			$vname = $row["VendorName"];
			$address = $row["Address"];
			$city = $row["City"];
			$state = $row["State"];
			$zip = $row["ZIP"];
			$phone = $row["Phone"];
			$contact = $row["ContactPersonName"];
			$vendorStatus = $row["Status"];
			$vendorPwd = $row["Password"];
		}
		
	mysql_close($conn);



?>