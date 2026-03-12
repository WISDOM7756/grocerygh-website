<?php 

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include '../includes/db.php';
include '../includes/header.php';

?>

<section class="admin-orders">

<div class="container">

<div class="admin-top">
<h2>Customer Orders</h2>

<a href="dashboard.php" class="admin-btn">← Back to Dashboard</a>
</div>

<?php

$orders_result = $conn->query("SELECT * FROM orders ORDER BY order_date DESC");

if($orders_result->num_rows > 0){

while($order = $orders_result->fetch_assoc()){

echo "<div class='order-card'>";

echo "<h3>Order #".$order['id']."</h3>";

echo "<p class='order-meta'>
<strong>".$order['customer_name']."</strong> | 
".$order['phone']." | 
".$order['order_date']."
</p>";

echo "<p class='order-meta'>
Address: ".$order['address']." | 
MoMo: ".$order['momo_number']." | 
Transaction: ".$order['transaction_id']."
</p>";

echo "<table class='admin-table'>
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
</tr>";

$order_id = $order['id'];
$items_result = $conn->query("SELECT * FROM order_items WHERE order_id = $order_id");

$order_total = 0;

while($item = $items_result->fetch_assoc()){

$item_total = $item['price'] * $item['quantity'];
$order_total += $item_total;

echo "<tr>
<td>".$item['product_name']."</td>
<td>GHS ".$item['price']."</td>
<td>".$item['quantity']."</td>
<td>GHS ".$item_total."</td>
</tr>";

}

echo "<tr class='order-total'>
<td colspan='3'><strong>Order Total</strong></td>
<td><strong>GHS ".$order_total."</strong></td>
</tr>";

echo "</table>";

echo "</div>";

}

}else{

echo "<p class='no-orders'>No orders yet.</p>";

}

$conn->close();

?>

</div>
</section>

<?php include '../includes/footer.php'; ?>