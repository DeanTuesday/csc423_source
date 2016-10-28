 <?php
header('Content-type: text/javascript');
?>
function test(){
	alert('working');
	return false;
}

function validateFunction(){
	validateItemId();
	validateDescription();
	validateSize();
    validateDepartment();
	validateCost();
	validateRetail();
	validateImage();
	return false;
}
function validateItemId(){
	var iid = document.getElementById("itemid").value;
	if (!/^120[0-9]{4}$/.test(iid)){
        alert("Item Id was not valid.");
	}
}
function validateDescription(){
	var desc = document.getElementById("description").value;
	if (!/^[a-zA-Z0-9 .]+$/.test(desc)){
        alert("Item Description was not valid.");
	}
}
function validateSize(){
	var size = document.getElementById("size").value;
	if (!/^[0-9]+[a-zA-Z]+$/.test(size)){
		alert("Size was not valid.");
	}
}
function validateDepartment(){
	var department = document.getElementById("department").value;
	if (!/^[a-zA-Z]+$/.test(department)){
		alert("Department was not valid.");
	}
}
function validateCost(){
	var cost = document.getElementById("cost").value;
	if (!/^[0-9]+.[0-9]{2}*$/.test(cost)){
		alert("Cost Price was not valid.");
	}
}
function validateRetail(){
	var retail = document.getElementById("retail").value;
	if (!/^[0-9]+.[0-9]{2}*$/.test(retail)){
		alert("Retail Price was not valid.");
	}
}
function validateImage(){
	var image = document.getElementById("image").value;
	if (!/^[0-9a-zA-Z _.]+.jpg$/.test(image)){
        alert("Image Name was not valid.");
	}
}
