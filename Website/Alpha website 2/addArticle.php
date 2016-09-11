<?php
session_start();
session_unset();


$articlename = $_POST["fname"];
$articleheadline = $_POST["surname"];
$articlestory = $_POST["email"];

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


$check_article = mysqli_query($conn, "SELECT * FROM newsarticle WHERE articlename = '$articlename'");
if (!$check_article) {
    die(mysqli_error($conn));
}


if  (mysqli_num_rows($check_article) == 0)
{
	echo "Ready to insert article"."<br>";
	$query = "INSERT INTO newsarticle VALUES ('$articlename', '$articleheadline', '$articlestory')";
	mysqli_query($conn, $query) or die ('Error uploading the article.');
	echo "The article, ".$articlename.", has been successfully uploaded. ";
}
else
{
	echo "Matching newsarticle already exists";
	die ('Already uploaded.');
}


header('Location: admin.php');

mysqli_close($conn);
#exit;
?>