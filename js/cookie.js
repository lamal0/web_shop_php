document.addEventListener('DOMContentLoaded', function () {
	if (!getCookie('cookiesAccepted')) {
		document.getElementById('cookie-popup').style.display = 'block'
	}

	
	document
		.getElementById('accept-cookies')
		.addEventListener('click', function () {
			setCookie('cookiesAccepted', 'true', 7) 
			document.getElementById('cookie-popup').style.display = 'none'
		})

	function setCookie(name, value, days) {
		let expires = ''
		if (days) {
			let date = new Date()
			date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000)
			expires = '; expires=' + date.toUTCString()
		}
		document.cookie = name + '=' + value + '; path=/' + expires
	}

	function getCookie(name) {
		let nameEQ = name + '='
		let ca = document.cookie.split(';')
		for (let i = 0; i < ca.length; i++) {
			let c = ca[i]
			while (c.charAt(0) === ' ') c = c.substring(1, c.length)
			if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length)
		}
		return null
	}
})
document
        .getElementById('delete-cookie')
        .addEventListener('click', function () {
					deleteCookie('cookiesAccepted')
					deleteCookie('cart') 
                    location.reload()
					alert('Cookies удалены!')
				})

    function deleteCookie(name) {
        document.cookie =
            name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;'
    }

