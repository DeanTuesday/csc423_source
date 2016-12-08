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

    // Always connect to DB
	
	$config = include('./inc/config.php');
    $conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
								
	
	
    if($conn->connect_error){
        echo "Error: Failed to make a MySQL connection, here is why:" ;
       
        
        exit;
    }

 
	// Only run the following query if we are viewing vendors orders
    if(isset($_POST['QuantityOverstocked'])){
        $threshold = $_POST['Threshold'];
		
		
		

		
	
		
		
		
        $query= "SELECT *  FROM `Inventory`  WHERE QuantityInStock >'$threshold' ";
        $result = $conn->query($query);
	
 
	if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
    
    // Always close the connection
    
   else{

      ?>
 
    <?php 
      if( $result->num_rows==0 ){
        echo '<tr><td colspan="4">No Overstocked Items</td></tr>';
      }
	  
	  else{
		?>
		
<table border="2">
  <thead>
    <tr>
	  
      <th>InventoryId</th>
      <th>StoreId</th>
      <th>ItemId</th>
      <th>QuantityInStock</th>
	  
    </tr>
  </thead>
  <tbody>
		  <?php 
        while( $row = mysqli_fetch_array($result) ){
			
			$InventoryId = $row['InventoryId'];
			$StoreId = $row['StoreId'];
			$ItemId = $row['ItemId'];
			$QuantityInStock = $row['QuantityInStock'];
			
			
			
			
			
          echo "<tr><td>$InventoryId</td><td>$StoreId</td><td>$ItemId</td><td>$QuantityInStock</td></tr>\n";
        
		
		
		
		
		
		}
		
		
		
		 
		 
		
		
		
		
		 
		echo "</table>";
		
		
      
    }
   }
  }
		
  
  $conn->close();
  






// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<table>
    <tr>
        <td><a href='./index.php' class='button'>Home</a></td>
        <td><a href='./selectOrderVendor.php' class='button'>Create an Order</a></td>
        <td><a href='./selectVendorToUpdate.php' class='button'>Add item to an existing Order</a></td>
    </tr>
</table>

<?php
// Footer
include_once('./templates/footer.php');
?>
