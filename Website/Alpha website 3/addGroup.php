<?php
session_start();


$name = $_POST["goupName"];
$manager = $_POST["manager"];
$members = $_POST["members"];



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


$check_group = mysqli_query($conn, "SELECT * FROM groups WHERE groupName = '$name'");
if (!$check_group) {
    die(mysqli_error($conn));
}


if  (mysqli_num_rows($check_group) == 0)
{
	echo "Ready to insert group"."<br>";
	$query = "INSERT INTO groups VALUES ('$name', '$manager')";
	mysqli_query($conn, $query) or die ('Error uploading the group.');
	
	
	$check_users = mysqli_query($conn, "SELECT * FROM users");
	
	while($row = mysqli_fetch_array($check_users))
	{
		if(in_array($row['email'], $_POST['members']))
		{
			$e = $row['email'];
			echo $row['name'].' was checked!';
			$addGroupToUser = mysqli_query($conn, "UPDATE users SET groupName = '$name' WHERE email = '$e'");
		}
	}
	
	$addGroupToUser = mysqli_query($conn, "UPDATE users SET groupName = '$name' WHERE email = '$manager'");
	
}
else
{
	echo "Matching group name already exists";
	die ('Already group name.');
}

mysqli_close($conn);
header('Location: admin.php');

#exit;
?>