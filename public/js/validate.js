function setevent(eventname,functionname)
{
if (window.addEventListener)
window.addEventListener(eventname, functionname, false)
else if (window.attachEvent)
window.attachEvent(eventname, functionname)
else if (document.getElementById)
window.eventname=functionname
}

function isEmail(field,errormessage) {
if (field.value.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1) { field.style.backgroundColor=""; return true}
else { alert(errormessage); field.style.backgroundColor=error_color; field.focus();field.blur();field.select(); return false;}
}

function IsPhone(sText,errormessage)
{
   var ValidChars = "0123456789\/#";
   var IsNumber=true;
   var Char;
   sText.style.backgroundColor="";
   if (!((sText.value.length==0)||(sText.value==null)))
   for (i = 0; i < sText.value.length && IsNumber == true; i++) 
      { 
      Char = sText.value.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
	         IsNumber = false;
			 sText.style.backgroundColor=error_color;
			 alert(errormessage); 
			 sText.focus();
   			 sText.blur();
 			 sText.select();
			 return IsNumber;
         }
      } else  {IsNumber=false;alert(errormessage);sText.style.backgroundColor=error_color;sText.focus();sText.blur();sText.select();}
   return IsNumber;
}

function IsNumeric(sText,errormessage)
{
   var ValidChars = "0123456789.";
   var IsNumber=true;
   var Char;
   sText.style.backgroundColor="";
   if (!((sText.value.length==0)||(sText.value==null)))
   for (i = 0; i < sText.value.length && IsNumber == true; i++) 
      { 
      Char = sText.value.charAt(i); 
      if (ValidChars.indexOf(Char) == -1) 
         {
	         IsNumber = false;
			 sText.style.backgroundColor=error_color;
			 alert(errormessage); 
			 sText.focus();
   			 sText.blur();
 			 sText.select();
			 return IsNumber;
         }
      } else  {IsNumber=false;alert(errormessage);sText.style.backgroundColor=error_color;sText.focus();sText.blur();sText.select();}
   return IsNumber;
}
   
function IsEmpty(aTextField,errormessage) {
   if ((aTextField.value.length==0) || (aTextField.value==null))  { alert(errormessage);aTextField.focus();aTextField.blur();aTextField.select();aTextField.style.backgroundColor=error_color; return false;}
   else { aTextField.style.backgroundColor=""; return true;}
}	

function minLength(aTextField,minlength,errormessage)
{
	if (aTextField.value.length<minlength) {alert(errormessage);aTextField.focus();aTextField.blur();aTextField.select();aTextField.style.backgroundColor=error_color; return false;}
	else {aTextField.style.backgroundColor=""; return true;}
}

function checked(aTextField,errormessage) 
{
   if ((aTextField.checked != true))  { alert(errormessage);aTextField.focus();aTextField.blur();aTextField.select();aTextField.style.backgroundColor=error_color; return false;}
   else { aTextField.style.backgroundColor=""; return true;}
}

function passwordMatch(input1,input2,errormessage)
{
	if ((input1.value!=input2.value)||(input1.value=="")||(input1.value==null)) {alert(errormessage);input1.style.backgroundColor=error_color;input2.style.backgroundColor=error_color;input1.focus();input1.blur();input1.select();return false;}
	else {input1.style.backgroundColor=""; input2.style.backgroundColor="";return true;}
}

function RadioChecked(input,errormessage){
	var checked = false;
	for (var i=0; i<input.length; i++) {
		if (input[i].checked) {
			checked = true;
			break;
		}
	}
   if ( !checked )  { alert(errormessage); return false;}
   else { return true;}
}
