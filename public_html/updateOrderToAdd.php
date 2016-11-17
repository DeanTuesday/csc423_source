<!DOCTYPE html>
<html>
<head>
	<!-- Appropriate Title and meta tags -->
	<title>Add Item To Existing Order</title>
	<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
	<meta http-equiv="Content-Language" content="en-us" />
	<meta name="description" content="CSC 423 Group Project" />
	<meta name="keywords" content="dean mondy, william dean, brian scarbrough, cory easton, mason mascle, marlin mei, csc 423, group 2" />
	<meta name="author" content="Dean Mondy, William Dean, Cory Easton, Marlin Mei, Mason Mascle, Brian Scarbrough" />
	<meta name="copyright" content="SUNY Brockport CSC 423 2016" />

	<!-- include the basic style sheet referenced by the header and footer -->
	<link rel="stylesheet" href="./css/header.css" />

	<!-- Custom Page Header for loading css or js files -->
	<!-- Add any CSS or JS files here -->
	<script src="./js/itemFormValidator.js" type="text/javascript"></script>
</head>
<!-- Open the body here, close the body in footer -->
<body>
<div class="page-container">
<!-- Body Content Goes Here -->

<h3>Current Order</h3>
	<table>
		<tr>
			<td align="right">Current Order:</td>
			<td><input type="text" name="currentOrder" id="currentOrder"></td>
		</tr>
	</table>
	<hr>

<form method="POST" action="updateOrderToAdd.php" name="addItem" ">
    <h3>Add an Item to Existing Order</h3>
    <table>
        <tr>
            <td align="right">Item Id:</td>
            <td><input type="text" name="itemId" id="itemId"></td>
        </tr>
        <tr>
            <td align="right">Item Quantity:</td>
            <td><input type="text" name="description" id="description"></td>
        </tr>
    </table><br>
    <hr/>
    <table>
        <tr>
            <td><button type="submit">Submit Information</button></td>
            <td><input type="reset"></td>
			<td><a href='./index.php' class='button'>Home</a></td>
        </tr>
    </table>
    <input type="hidden" name="addItem">
</form>

	<!-- page footer is inside of a page-container -->
	<footer>
		<p>
            Last updated: <!-- #BeginDate format:Am1 -->November 16th, 2016<!-- #EndDate -->
        </p>
	</footer>
<!-- close page-container -->
</div>
<!-- close body -->
</body>
<!-- close html -->
</html>