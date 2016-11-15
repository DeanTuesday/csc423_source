function validate(){
	try{
		if( !validateVCode() ){ return false; }
		if( !validateVName() ){ return false; }
		if( !validateAddress() ){ return false; }
		if( !validateCity() ){ return false; }
		if( !validateState() ){ return false; }
		if( !validateZip() ){ return false; }
		if( !validatePhone() ){ return false; }
		if( !validateContactName() ){ return false; }

		if(document.getElementById("updatePasswordFlag").value=="true")
		{
			if( !validatePassword() ){ return false; }
		}

	}
	catch(err) {
		alert("JAVASCRIPT ERROR NEEDS TO BE RESOLVED: " + err.message);
		return false;
	}
	return true;
}

function validateVCode(){
	var vc = document.getElementById("vcode").value;
	if (!/^[a-zA-Z0-9]*$/.test(vc)||/^$/.test(vc)){
        alert("Vendor Code was not valid.");
        return false;
	}
	return true;
}

function validateVName(){
	/*
		var vn = document.getElementById("vname").value;
		if (!/^[a-zA-Z]+-? ?[a-zA-Z]*$/.test(vn)){
	        alert("Vendor name was not valid.");
	        return false;
		}
	*/
	return true;
}

function validateAddress(){
	/*
		var a = document.getElementById("address").value;
		if (!/^[\d]+ [a-zA-Z]+ [a-zA-Z]+\.?$/.test(a)){
			alert("Address was not valid.");
	        return false;
		}
	*/
	return true;
}

function validateCity(){
	var city = document.getElementById("city").value;
	if (!/^[a-zA-Z]+[a-zA-Z -]*$/.test(city)){
		alert("City was not valid.");
        return false;
	}
	return true;
}

function validateState(){
	var state = document.getElementById("state").value;
	if (!/^[a-zA-Z]+[- ]*[a-zA-Z]*$/.test(state)){
		alert("State was not valid.");
        return false;
	}
	return true;
}

function validateZip(){
	var zip = document.getElementById("zip").value;
	if (!/[0-9]{5}/.test(zip)){
        alert("Zip code was not valid.");
        return false;
	}
	return true;
}

function validatePhone(){
	var phone = document.getElementById("phone").value;
	if (!/^[0-9]{3}[ -]?[0-9]{3}[ -]?[0-9]{4}$/.test(phone)){
        alert("Phone Number was not valid.");
        return false;
	}
	return true;
}

function validateContactName(){
	var cn = document.getElementById("contact").value;
	if (!/^[a-zA-Z]+[a-zA-Z -]*$/.test(cn)){
        alert("Contact Name was not valid.");
        return false;
	}
	return true;
}

function validatePassword(){
	var newPwd = document.getElementById("newPwd").value;
	var confirmNewPwd = document.getElementById("confirmNewPwd").value;
	if (newPwd.length < 8){
        alert("Password must be at least 8 characters in length.");
        return false;
	}
	if (newPwd != confirmNewPwd){
		alert("New Password does not match confirmation field.");
		return false;
	}
	return true;
}

