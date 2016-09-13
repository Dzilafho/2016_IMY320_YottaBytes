<?php
session_start();


$group = $_POST["group"];


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


$check_email = mysqli_query($conn, "SELECT * FROM groups WHERE groupName = '$group'");
if (!$check_email) {
    die(mysqli_error($conn));
}


if  (mysqli_num_rows($check_email) > 0)
{
	echo "ready to register user"."<br>";
	$query = "DELETE FROM groups WHERE groupName = '$group'";
	mysqli_query($conn, $query) or die ('Error deleting user.');
	
	
	$check_users = mysqli_query($conn, "SELECT * FROM users WHERE groupName = '$group'");
	
	while($row = mysqli_fetch_array($check_users))
	{
		$removeGroupToUser = mysqli_query($conn, "UPDATE users SET groupName = '' WHERE groupName = '$group'");
	}
	
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