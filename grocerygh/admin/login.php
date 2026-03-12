<?php
session_start();
include '../includes/header.php';
?>

<section class="login-section">

<div class="login-container">

<h2>Admin Login</h2>

<form action="authenticate.php" method="POST">

<label>Username</label>
<input type="text" name="username" required>

<label>Password</label>
<input type="password" name="password" required>

<button type="submit">Login</button>

</form>

</div>

</section>

<?php include '../includes/footer.php'; ?>