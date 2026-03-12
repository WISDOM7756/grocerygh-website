<?php include 'includes/header.php'; ?>

<section class="checkout-section">
<div class="container">

<h2>Checkout</h2>

<div class="payment-info">
    <h3>Mobile Money Payment</h3>
    <p>Please send payment before submitting your order.</p>
    <p><strong>MoMo Number:</strong> 0500693889</p>
    <p><strong>Name:</strong> GroceryGH</p>
    <p>After payment, enter the <strong>Transaction ID</strong> below.</p>
</div>

<form action="process_order.php" method="POST" class="checkout-form" id="checkout-form">

    <label>Name</label>
    <input type="text" name="name" required>

    <label>Phone</label>
    <input type="text" name="phone" required>

    <label>Address</label>
    <textarea name="address" required></textarea>

    <label>MoMo Number</label>
    <input type="text" name="momo_number" required>

    <label>Transaction ID</label>
    <input type="text" name="transaction_id" required>

    <!-- Hidden input for cart data -->
    <input type="hidden" name="cart_data" id="cart_data">

    <button type="submit" class="btn">Place Order</button>
</form>

</div>
</section>

<script>
// Before submitting the form, set cart data
document.getElementById("checkout-form").addEventListener("submit", function(){
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    document.getElementById("cart_data").value = JSON.stringify(cart);
});
</script>

<?php include 'includes/footer.php'; ?>