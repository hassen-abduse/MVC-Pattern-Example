
var companyName = document.getElementById("company_name");
var companyAddress = document.getElementById("company_addr");
var companyEmail = document.getElementById("company_email");
var companyUname = document.getElementById("company_uname");
var companyPwd = document.getElementById("company_pwd");
var companyTin = document.getElementById("company_tin");
var error_msg_holder = document.getElementById("error_msg");

function validateForm(){
    var validateEmailReturn = validateEmail(companyEmail);
    var validateAddrReturn = validateAddress(companyAddress);
    var validateNameReturn = validateName(companyName, "Company Name");
    var validateUsernameReturn = validateUsername(companyUname);
    var validatePasswordReturn = validatePassword(companyPwd);
    var validateTinNumberReturn = validateTinNumber(companyTin);

    error_msg = "";

   if (validateNameReturn != ""){
       var error_msg_name = document.getElementById("error_msg_name");
       error_msg_name.innerHTML = validateNameReturn;
       error_msg += validateNameReturn +"\n";

    }
    if (validateEmailReturn != ""){
       var error_msg_email = document.getElementById("error_msg_email");
       error_msg_email.innerHTML = validateEmailReturn;
       error_msg += validateEmailReturn +"\n";

    }
    if (validateAddrReturn != ""){
       var error_msg_address = document.getElementById("error_msg_address");
       error_msg_address.innerHTML = validateAddrReturn;
       error_msg += validateAddrReturn +"\n";

    }
    if (validateUsernameReturn != ""){
       var error_msg_uname = document.getElementById("error_msg_uname");
       error_msg_uname.innerHTML = validateUsernameReturn;
        error_msg += validateUsernameReturn +"\n";

    }
    if (validatePasswordReturn != ""){
       var error_msg_pwd = document.getElementById("error_msg_pwd");
       error_msg_pwd.innerHTML = validatePasswordReturn;
       error_msg += validatePasswordReturn +"\n";

    }
    if (validateTinNumberReturn != ""){
        var error_msg_tin = document.getElementById("error_msg_tin");
        error_msg_tin.innerHTML = validateTinNumberReturn;
        error_msg += validateTinNumberReturn +"\n";

    }
    
    //error_msg_holder.innerHTML = error_msg;
    
    if(error_msg == ""){
        return true;
    }
    else
        {return false;}


}



function validateName(fld, nameType){
    word = fld.value
    error = "";
    
   if(word.length == 0){
       fld.style.borderColor = 'red';
        error = "You didn't enter" + nameType;
    }
    else if (!(/^[a-zA-Z]/.test(word))) {
        fld.style.borderColor = 'red';
    error = "You didn't enter a valid" + nameType;
}


    return error;
 }

function validateUsername(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
 
    if (fld.value == "") {
        fld.style.borderColor = 'red';
        error = "You didn't enter a username.\n";
    } else if ((fld.value.length < 5) || (fld.value.length > 15)) {
        fld.style.borderColor = 'red'; 
        error = "The username is the wrong length.\n";
    } else if (illegalChars.test(fld.value)) {
        fld.style.borderColor = 'red';
        error = "The username contains illegal characters.\n";
    } else {
        fld.style.borderColor = 'red';
    } 
    return error;
}



function validatePassword(fld) {
    var error = "";
    var illegalChars = /[\W_]/; // allow only letters and numbers 
 
    if (fld.value == "") {
        fld.style.borderColor = 'red';
        error = "You didn't enter a password.\n";
    } else if ((fld.value.length < 8) || (fld.value.length > 15)) {
        error = "The password is the wrong length. \n Password Must be 8-15 chars";
        fld.style.borderColor = 'red';
    } else if (illegalChars.test(fld.value)) {
        error = "The password contains illegal characters.\n";
        fld.style.borderColor = 'red';
    } else if (!((fld.value.search(/(a-z)+/)) && (fld.value.search(/(0-9)+/)))) {
        error = "The password must contain at least one numeral.\n";
        fld.style.borderColor = 'red';
    } else {
        fld.style.background = 'White';
    }
   return error;
}  



function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
} 

function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
    
    if (fld.value == "") {
        fld.style.borderColor = 'red';
        error = "You didn't enter an email address.\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
        fld.style.borderColor = 'red';
        error = "Please enter a valid email address.\n";
    } else if (fld.value.match(illegalChars)) {
        fld.style.borderColor = 'red';
        error = "The email address contains illegal characters.\n";
    } else {
        fld.style.borderColor = 'red';
    }
    return error;
}

function validateAddress(fld){
    error = "";
    if(fld.value.length == 0){
        
        fld.style.borderColor = 'red'; 
        error = "Address can't be empty";
    }
    else if(fld.value.length > 30){
    fld.style.borderColor = 'red'; 
    error = "Address must be less than 30 characters";
    
    }
    else if(!(isNaN(fld.value))){
    fld.style.borderColor = 'red'; 
    error = "Address can only contain Strings";
    
    
    }
return error;
    
    
}

function validatePhone(fld) {
    var error = "";
    var stripped = fld.value.replace(/[\(\)\.\-\ ]/g, '');     

   if (fld.value == "") {
        error = "You didn't enter a phone number.\n";
        fld.style.borderColor = 'red';
    } else if (isNaN(stripped)) {
        error = "The phone number contains illegal characters.\n";
        fld.style.borderColor = 'red';
    } else if (!(stripped.length == 10)) {
        error = "The phone number is the wrong length. Make sure you included an area code.\n";
        fld.style.borderColor = 'red';
    } 
    return error;
}



function validateTinNumber(fld){
    trimmedTin = trim(fld.value);
    error="";
	if(trimmedTin.length==10){
		var b = parseInt(trimmedTin);
        
        if(!(b)){  
            fld.style.borderColor = 'red';
		    error =  "tin number can't contain characters!!";
        }

    }
    else if(trimmedTin.length != 10){
        fld.style.borderColor = 'red';
        error = "Please enter a 10 digit tin number";

    }
    return error;
}


