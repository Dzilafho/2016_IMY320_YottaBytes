<?php
session_start();
session_unset();

echo "password: ".$_POST["password"]."<br>";
echo "email: ".$_POST["email"]."<br><br>";

$email = $_POST["email"];
$password = $_POST["password"];

$servername = "server29.000webhost.com";
$dbUsername = "a7472183_user";
$dbPassword = "Chowers1234";
$db = "a7472183_db";


$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);

// Check connection
if (!$conn) {
	die("Connection (imy320) failed: " . mysqli_connect_error());
}
else{
	echo "Connected (imy320) successfully"."<br>";
}

$check_user = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

if (!$check_user) {
    die(mysqli_error($conn));
}
if(mysqli_num_rows($check_user) == 0)
{
	echo "Incorrect user details"."<br><br>";
	//header('Location: index.php');
}

if  (mysqli_num_rows($check_user) > 0)
{
	$row = mysqli_fetch_assoc($check_user);
	$_SESSION["username"] = substr($row["name"],0,1).".".$row["surname"];
	$_SESSION["usertype"] = $row["usertype"];
	header('Location: index.php');
}

header('Location: index.php');

mysqli_close($conn);
#exit;
?>