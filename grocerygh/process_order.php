<?php
include 'includes/db.php';

// Check if form submitted
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $momo_number = $_POST['momo_number'];
    $transaction_id = $_POST['transaction_id'];

    $cart_data = $_POST['cart_data']; // JSON string
    $cart = json_decode($cart_data, true);

    if(empty($cart)){
        die("Cart is empty!");
    }

    // Insert order
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, phone, address, momo_number, transaction_id) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $name, $phone, $address, $momo_number, $transaction_id);
    $stmt->execute();

    $order_id = $stmt->insert_id; // last inserted order id

    // Create order_items table if not exists
    $conn->query("CREATE TABLE IF NOT EXISTS order_items (
        id INT AUTO_INCREMENT PRIMARY KEY,
        order_id INT,
        product_name VARCHAR(255),
        price DECIMAL(10,2),
        quantity INT
    )");

    // Insert items
    $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, quantity) VALUES (?,?,?,?)");

    foreach($cart as $item){
        $stmt_item->bind_param("isdi", $order_id, $item['name'], $item['price'], $item['quantity']);
        $stmt_item->execute();
    }

    $stmt_item->close();
    $stmt->close();

    $conn->close();

    // Redirect to order success page
    echo "<script>
    localStorage.removeItem('cart'); // clear cart
    window.location.href='order_success.php';
    </script>";

}
?>