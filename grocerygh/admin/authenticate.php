<?php 
session_start();
include '../includes/db.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM admin_users WHERE username=? AND password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows > 0){

    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");

}else{

    echo "Invalid login";

}
 ?>