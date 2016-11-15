<?php

	if($vendorStatus=='Inactive')
	{
		echo"<select id='statusOptions'><option>Active</option><option selected='selected'>Inactive</option></select>";
	}
	else
	{
		echo"<select id='statusOptions'><option>Active</option><option>Inactive</option></select>";
	}
?>
