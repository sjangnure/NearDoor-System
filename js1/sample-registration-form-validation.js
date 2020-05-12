function formValidation()
{
//var uid = document.registration.userid;
var fname = document.registration.fname;
var lname = document.registration.lname;
var passid = document.registration.passid;
//var phone = document.registration.phone;
var uemail = document.registration.email;
var ustreet = document.registration.Street;
var uneigh = document.registration.neighborhood;
var ustate = document.registration.state;
var ucountry = document.registration.country;
var uzip = document.registration.zip;

if(userid_validation(uid,5,12))
{
if(allLetter(fname))
{
if(allLetter(lname))
{
if(passid_validation(passid,7,12))
{
if(ValidateEmail(uemail))
{
if(blockselect(ublock))
{
if(neighselect(uneigh))
{

if(stateselect(ustate))
{

if(countryselect(ucountry))
{
if(allnumeric(uzip))
{
}
}
}
} 
}
}
} 
}
}
}

return false;

} function userid_validation(uid,mx,my)
{
var uid_len = uid.value.length;
if (uid_len == 0 || uid_len >= my || uid_len < mx)
{
alert("User Id should not be empty / length be between "+mx+" to "+my);
uid.focus();
return false;
}
return true;
}
function passid_validation(passid,mx,my)
{
var passid_len = passid.value.length;
if (passid_len == 0 ||passid_len >= my || passid_len < mx)
{
alert("Password should not be empty / length be between "+mx+" to "+my);
passid.focus();
return false;
}
return true;
}
function allLetter(uname)
{ 
var letters = /^[A-Za-z]+$/;
if(uname.value.match(letters))
{
return true;
}
else
{
alert('Username must have alphabet characters only');
uname.focus();
return false;
}
}
function alphanumeric(uadd)
{ 
var letters = /^[0-9a-zA-Z]+$/;
if(uadd.value.match(letters))
{
return true;
}
else
{
alert('User address must have alphanumeric characters only');
uadd.focus();
return false;
}
}
function neighselect(uneigh)
{
if(uneigh.value == "Default")
{
alert('Select your neighborhood from the list');
uneigh.focus();
return false;
}
else
{
return true;
}
}

function blockselect(ublock)
{
if(ublock.value == "Default")
{
alert('Select your block from the list');
ublock.focus();
return false;
}
else
{
return true;
}
}

function stateselect(ustate)
{
if(ustate.value == "Default")
{
alert('Select your state from the list');
ustate.focus();
return false;
}
else
{
return true;
}
}

function countryselect(ucountry)
{
if(ucountry.value == "Default")
{
alert('Select your country from the list');
ucountry.focus();
return false;
}
else
{
return true;
}
}
function allnumeric(uzip)
{ 
var numbers = /^[0-9]+$/;
var x=0;
if(uzip.value.match(numbers))
{
	x++;
}
if(x==0)
{
alert('ZIP code must have numeric characters only');
uzip.focus();
return false;
}
else
{
alert('Form Succesfully Submitted');
window.location.href="insert.php"
return true;
}
}
function ValidateEmail(uemail)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(uemail.value.match(mailformat))
{
return true;
}
else
{
alert("You have entered an invalid email address!");
uemail.focus();
return false;
}
} function validsex(umsex,ufsex)
{
x=0;

if(umsex.checked) 
{
x++;
} if(ufsex.checked)
{
x++; 
}
if(x==0)
{
alert('Select Male/Female');
umsex.focus();
return false;
}
}
