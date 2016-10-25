<?php
echo "
<html>
	<head>
	<title>Update a Location</title>
		<script type='text/javascript' language='javascript'>
		function setSelectedStore()
		{
			var selectedStore = document.getElementById('storeOptions');   

			document.getElementById('storeId').value = selectedStore.options[selectedStore.selectedIndex].value;
		}

		function addOptionToStore(text, value)
		{
			ddl = document.getELementById('StoreOptions');
			var option = document.createElement('option');
			option.value = value;
			option.text = text;
			ddl.options.add(option);	
		}

		</script>
	</head>
	<body>
		<h2 align='center'>Update a Location</h1>

		<h3 align='center'>Select a Location to Update:</h2>
			<form id='selectStoreForm' name='selectStoreForm' method='POST' action='UpdateLocation.php' onsubmit='setSelectedStore();'>
				<table align='center'>
					<tr>
						<td>
							<select id='storeOptions'>
								<option>Select a Location</option>
								";

								$addr = 'localhost';
								$user = 'wdean2';
								$pass = 'csc423?';
								$db = 'fal16_csc423_wdean2';

								$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
								echo("Connected to Database<br>");

								$query = "Select StoreId, StoreCode, StoreName from RetailStore";
								$result = $db->query($query);

								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{

										$sId = $row["StoreId"];
										$sCode = $row["StoreCode"];
										$sName = $row["StoreName"];

										echo"<option value='$sId'>$sCode - $sName</option>";
									}
								}
								else
								{
								    echo "0 results";
								}

								$db->close();
							echo
								"
							</select>
						</td>
						<td>
							<input type='submit' value='Go'>
							<input name='SubmitCheck' type='hidden' value='sent'>
							<input name='storeId' id='storeId' type='hidden'>
						</td>
					</tr>
				</table>
			</form>
		<body>
</html>
";
?>