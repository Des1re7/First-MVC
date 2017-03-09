$.ajax('/user', {
		type: 'POST',
		success: function (data) {
			$('.user-info').html(data);
			console.debug(data);
			//alert(data);
			//location.reload(true);
		}
	});
