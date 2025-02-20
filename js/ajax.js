function loadProducts() {
	$.ajax({
		url: 'api.php',
		method: 'GET',
		data: {
			search: $('#search').val(),
			sort: $('#sort').val(),
		},
		success: function (data) {
			$('#products').html(data)
		},
	})
}

$('#search, #sort').on('input change', loadProducts)
$(document).ready(loadProducts)
