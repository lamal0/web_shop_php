function loadProducts() {
	$.ajax({
		url: 'api.php',
		method: 'GET',
		data: {
			search: $('#search').val(),
			sort: $('#sort').val(),
			category: $('#category').val(),
		},
		success: function (data) {
			$('#products').html(data)
		},
	})
}

$('#search, #sort, #category').on('input change', loadProducts)
$(document).ready(loadProducts)
