$(document).ready(function () {
	let page = 1 
	let loading = false 
	let hasMoreProducts = true 
	const limit = 6

	function loadProducts(reset = false) {
		if (loading || !hasMoreProducts) return
		loading = true
		$('#loader').show()

		let searchQuery = $('#search').val().trim()
		let sort = $('#sort').val()
		let category = $('#category').val()

		if (reset) {
			page = 1
			$('#products').html('') 
			hasMoreProducts = true 
		}

		$.ajax({
			url: 'api.php',
			method: 'GET',
			data: {
				search: searchQuery,
				sort: sort,
				category: category,
				page: page,
				limit: limit,
			},
			success: function (data) {
				$('#loader').hide()
				loading = false

				if (reset) {
					$('#products').html('') 
				}

				if (data.trim() === '') {
					if (reset) {
						$('#products').html(
							'<div class="spooky-container"><p class="spooky-text" data-text="Товары не найдены...">Товары не найдены...</p></div>'
						)
					}
					hasMoreProducts = false 
				} else {
					$('#products').append(data) 
					page++ 
				}
			},
			error: function () {
				console.error('Ошибка загрузки товаров')
				$('#loader').hide()
				loading = false
			},
		})
	}

	// Загружаем товары 
	$(document).ready(function () {
		loadProducts(true)
	})

	// Загружаем первую страницу 
	loadProducts()

	// Фильтры 
	$('#search, #sort, #category').on('input change', function () {
		hasMoreProducts = true
		loadProducts(true)
	})

	$(window).on('scroll', function () {
		if (
			$(window).scrollTop() + $(window).height() >=
			$(document).height() - 100
		) {
			loadProducts()
		}
	})
})
