
<?php
// Header file will use this to set the page title
$PageTitle="View an Inventory";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/setSelectedStore.js" type="text/javascript"></script>
<?php }


// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->
<h2 align='center'>View an Inventory</h1>

<h3 align='center'>Select Store:</h2>
<form id='selectStoreForm' name='selectStoreForm' method='POST' action='viewStoreInventory.php'>
	<table align='center'>
		<tr>
			<td bgcolor="#FFFFFF">
				<center>
				<select id='storeOptions' onchange='setSelectedStore()'>";
	        		<option>Select store:</option>";
					<?php
					include_once('./dbScriptPopulateStores.php');
					?>
				</select>
				</center>
			</td>
			<td>
				<input type='submit' value='Go'>
				<input name='SubmitCheck' type='hidden' value='sent'>
				<input name='storeId' id='storeId' type='hidden'>
			</td>
		</tr>
	</table>
</form>

<?php
// Footer
include_once('./templates/footer.php');
?>