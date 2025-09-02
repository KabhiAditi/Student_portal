<?php
$host = "localhost";
$user = "root"; // change if needed
$pass = "";
$db = "student_portal";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
