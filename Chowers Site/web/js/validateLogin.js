var errorMessage = "";
var fullnameOK, emailOK, usernameOK, passwordOK;

function validateForm()
{
	var formObj = document.getElementById("loginForm");
	
	var username = formObj.username.value;
	var password = formObj.password.value;
	errorMessage = "";
	
	
	usernameOK = validateUsername(username);
	passwordOK = validatePassword(password);
	
	
	if(!usernameOK)
		formObj.username.style.border = "2px solid red";
	else
		formObj.username.style.border = "2px solid green";
	if(!passwordOK)
		formObj.password.style.border = "2px solid red";
	else
		formObj.password.style.border = "2px solid green";
	
	
	document.getElementById("errors").innerHTML = errorMessage;
	if(usernameOK && passwordOK)
	{
		alert("Form validated");	
		window.location = "compile.html";
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