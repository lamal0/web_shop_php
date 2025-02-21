function setCookie(name, value, days) {

	if (!getCookie('cookiesAccepted')) {
		console.warn('Пользователь не дал согласие на использование cookies.')
		return
	}

	let expires = ''
	if (days) {
		let date = new Date()
		date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
		expires = '; expires=' + date.toUTCString()
	}
	document.cookie = name + '=' + JSON.stringify(value) + '; path=/' + expires
}

function getCookie(name) {
	let match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'))
	return match ? JSON.parse(match[2]) : null
}

function updateCartCount() {
	let cart = getCookie('cart')
    if (!Array.isArray(cart)) {
			console.warn('Ошибка: cart не является массивом', cart)
			cart = []
		}
	let totalCount = cart.reduce((sum, item) => sum + item.quantity, 0)
	$('#cart-count').text(totalCount)
}

$(document).on('click', '.add-to-cart', function () {
	let productId = $(this).data('id')
	let name = $(this).data('name')
	let price = $(this).data('price')
	let img = $(this).data('img')
	let cart = getCookie('cart')
    if (!cart) {
        setCookie('cart', [], 7)
        cart = getCookie('cart')
        if (!cart) {
            return
        }
    }
	let product = cart.find(item => item.id == productId)
	if (product) {
		product.quantity++
	} else {
		cart.push({ id: productId, name, price, img, quantity: 1 })
	}
    console.log(name)
	setCookie('cart', cart, 7) 
	updateCartCount()
})

$(document).ready(function () {
	updateCartCount()
})

function loadCart() {
	let cart = getCookie("cart");
	if (!Array.isArray(cart) || cart.length === 0) {
		$('#cart-items').html('<p>Корзина пуста</p>')
		return
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
	output += `</ul><p>Итого: ${total.toLocaleString('ru-RU', {
		minimumFractionDigits: 2,
		maximumFractionDigits: 2,
	})} грн</p>`
	$('#cart-items').html(output)

}

$(document).on("click", ".remove-item", function () {
	let productId = $(this).data("id");
	let cart = getCookie("cart");
	cart = cart.filter(item => item.id != productId);
	setCookie("cart", cart, 7);
	loadCart();
	updateCartCount();
});

$("#clear-cart").click(function () {
	setCookie("cart", [], 7);
	loadCart();
	updateCartCount();
});

$(document).ready(function () {
	loadCart();
});