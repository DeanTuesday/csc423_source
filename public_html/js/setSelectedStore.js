function setSelectedStore()
{
	var selectedStore =	document.getElementById('storeOptions');   

	document.getElementById('storeId').value = selectedStore.options[selectedStore.selectedIndex].value;
}