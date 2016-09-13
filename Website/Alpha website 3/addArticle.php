<?php
session_start();

$username = $_SESSION["username"];

$articlename = $_POST["name"];
$articleheadline = $_POST["headline"];
$articlestory = $_POST["article"];

date_default_timezone_set('Africa/Johannesburg');
$dateAdded = date('Y/m/d H:i:s');

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


$check_article = mysqli_query($conn, "SELECT * FROM articles WHERE name = '$articlename'");
if (!$check_article) {
    die(mysqli_error($conn));
}


if  (mysqli_num_rows($check_article) == 0)
{
	echo "Ready to insert article"."<br>";
	$query = "INSERT INTO articles VALUES ('$username', '$articlename', '$articleheadline', '$articlestory', '$dateAdded')";
	mysqli_query($conn, $query) or die ('Error uploading the article.');
	echo "The article, ".$articlename.", has been successfully uploaded. ";
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