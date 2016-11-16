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
//if(isset($_POST['submit'])){
    // Always connect to DB
    //$config = include('./inc/config.php');
    //$conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
	
		$config = include('./inc/config.php');
    $conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
								echo("Connected to Database<br>");
	
	
    if($conn->connect_error){
        echo "Error: Failed to make a MySQL connection, here is why:" ;
       
        
        exit;
    }

   
    

    
	
    if(isset($_POST['viewOrderDetails'])){
		
		if(isset($_POST['order'])){
        $OrderId = $_POST['order'];
		

    $query= "SELECT *  FROM `OrderDetail`  WHERE OrderId = '$OrderId'";
        $result = $conn->query($query);


      ?>
    
<table border="2">
  <thead>
    <tr>
      <th>OrderDetailId</th>
      <th>OrderId</th>
      <th>ItemId</th>
      <th>QuantityOrdered</th>
	 
    </tr>
  </thead>
  <tbody>
    <?php 
      if( $result->num_rows==0 ){
        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
      }
	  else{
		  
        while( $row = mysqli_fetch_array($result) ){
			
			$OrderDetailId = $row['OrderDetailId'];
			$OrderId = $row['OrderId'];
			$ItemId = $row['ItemId'];
			$QuantityOrdered = $row['QuantityOrdered'];
			
			
			
			
			
          echo "<tr><td>$OrderDetailId</td><td>$OrderId</td><td>$ItemId</td><td>$QuantityOrdered</td></tr>\n";
        
		
		
		
		
		
		}
		
		
		echo "</table>";
      }
    }
	}
	$conn->close();
  //}
  
  
  
  






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
