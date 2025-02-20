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
