var manageProductTable;

$(document).ready(function(){
	//top navbar 
	$("#navProduct").addClass('active');
	manageProductTable = $('#manageProductsTable').DataTable();

	$('#addProductModalBtn').unbind('click').bind('click', function(){
		
		//reset product form
		$('input[type="text"]').val('');
		$('select').val('');
		$('.fileinput-remove-button').click();

		//remove the error text
		$('.text-danger').remove();
		//remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');
		
		// file input handle
		$("#productImage").fileinput({
			overwriteInitial: true,
			maxFileSize: 1500,
			showClose: false,
			showCaption: false,
			browseLabel: '',
			removeLabel: '',
			browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			removeTitle: 'Cancel or reset changes',
			elErrorContainer: '#kv-avatar-errors-1',
			msgErrorClass: 'alert alert-block alert-danger',
			defaultPreviewContent: '<img src="assets/images/photodefault.png" alt="Your Avatar" style="width:auto">',
			layoutTemplates: {main2: '{preview} {remove} {browse}'},
			allowedFileExtensions: ["jpg", "png", "gif"]
		}); //file input process

		//submit product form function
		$('#submitProductForm').unbind('submit').bind('submit', function(){
			
			//remove the error text
			$('.text-danger').remove();
			//remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');
		
			var productImage = $('#productImage').val();
			var productName = $('#productName').val();
			var productCode = $('#productCode').val();
			var productQuantity = $('#productQuantity').val();
			var productBrandName = $('#productBrandName').val();
			var productCategoryName = $('#productCategoryName').val();
			var productStatus = $('#productStatus').val();
			var productRate = $('#productRate').val();

			if (productImage == "") {
				$('#productImage').closest('.center-block').after('<p class="text-danger">Product Image is required!</p>');
				$('#productImage').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#productImage').find('.text-danger').remove();
				$('#productImage').closest('.form-group').addClass('has-success');
			}

			if (productName == "") {
				$('#productName').after('<p class="text-danger">Product Name is required!</p>');
				$('#productName').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#productName').find('.text-danger').remove();
				$('#productName').closest('.form-group').addClass('has-success');
			}

			if (productCode == "") {
				$('#productCode').after('<p class="text-danger">Product Name is required!</p>');
				$('#productCode').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#productCode').find('.text-danger').remove();
				$('#productCode').closest('.form-group').addClass('has-success');
			}

			if (productQuantity == "") {
				$('#productQuantity').after('<p class="text-danger">Quantity is required!</p>');
				$('#productQuantity').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#productQuantity').find('.text-danger').remove();
				$('#productQuantity').closest('.form-group').addClass('has-success');
			}

			if (productRate == "") {
				$('#productRate').after('<p class="text-danger">Rate is required!</p>');
				$('#productRate').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#productRate').find('.text-danger').remove();
				$('#productRate').closest('.form-group').addClass('has-success');
			}

			if (productBrandName == "") {
				$('#productBrandName').after('<p class="text-danger">Brand Name is required!</p>');
				$('#productBrandName').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#productBrandName').find('.text-danger').remove();
				$('#productBrandName').closest('.form-group').addClass('has-success');
			}

			if (productCategoryName == "") {
				$('#productCategoryName').after('<p class="text-danger">Category Name is required!</p>');
				$('#productCategoryName').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#productCategoryName').find('.text-danger').remove();
				$('#productCategoryName').closest('.form-group').addClass('has-success');
			}			

			if (productStatus == "") {
				$('#productStatus').after('<p class="text-danger">Product Status is required!</p>');
				$('#productStatus').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#productStatus').find('.text-danger').remove();
				$('#productStatus').closest('.form-group').addClass('has-success');
			}

			if(productImage && productName && productCode && productQuantity && productRate && productBrandName && productCategoryName && productStatus) {
				var formElt = $(this);
				var formData = new FormData(this);
				
				$.ajax({
					url: formElt.attr('action'),
					type: formElt.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false, 
					contentType: false, 
					processData: false,
					success: function (response) {
						if(response.success == true) {
							//reset the form text
							$('input[type="text"]').val("");
							$('select').val("");
							$('#fileinput-remove-button').click();
							
							$('#add-product-message').html('<div class="alert alert-success alert-dismissible" role="alert">' +
		  												'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
		  												'<span aria-hidden="true">&times;</span></button> ' +
		  												'<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.message +
		  												'</div>');

							//reload the manageCategoryTable
							manageProductTable.ajax.reload(null, true);

							$(".alert-success").delay(500).show(10, function(){
								$(this).delay(3000).hide(10, function(){
									$(this).remove();
								});
							}); // End of alert

							//remove the error text
			$('.text-danger').remove();
			//remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');
						} 
					} // end of success function

				}); //end of ajax
			} //if the data validation is passed

			return false;
		}); //Submit to add category
	}); //add product modal
});