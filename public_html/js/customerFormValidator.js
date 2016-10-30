function validate(){
    try{
        if( !validName() ){ return false; }
        if( !validAddress() ){ return false; }
        if( !validCity() ){ return false; }
        if( !validState() ){ return false; }
        if( !validZip() ){ return false; }
        if( !validPhone() ){ return false; }
        if( !validEmail() ){ return false; }
    }
    catch(err) {
        alert("JAVASCRIPT ERROR NEEDS TO BE RESOLVED: " + err.message);
        return false;
    }

    return true;
}

function validName(){
    var vn = document.forms["customerForm"]["name"].value;
    var re = /^[a-zA-Z]+-? ?[a-zA-Z]*$/;
    if (!re.test(vn)){
        alert("Vendor name was not valid.");
        return false;
    }
    return true;
}

function validAddress(){
    var a = document.forms["customerForm"]["address"].value;
    var re = /^[\d]+ [a-zA-Z]+ [a-zA-Z]+\.?$/;
    if (!re.test(a)){
        alert("Address was not valid.");
        return false;
    }
    return true;
}

function validCity(){
    var city = document.forms["customerForm"]["city"].value;
    var re = /^[a-zA-Z]+[a-zA-Z -]*$/;
    if (!re.test(city)){
        alert("City was not valid.");
        return false;
    }
    return true;
}

function validState(){
    var state = document.forms["customerForm"]["state"].value;
    var re = /^[a-zA-Z]+[- ]*[a-zA-Z]*$/;
    if (!re.test(state)){
        alert("State was not valid.");
        return false;
    }
    return true;
}

function validZip(){
    var zip = document.forms["customerForm"]["zip"].value;
    var re = /[0-9]{5}/;
    if (!re.test(zip)){
        alert("Zip code was not valid.");
        return false;
    }
    return true;
}

function validPhone(){
    var phone = document.forms["customerForm"]["phone"].value;
    var re = /^[0-9]{3}[ -]?[0-9]{3}[ -]?[0-9]{4}$/;
    if (!re.test(phone)){
        alert("Phone Number was not valid.");
        return false;
    }
    return true;
}

function validEmail(){
    return true;
}