<?php
session_start();


$article = $_POST["article"];

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


$check_article = mysqli_query($conn, "SELECT * FROM articles WHERE name = '$article'");
if (!$check_article) {
    die(mysqli_error($conn));
}


if  (mysqli_num_rows($check_article) > 0)
{
	echo "Ready to insert article"."<br>";
	$query = "DELETE FROM articles WHERE name = '$article'";
	mysqli_query($conn, $query) or die ('Error deleting the article.');
}
else
{
	echo "Matching article name already exists";
	die ('Already uploaded.');
}

mysqli_close($conn);
header('Location: admin.php');

#exit;
?>