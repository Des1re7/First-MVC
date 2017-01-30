$('#send_order').click(function (){
	var ids = "";
	
	//alert(ids);
	$("input[name='isBuy']").each(function(i, elem) {
		if($(elem).is(':checked'))
		{
			ids += $(elem).attr('id') + ',';
		}
	});
	ids = ids.substring(0, ids.length - 1);
	
	var formData = {
		items: ids,
		email:  $("input[name='email']").val(),
		phone:  $("input[name='phone']").val()
		};
	console.debug(formData);
	
	
	jQuery.ajax('/order', {
		type: 'POST',
		data: formData,
		success: function (data) {
			console.debug(data);
			alert(data);
			//location.reload(true);
		}
	});
});