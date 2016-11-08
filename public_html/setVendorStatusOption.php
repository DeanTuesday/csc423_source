<?php
	if(isset($status))
	{
		if($status=='Inactive')
		{
			echo"<select id='statusOptions'><option>Active</option><option selected='selected'>Inactive</option></select>";
		}
		else
		{
			echo"<select id='statusOptions'><option>Active</option><option>Inactive</option></select>";									
		}
	}
	else if($vendorStatus=='Inactive')
	{
		echo"<select id='statusOptions'><option>Active</option><option selected='selected'>Inactive</option></select>";
	}
	else
	{
		echo"<select id='statusOptions'><option>Active</option><option>Inactive</option></select>";
	}
?>
