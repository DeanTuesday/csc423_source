<?php




echo "
<html>
	<head>
	<title>Update a Vendor</title>
		<script type='text/javascript' language='javascript'>
		function setSelectedVendor()
		{
			var selectedVendor=	document.getElementById('vendorOptions');

			document.getElementById('vendorId').value = selectedVendor.options[selectedVendor.selectedIndex].value;
		}
		</script>
	</head>
	<body>
		<h2 align='center'>Update a Vendor</h1>

		<h3 align='center'>Select a Vendor to Update:</h2>
			<form id='selectVendorForm' name='selectVendorForm' method='POST' action='UpdateVendor.php' onsubmit='setSelectedVendor();'>
				<table align='center'>
					<tr>
						<td>
							<select id='vendorOptions'>
								<option>Select a Vendor</option>
								<option name='option1' value='1'>Option 1</option>
								<option name='option2' value='2'>Option 1</option>
							</select>
						</td>
						<td>
							<input type='submit' value='Go'>
							<input name='SubmitCheck' type='hidden' value='sent'>
							<input name='vendorId' id='vendorId' type='hidden'>
						</td>
					</tr>
				</table>
			</form>
		<body>
</html>
"
?>