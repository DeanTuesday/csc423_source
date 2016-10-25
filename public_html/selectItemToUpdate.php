<?php
echo "
<html>
	<head>
	<title>Update a Item</title>
		<script type='text/javascript' language='javascript'>
		function setSelectedItem()
		{
			var selectedItem=	document.getElementById('itemOptions');   

			document.getElementById('vendorId').value = selectedItem.options[selectedItem.selectedIndex].value;
		}

		function addOptionToItems(text, value)
		{
			ddl = document.getELementById('ItemOptions');
			var option = document.createElement('option');
			option.value = value;
			option.text = text;
			ddl.options.add(option);	
		}

		</script>
	</head>
	<body>
		<h2 align='center'>Update a Item</h1>

		<h3 align='center'>Select a Item to Update:</h2>
			<form id='selectItemForm' name='selectItemForm' method='POST' action='UpdateItem.php' onsubmit='setSelectedItem();'>
				<table align='center'>
					<tr>
						<td>
							<select id='itemOptions'>
								<option>Select a Item</option>
								";

								$addr = 'localhost';
								$user = 'wdean2';
								$pass = 'csc423?';
								$db = 'fal16_csc423_wdean2';

								$db = new mysqli("$addr", "$user", "$pass", "$db") or die ("Unable to Connect");
								echo("Connected to Database<br>");

								$query = "Select ItemId, Decscription, Size from InventoryItem";
								$result = $db->query($query);

								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc())
									{

										$vId = $row["ItemId"];
										$vCode = $row["Decscription"];
										$vName = $row["Size"];

										echo"<option value='$vId'>$vCode - $vName</option>";
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
							<input name='itemId' id='itemId' type='hidden'>
						</td>
					</tr>
				</table>
			</form>
		<body>
</html>
";
?>