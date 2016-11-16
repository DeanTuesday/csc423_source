<?php
    $config = include('./inc/config.php');
    $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);
    
    if (!$conn){
        die('Could not connect: '.mysql_error());
    }
    
    mysql_select_db($config['db']);
                        
    $sql = "Select StoreId, StoreCode, StoreName from Vendor";

    $result = mysql_query($sql);

    if(!$result ) {
        die('Could not enter data: ' . mysql_error());
    }
        while($row = mysql_fetch_assoc($result))
        {
            $sId = $row["StoreId"];
            $scode = $row["StoreCode"];
            $sname = $row["StoreName"];
            echo"<option value='$sId'>$scode - $sname</option>";
        }
    mysql_close($conn);
?>