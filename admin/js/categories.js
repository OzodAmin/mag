function getData(id) {
	var request;
    if (request) {request.abort();}
    request = $.ajax({
        url: "/admin/includes/categoryResponse.php",
		method: "POST",
		data: { editCatId : id, requestType : 'getCatById' },
		dataType: "json"
    });

    request.done(function( msg ) {
		console.log( msg );
		$('input[name=categoryNameRu]').val(msg['nameRu']);
		$('input[name=categoryNameUz]').val(msg['nameUz']);
		$('input[name=catId]').val(msg['id']);
		$('input[name=requestType]').val('update');
		$('input[type=submit]').val('Update');
		$('#newCategoryModal').modal('show');
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
	        url: "/admin/includes/categoryResponse.php",
			method: "POST",
			data: { deleteCatId : id, requestType : 'delete' },
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