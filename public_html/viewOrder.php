<?php

// Header file will use this to set the page title
$PageTitle="Add Item Form";

// Header file will use this function to link your page to other css or js files
function customPageHeader(){
?>
<!-- Add any CSS or JS files here -->
	<script src="./js/itemFormValidator.js" type="text/javascript"></script>
<?php }

// Header
include_once('./templates/header.php');
?>

<!-- Body Content Goes Here -->

<?php
// Footer
include_once('./templates/footer.php');
?>