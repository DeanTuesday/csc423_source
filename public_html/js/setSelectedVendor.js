function setSelectedVendor()
{
	var selectedVendor=	document.getElementById('vendorOptions');   

	document.getElementById('vendorId').value = selectedVendor.options[selectedVendor.selectedIndex].value;
}