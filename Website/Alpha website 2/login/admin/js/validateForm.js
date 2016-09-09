var errorMessage = "";
var fullnameOK, emailOK, usernameOK, passwordOK;

function validateForm()
{
	var formObj = document.getElementById("registerForm");
	
	var fullname = formObj.fullName.value;
	var email = formObj.email.value;
	var username = formObj.username.value;
	var password = formObj.password.value;
	errorMessage = "";
	
	
	fullnameOK = validateName(fullname);
	emailOK = validateEmail(email);
	usernameOK = validateUsername(username);
	passwordOK = validatePassword(password);
	
	
	if(!fullnameOK)
		formObj.fullName.style.border = "2px solid red";
	else
		formObj.fullName.style.border = "2px solid green";
	if(!emailOK)
		formObj.email.style.border = "2px solid red";
	else
		formObj.email.style.border = "2px solid green";
	if(!usernameOK)
		formObj.username.style.border = "2px solid red";
	else
		formObj.username.style.border = "2px solid green";
	if(!passwordOK)
		formObj.password.style.border = "2px solid red";
	else
		formObj.password.style.border = "2px solid green";
	
	
	document.getElementById("errors").innerHTML = errorMessage;
	if(fullnameOK && emailOK && usernameOK && passwordOK)
	{
		alert("Form validated");	
		//window.location = "registerPlayer.php";
	}
}


function validateName(fullname)
{
	var p = fullname.search(/^[A-Za-z']+$/);
	if(p == 0)
	{
		return true;
	}
	else
	{
		errorMessage += "Error: Name is invalid <br>";
		return false;
	}
}

function validateEmail(email)
{
	var p = email.search(/^[^@\s]+@[^@\s]+\.com$/);
	if(p == 0)
	{
		return true;
	}
	else
	{
		errorMessage += "Error: Email is invalid <br>";
		return false;
	}
}

function validateUsername(username)
{
	var p = username.search(/^[A-Za-z']+$/);
	if(p == 0)
	{
		return true;
	}
	else
	{
		errorMessage += "Error: Username is invalid <br>";
		return false;
	}
}

function validatePassword(password)
{
	var p = password.search(/^.+$/);
	if(p == 0)
	{
		return true;
	}
	else
	{
		errorMessage += "Error: Password is invalid <br>";
		return false;
	}
}