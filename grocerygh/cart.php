<?php include 'includes/header.php'; ?>

<section class="cart-section">
<div class="container">

<h2>Your Cart</h2>

<table class="cart-table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="cart-items">
        <!-- Cart items will be dynamically inserted by cart.js -->
    </tbody>
</table>

<h3 id="cart-total"></h3>

<a href="checkout.php" class="btn">Proceed to Checkout</a>

</div>
</section>

<script src="js/cart.js"></script>

<?php include 'includes/footer.php'; ?>