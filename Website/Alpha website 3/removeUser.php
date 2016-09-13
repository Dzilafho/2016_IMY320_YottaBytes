<?php
session_start();


$email = $_POST["email"];


$servername = "server29.000webhost.com";
$dbUsername = "a7472183_user";
$dbPassword = "Chowers1234";
$db = "a7472183_db";


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


if  (mysqli_num_rows($check_email) > 0)
{
	echo "ready to register user"."<br>";
	$query = "DELETE FROM users WHERE email = '$email'";
	mysqli_query($conn, $query) or die ('Error deleting user.');
}
else
{
	echo "User not in database";
	die ('User not in database.');
}


mysqli_close($conn);
header('Location: admin.php');

#exit;
?>