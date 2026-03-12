<?php
session_start();
session_destroy();

// Optional: flash message
$_SESSION['logout_msg'] = "You have been logged out successfully.";

header("Location: login.php");
exit();
?>