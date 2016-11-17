<?php

// Header file will use this to set the page title
$PageTitle="Select Order To Process";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/vendorFormValidator.js" type="text/javascript"></script>
	<script src="./js/setSelectedDeliveryOrder.js" type="text/javascript"></script>
<?php }


// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<h2 align='center'>Process a Delivery</h2>

<h3 align='center'>Select an Order to Process:</h3>
<form id='processDeliveryForm' name='processDelivery' method='POST' action='setDeliveryProcessConfirmation.php' onSubmit="setSelectedDeliveryOrder()">
	<table align='center'>
		<tr>
			<td>
				<select id='orderOptions'>";
	        		<option>Select an Order</option>";
					<?php
					include_once('./dbScriptPopulateOrders.php');
					?>
                    
				</select>
			</td>
			<td>
				<input type='submit' value='Go'>
				<input name='SubmitCheck' type='hidden' value='sent'>
				<input name='oId' id='oId' type='hidden'>
			</td>
		</tr>
	</table>
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>