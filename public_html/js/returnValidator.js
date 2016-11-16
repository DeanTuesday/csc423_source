function validate(){
	if( !validateQuantity() ){ return false; }
	return true;
}

function validateQuantity(){
	var quantity = document.forms["returnItem"]["quantity"].value;
	var re = /^[0-9]+$/;
	if(!re.test(quantity)){
		alert("Quantity must be a positive integer.");
		return false;
	}
	return true;
}