<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="css/style_cart.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/cart.js"></script>
</head>
<body>
    <header>
        <h1>Корзина</h1>
        <a href="index.php">На главную</a>
    </header>
    
    <div id="cart-items"></div>
    <button id="clear-cart">Очистить корзину</button>

    <script src="js/cart.js"></script>
    <script>

        function loadCart() {
            let cart = getCookie("cart");
            if (cart.length === 0) {
                $("#cart-items").html("<p>Корзина пуста</p>");
                return;
            }

            let output = "<ul>";
            let total = 0;
            cart.forEach(item => {
                total += item.price * item.quantity;
                output += `
                    <li>
                        <img src="${item.img}" width="50">
                        ${item.name} - ${item.price} грн × ${item.quantity}
                        <button class="remove-item" data-id="${item.id}">Удалить</button>
                    </li>
                `;
            });
            output += `</ul><p>Итого: ${total} грн</p>`;
            $("#cart-items").html(output);
        }

        // Удаление товара из корзины
        $(document).on("click", ".remove-item", function () {
            let productId = $(this).data("id");
            let cart = getCookie("cart");
            cart = cart.filter(item => item.id != productId);
            setCookie("cart", cart, 7);
            loadCart();
            updateCartCount();
        });

        // Очистка корзины
        $("#clear-cart").click(function () {
            setCookie("cart", [], 7);
            loadCart();
            updateCartCount();
        });

        $(document).ready(function () {
            loadCart();
        });
    </script>
</body>
</html>
