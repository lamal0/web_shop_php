// Функция для установки куки
function setCookie(name, value, days) {
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
	return match ? JSON.parse(match[2]) : []
}


function updateCartCount() {
	let cart = getCookie('cart')
	let totalCount = cart.reduce((sum, item) => sum + item.quantity, 0)
	$('#cart-count').text(totalCount)
}

$(document).on('click', '.add-to-cart', function () {
	let productId = $(this).data('id')
	let name = $(this).data('name')
	let price = $(this).data('price')
	let img = $(this).data('img')
    console.log($(this).data('name'))
    console.log(name)
	let cart = getCookie('cart')

	let product = cart.find(item => item.id == productId)
	if (product) {
		product.quantity++
	} else {
		cart.push({ id: productId, name, price, img, quantity: 1 })
	}

	setCookie('cart', cart, 7) // Сохраняем в куки на 7 дней
	updateCartCount()
})

$(document).ready(function () {
	updateCartCount()
})
