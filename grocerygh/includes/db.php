<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "grocerygh";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Databaes connection failed:" . $conn->connect_error);
}
?>