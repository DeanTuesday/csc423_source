<?php
 	$config = include('./inc/config.php');
    $conn = mysql_connect($config['addr'], $config['user'], $config['pass']);
    
    if (!$conn){
        die('Could not connect: '.mysql_error());
    }
    
    mysql_select_db($config['db']);
    
	/*$sql = "Select Status, DateTimeOfFulfillment FROM `Order` Where `Order`.OrderId = '". $_POST['oId']."';";

    $result = mysql_query($sql);

    if(!$result ) {
        die('Could not find data: ' . mysql_error());
    }*/
	//session_start();
	
	$row = mysql_fetch_assoc($result);
	$oId = $_POST["oId"];
	$status = 'Delivered';
	$time = date("Y-m-d H:i:s");
	
	$sql = "Update `Order` set Status='".$status."', DateTimeOfFulfillment = '$time' where OrderId = '".$oId."'";
	
	$result = mysql_query($sql);
	
	if(!$result) {
        die('Could not update data: ' . mysql_error());
    }

	// Header file will use this to set the page title
	$PageTitle="Confirm Delivery Process";
	
	// Header file will use this function to link your page to other css or js files
	function customPageHeader(){
	}
	
	
	// Header
	include_once('./templates/header.php');
?>
<link rel="stylesheet" href="./css/styles.css" />

<!-- Body Content Goes Here -->
<h2 align='center'>Process a Delivery</h2>

<h3 align='center'>Success! Delivery was processed!</h3>
<table align="center">
	    <tr>
	        <td><a href='./index.php' class='button'>Home</a></td>
	        <td><a href='./selectDeliveryToProcess.php' class='button'>Process Another Delivery</a></td>
	    </tr>
</table>

<?php
	// Footer
	include_once('./templates/footer.php');
	mysql_close($conn);
?>