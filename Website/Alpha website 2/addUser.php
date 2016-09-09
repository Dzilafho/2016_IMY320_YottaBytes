<?php
session_start();
session_unset();


$name = $_POST["fname"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$userType = $_POST['userType']; 
if ($userType == "admin") {          
    $userType = "admin";
}
else {
    $userType = "regular";
}
$group = "";


$servername = "localhost";
$dbUsername = "root";
$dbPassword = "elton";
$db = "imy320";


$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);
if (!$conn) {
	die("Connection (db imy320) failed:<br>" . mysqli_connect_error())."<br><br>";
}
else{
	echo "Connected (db imy320) successfully"."<br><br>";
}


$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
if (!$check_email) {
    die(mysqli_error($conn));
}


if  (mysqli_num_rows($check_email) == 0)
{
	echo "ready to register user"."<br>";
	$query = "INSERT INTO users VALUES ('$username', '$name', '$surname', '$email', '$password', '$userType', '$group')";
	mysqli_query($conn, $query) or die ('Error registering.');
	echo "Greetings, ".$username.", you have been registered. ";
}
else
{
	echo "Matching username already exists";
	die ('Already registered.');
}


header('Location: admin.php');

mysqli_close($conn);
#exit;
?>