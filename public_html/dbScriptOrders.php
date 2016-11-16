<?php

// Header file will use this to set the page title
$PageTitle="Vendor Orders";

// Header file will use this function to link your page to other css or js files

function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
    <link rel="stylesheet" href="./css/styles.css" />
<?php }

// Run the DB Script and output any errors for debugging
if(isset($_POST['submit'])){
    // Always connect to DB
    //$config = include('./inc/config.php');
    //$conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
	
		$addr = 'localhost';
								$user = 'wdean2';
								$pass = 'csc423?';
								$db = 'fal16_csc423_wdean2';

								$conn = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
								echo("Connected to Database<br>");
	
	
    if($conn->connect_error){
        echo "Error: Failed to make a MySQL connection, here is why:" ;
       
        
        exit;
    }

    // Always grab customer info from the form
    //$orderId = $_POST['orderId'];
    //$vendorId = $_POST['VendorId'];
    //$storeId = $_POST['storeId'];
    //$datetimeOrder = $_POST['datetimeOrder'];
    //$status = $_POST['status'];
    //$datetimeFullfillment = $_POST['datetimeFullfillment'];
    

    // Only run the following query if we are inserting
    if(isset($_POST['addOrder'])){
        $query =    "insert into Customer (CustomerId, Name, Address, City, State, ZIP, Phone, Email) ".
                    "values ('$cId', '$name', '$address', '$city', '$state', '$zip', '$phone', '$email')";
   
        $result = $conn->query($query);
        if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        else {
            echo "Customer created successfully" ;
        }
    }

    // Only run the following query if we are updating
    if(isset($_POST['updateOrder'])){
        $query= "update Customer ".
                "set Name='$name', Address='$address', City='$city',State='$state', ZIP='$zip', Phone='$phone', Email='$email' ".
                "where CustomerId='$cId'";

        $result = $conn->query($query);
        if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
        else {
            echo "Customer updateded successfully" ;
        }
    }
	// Only run the following query if we are viewing vendors orders
    if(isset($_POST['viewOrders'])){
        $vendorId = $_POST['vendorId'];
		$password = $_POST['password'];
		// check to see if vendor id and password are valid
		$vquery= "SELECT * FROM Vendor WHERE VendorId='$vendorId' AND Password='$password'";
		

		$result = $conn->query($vquery);
		if ($result->num_rows === 0) { 
		
			echo "please type in valid VendorId and Password";

		}
		else{
		  if(!$result) {
            echo "Error: Our query failed to execute and here is why: \n";
            echo "Query: " . $query . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }
		else{
		// if valid proceed to get vendors orders
		
		$result->free();
		
	
		
		
		
        $query= "SELECT *  FROM `Order`  WHERE VendorId = '$vendorId' ORDER BY CASE WHEN Status = 'Pending' THEN Status ='Delivered' ELSE Status ='Canceled' END, DateTimeOfOrder  ";
        $result = $conn->query($query);
	
 
	if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
    
    // Always close the connection
    
   else{

      ?>
 
    <?php 
      if( $result->num_rows==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }
	  
	  else{
		?>
		<form method="POST" action="dbScriptOrderDetails.php" name="viewOrderDetails" id="viewOrderDetails" >
<table border="2">
  <thead>
    <tr>
	  <th></th>
      <th>OrderId</th>
      <th>VendorId</th>
      <th>StoreId</th>
      <th>DateTimeOfOrder</th>
	  <th>Status</th>
	  <th>DateTimeOfFullfilment</th>
    </tr>
  </thead>
  <tbody>
		  <?php 
        while( $row = mysqli_fetch_array($result) ){
			
			$OrderId = $row['OrderId'];
			$StoreId = $row['StoreId'];
			$DateTimeOfOrder = $row['DateTimeOfOrder'];
			$Status = $row['Status'];
			$DateTimeOfFulfillment  = $row['DateTimeOfFulfillment'];
			
			
			
			
          echo "<tr><td><input class='radio' type='radio' name='order' value='$OrderId' ></td><td>$OrderId</td><td>$vendorId</td><td>$StoreId</td><td>$DateTimeOfOrder</td><td>$Status</td><td>$DateTimeOfFulfillment </td></tr>\n";
        
		
		
		
		
		
		}
		
		
		
		 
		 
		
		
		
		
		 echo"<tr><td></td><td><input type='submit' name='submit' value='Submit Form'/></td></tr>";
		echo "</table>";
		
		echo"<input type='hidden' name='viewOrderDetails'>";
		//echo"<input type='hidden' name='$OrderId'>";
      echo "</form>";
    }
   }
  }
		
  
  $conn->close();
  }
}
}

?>


// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./addCustomer.php' class='button'>Add A Customer</a></td>
        <td><a href='./selectCustomerToUpdate.php' class='button'>Update A Customer</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
