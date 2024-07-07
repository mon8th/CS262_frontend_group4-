// This file is used to handle the cart page functionality
document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".quantity-input");
    const deleteButtons = document.querySelectorAll(".delete-btn");
    const subtotalElement = document.getElementById("subtotal");
    const subtotalInput = document.getElementById("subtotal-input");
    const totalInput = document.getElementById("total");

    function updateSubtotal() {
        let subtotal = 0;
        document.querySelectorAll(".cart-item").forEach(function (item) {
            const quantity = item.querySelector(".quantity-input").value;
            const price = item.querySelector(".quantity-input").dataset.price;
            const itemTotal = quantity * price;
            item.querySelector(
                ".item-total"
            ).textContent = `$${itemTotal.toFixed(2)}`;
            subtotal += itemTotal;
        });
        subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        subtotalInput.value = `$${subtotal.toFixed(2)}`;
        totalInput.value = `$${subtotal.toFixed(2)}`;
    }

    quantityInputs.forEach(function (input) {
        input.addEventListener("input", function () {
            updateSubtotal();
        });
    });

    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            const form = this.closest("form");
            form.submit();
        });
    });

    updateSubtotal();
});

//in host
document
    .querySelector(".custom-file-input")
    .addEventListener("change", function (e) {
        var fileName = document.getElementById("image").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
    });


//host
document.addEventListener('DOMContentLoaded', function() {
    const categoryOptions = document.querySelectorAll('.category-option');
    const categoryInput = document.getElementById('category-input');

    categoryOptions.forEach(option => {
        option.addEventListener('click', function() {
            categoryOptions.forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
            categoryInput.value = this.dataset.category;
        });
    });
});
