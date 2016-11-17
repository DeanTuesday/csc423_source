function setSelectedDeliveryOrder()
{
	var selectedOrder=	document.getElementById('orderOptions');   

	document.getElementById('oId').value = selectedOrder.options[selectedOrder.selectedIndex].value;
}