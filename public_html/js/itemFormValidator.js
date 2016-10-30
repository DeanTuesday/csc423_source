function validate(){
	try{
		if( !validID() ){ return false; }
		if( !validDescription() ){ return false; }
		if( !validSize() ){ return false; }
		if( !validDepartment() ){ return false; }
		if( !validCost() ){ return false; }
		if( !validRetail() ){ return false; }
		if( !validImage() ){ return false; }
	}
	catch(err) {
		alert("JAVASCRIPT ERROR NEEDS TO BE RESOLVED: " + err.message);
		return false;
	}

	return true;
}

function validID(){
	var iid = document.forms["addItem"]["itemId"].value;
	var re = /^120[0-9]{4}$/;
	if(!re.test(iid)){
		alert("Item Id was not valid.");
		return false;
	}
	return true;
}

function validDescription(){
	var desc = document.forms["addItem"]["description"].value;
	var re = /^[a-zA-Z0-9 .]+$/;
	if (!re.test(desc)){
        alert("Item Description was not valid.");
        return false;
	}
	return true;
}

function validSize(){
	var size = document.forms["addItem"]["size"].value;
	var re = /^[0-9]+[a-zA-Z]+$/;
	if (!re.test(size)){
		alert("Size was not valid.");
		return false;
	}
	return true;
}

function validDepartment(){
	var department = document.forms["addItem"]["department"].value;
	var re = /^[a-zA-Z]+$/;
	if (!re.test(department)){
		alert("Department was not valid.");
		return false;
	}
	return true;
}

function validCost(){
	var cost = document.forms["addItem"]["cost"].value;
	var re = /^[0-9]+.[0-9]{2}$/;
	if (!re.test(cost)){
		alert("Cost Price was not valid.");
		return false;
	}
	return true;
}

function validRetail(){
	var retail = document.forms["addItem"]["retail"].value;
	var re = /^[0-9]+.[0-9]{2}$/;
	if (!re.test(retail)){
		alert("Retail Price was not valid.");
		return false;
	}
	return true;
}

function validImage(){
	var image = document.forms["addItem"]["image"].value;
	var re = /^[0-9a-zA-Z _.]+.jpg$/;
	if (!re.test(image)){
        alert("Image Name was not valid.");
        return false;
	}
	return true;
}
