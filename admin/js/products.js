$(document).on('keydown', 'input[pattern]', function(e){
	var input = $(this);
	var oldVal = input.val();
	var regex = new RegExp(input.attr('pattern'), 'g');

	setTimeout(function(){
	var newVal = input.val();
	if(!regex.test(newVal)){
		input.val(oldVal); 
	}
	}, 0);
});

function changeStatus(id){
	var status;
	var request;
	if($("#chbx_"+id).is(":checked")) {
		status = 1;
	}else{
		status = 0;
	}
	if (request) {request.abort();}
    request = $.ajax({
        url: "/admin/includes/productResponse.php",
		method: "POST",
		data: { statusProId : id, requestType : 'statusChange', status: status },
		dataType: "json"
    });

    request.done(function( msg ) {
		console.log( msg );
		alert('Status successfully changed')
	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
}

function getData(id) {
	var request;
    if (request) {request.abort();}
    request = $.ajax({
        url: "/admin/includes/productResponse.php",
		method: "POST",
		data: { editProId : id, requestType : 'getProById' },
		dataType: "json"
    });

    request.done(function( msg ) {
		console.log( msg );
		$('input[name=nameRu]').val(msg['nameRu']);
		$('input[name=nameUz]').val(msg['nameUz']);
		$('textarea[name=descriptionRu]').val(msg['desRu']);
		$('textarea[name=descriptionUz]').val(msg['desUz']);
		$('input[name=price]').val(msg['price']);
		$('input[name=productId]').val(msg['id']);
		$('input[name=requestType]').val('update');
		$('select[name=catId]').val(msg['catId']);
		$('input[type=submit]').val('Update');
		$('#newCategoryModal').modal('show');
		$('#isChangeImage').show();
	});

	request.fail(function( jqXHR, textStatus ) {
		alert( "Request failed: " + textStatus );
	});
}

function getDelete(id){
	if(confirm('Are You Sure ?')){
		var request;
	    if (request) {request.abort();}
	    request = $.ajax({
	        url: "/admin/includes/productResponse.php",
			method: "POST",
			data: { deleteProId : id, requestType : 'delete' },
			dataType: "json"
	    });

	    request.done(function( msg ) {
			location.reload();
		});

		request.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});
	};
}