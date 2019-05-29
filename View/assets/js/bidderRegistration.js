
var bidder_fname = document.getElementById("fname");
var bidder_lname = document.getElementById("lname");
var bidder_email = document.getElementById("email");
var price = document.getElementById("price");
var addr = document.getElementById("addr");
var bidder_phone = document.getElementById("phone");
//var item_name = document.getElementById("item_name");
var submit_button = document.getElementById("submit_button"); 

function validateForm(){
    var valFname = validateName(bidder_fname, "FirstName");
    var valLname = validateName(bidder_lname, "LastName");
    var valEmail = validateEmail(bidder_email);
    var valPrice = validatePrice(price);
    var valAddr = validateAddress(addr);
    var valPhone = validatePhone(bidder_phone);
    var error;
    
    if(valFname != ""){
        var error_msg_fname = document.getElementById("error_msg_fname");
        error_msg_fname.innerHTML = valFname + "\n";
        error += valFname;
        //return false;

    }
    if(valLname != ""){
        var error_msg_lname = document.getElementById("error_msg_lname");
        error_msg_lname.innerHTML = valLname + "\n";
        error += valLname;
        return false;

    }
    if(valEmail != ""){
        var error_msg_email = document.getElementById("error_msg_email");
        error_msg_email.innerHTML = valEmail + "\n";
        error += valEmail;
        return false;

    }
    if(valAddr != ""){
        var error_msg_addr = document.getElementById("error_msg_addr");
        error_msg_addr.innerHTML = valAddr + "\n";
        error += valAddr;
        return false;

    }
    
    if(valPrice != ""){
        var error_msg_price = document.getElementById("error_msg_price");
        error_msg_price.innerHTML = valPrice + "\n";
        error += valPrice;
        return false;

    }
    
    if(valPhone != ""){
      var error_msg_phone = document.getElementById("error_msg_phone");
        error_msg_phone.innerHTML = valPhone + "\n";
        error += valPhone;
        return false;

    }
        return true;

    
    

}


function validateName(fld, nameType){
    word = fld.value
    error = "";
    if ((/^[a-zA-Z]/.test(fld.value))) {
        error = "";
        fld.style.borderColor = 'lightgray';

    }

    else if(fld.value.length == 0){
        //alert(word.length);
        fld.style.borderColor = 'red';
        error = "You didn't enter " + nameType;
    }
    else{
        fld.style.borderColor = 'red';   
        error = "You didn't enter a valid " + nameType;
    }
    return error;
 }

function trim(s)
/**
 * This functions removes extra spaces from the 
 * given string
 */
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
        fld.style.background = 'White';
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



function validatePrice(fld){

    error = "";
 if((isNaN(fld.value)))
        {
        fld.style.borderColor = 'red'; 
        error = "price must be a number";
        }
else if(fld.value.length == 0){

        fld.style.borderColor = 'red'; 
        error = "price can't be empty";
}

    return error;

}