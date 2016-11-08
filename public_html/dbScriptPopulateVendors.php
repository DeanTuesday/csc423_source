<?php
    $config = include('./inc/config.php');
    $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);
    
    if (!$conn){
        die('Could not connect: '.mysql_error());
    }
    
    mysql_select_db($config['db']);
                        
    $sql = "Select VendorId, VendorCode, VendorName from Vendor";

    $result = mysql_query($sql);

    if(!$result ) {
        die('Could not enter data: ' . mysql_error());
    }
        while($row = mysql_fetch_assoc($result))
        {
            $vId = $row["VendorId"];
            $vCode = $row["VendorCode"];
            $vName = $row["VendorName"];
            echo"<option value='$vId'>$vCode - $vName</option>";
        }
        echo "</select>";
    mysql_close($conn);
?>