// CART.JS - Add to cart, update quantity, remove item

// Add to Cart buttons
const buttons = document.querySelectorAll(".add-cart");

buttons.forEach(button => {
    button.addEventListener("click", () => {
        const name = button.getAttribute("data-name");
        const price = parseFloat(button.getAttribute("data-price"));

        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        let existing = cart.find(item => item.name === name);

        if (existing) {
            existing.quantity += 1;
        } else {
            cart.push({
                name: name,
                price: price,
                quantity: 1
            });
        }

        localStorage.setItem("cart", JSON.stringify(cart));
        alert(name + " added to cart");
    });
});

// Functions to update quantity and remove items
function updateCartDisplay() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let table = document.getElementById("cart-items");
    table.innerHTML = "";
    let total = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;

        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${item.name}</td>
            <td>GHS ${item.price}</td>
            <td>
                <input type="number" min="1" value="${item.quantity}" data-index="${index}" class="qty-input">
            </td>
            <td>GHS ${itemTotal}</td>
            <td>
                <button class="remove-btn" data-index="${index}">Remove</button>
            </td>
        `;
        table.appendChild(row);
    });

    document.getElementById("cart-total").innerText = "Total: GHS " + total.toFixed(2);

    // Add event listeners for quantity changes
    document.querySelectorAll(".qty-input").forEach(input => {
        input.addEventListener("change", (e) => {
            const idx = e.target.getAttribute("data-index");
            let newQty = parseInt(e.target.value);
            if (newQty < 1) newQty = 1;
            cart[idx].quantity = newQty;
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
        });
    });

    // Add event listeners for remove buttons
    document.querySelectorAll(".remove-btn").forEach(btn => {
        btn.addEventListener("click", (e) => {
            const idx = e.target.getAttribute("data-index");
            cart.splice(idx, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartDisplay();
        });
    });
}

// Initial cart display on page load
if (document.getElementById("cart-items")) {
    updateCartDisplay();
}