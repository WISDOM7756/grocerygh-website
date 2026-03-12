<?php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/header.php';
?>

<section class="admin-dashboard" style="padding:50px; background:#e8f5e9; min-height:80vh;">

<h2 style="color:#2e7d32;">Admin Dashboard</h2>

<div style="margin-top:30px;">
<a href="view_orders.php" style="padding:10px 20px; background:#2e7d32; color:white; text-decoration:none; border-radius:5px; margin-right:10px;">View Orders</a>
<a href="logout.php" style="padding:10px 20px; background:#c62828; color:white; text-decoration:none; border-radius:5px;">Logout</a>
</div>

</section>

<?php include '../includes/footer.php'; ?>