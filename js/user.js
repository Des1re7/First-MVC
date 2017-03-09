$('#send_order').click(function (){
	var ids = "";
	
	$("input[name='isBuy']").each(function(i, elem) {
		if($(elem).is(':checked'))
		{
			ids += $(elem).attr('id') + ',';
		}
	});
	ids = ids.substring(0, ids.length - 1);
	
	var formData = {
		items: ids
		};
	console.debug(formData);
	
	
	$.ajax('/order', {
		type: 'POST',
		data: formData,
		success: function (data) {
			console.debug(data);
			alert(data);
			location.reload(true);
		}
	});
});

$('#registration').click(function (){
	
	var formData = {
		email: $("form[name='registration'] input[name='email']").val(),
		phone: $("form[name='registration'] input[name='phone']").val(),
		password: $("form[name='registration'] input[name='password']").val()
		};
	console.debug(formData);
	
	$.ajax('/user/registration', {
		type: 'POST',
		data: formData,
		success: function (data) {
			alert(data);
			console.debug(data);
		}
	});
});
$('#login').click(function (){
	
	var formData = {
		email: $("form[name='login'] input[name='email']").val(),
		password: $("form[name='login'] input[name='password']").val()
		};
	console.debug(formData);
	
	$.ajax('/user/login', {
		type: 'POST',
		data: formData,
		success: function (data) {
			console.debug(data);
			location.reload(true);
		}
	});
});

$('#logout').click(function (){
	$.ajax('/user/logout', {
		type: 'POST',
		success: function (data) {
			console.debug(data);
			location.reload(true);
		}
	});
});