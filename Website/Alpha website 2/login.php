<?php
session_start();
session_unset();

echo "password: ".$_POST["password"]."<br>";
echo "username: ".$_POST["username"]."<br>";
echo "email: ".$_POST["email"]."<br><br>";

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "elton";
$db = "imy320";


$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $db);

// Check connection
if (!$conn) {
	die("Connection (imy320) failed: " . mysqli_connect_error());
}
else{
	echo "Connected (imy320) successfully"."<br>";
}

$check_user = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND email = '$email' AND password = '$password'");

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
	$_SESSION["username"] = $row["username"];
	$_SESSION["usertype"] = $row["usertype"];
	header('Location: index.php');
}

header('Location: index.php');

mysqli_close($conn);
#exit;
?>