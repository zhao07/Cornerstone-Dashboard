<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname= "crst_dashboard";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$client_name = $_POST['client_name'];
$client_add = $_POST['client_add'];
$contact_name = $_POST['contact_name'];
$contact_phone = $_POST['contact_phone'];
$contact_email = $_POST['contact_email'];
$category = $_POST['category'];
$sec1 = $_POST['sec1'];
$website = $_POST['website'];
$notes = $_POST['notes'];
$title = $_POST['title'];

session_start();

$user_name = $_SESSION['user'];
date_default_timezone_set('America/New_York');
$today = date("Y-m-d G:i:s");
$a_p = date("A");
$_SESSION['date'] = $today;
$job = "added new client";

$sql = "INSERT INTO client_info (client_name,client_add,contact_name,contact_phone,contact_email,sec1,website,notes,category,title) VALUES ('$client_name', '$client_add', '$contact_name', '$contact_phone','$contact_email','$sec1','$website','$notes','$category','$title')";
$result = $conn->query($sql) or die('error');

$sql6 = "INSERT INTO timestamp (user,time,job,a_p) VALUES ('$user_name', '$today','$job', '$a_p')";
$result7 = $conn->query($sql6) or die('Error querying database 5.');
 
$conn->close();

header("location: clients.php ");
exit();

?>

