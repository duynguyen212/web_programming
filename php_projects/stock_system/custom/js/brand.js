var manageBrandTable;

$(document).ready(function () {
	//add class active for top bar
	$("#navBrand").addClass('active');

	manageBrandTable = $('#manageBrandTable').DataTable({
		'ajax': 'php_action/fetchBrand.php',
		'order' : [] 
	});	
});

	/* Add a brand */
	function addBrand() {

		//remove the error text
		$('.text-danger').remove();
		//remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		//submit brand form function
		$('#submitBrandForm').unbind('submit').bind('submit', function(){

			//remove the error text
			$('.text-danger').remove();
			//remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');
			
			var brandName = $('#brandName').val();
			var brandStatus = $('#brandStatus').val();

			if (brandName == "") {
				$('#brandName').after('<p class="text-danger">Brand Name is required!</p>');
				$('#brandName').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#brandName').find('.text-danger').remove();
				$('#brandName').closest('.form-group').addClass('has-success');
			}

			if (brandStatus == "") {
				$('#brandStatus').after('<p class="text-danger">Brand Status is required!</p>');
				$('#brandStatus').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#brandStatus').find('.text-danger').remove();
				$('#brandStatus').closest('.form-group').addClass('has-success');
			}

			if(brandName && brandStatus) {
				var formElt = $(this);

				//button loading
				$('#createBrandBtn').button('loading');

				$.ajax({
					url: formElt.attr('action'),
					type: formElt.attr('method'),
					data: formElt.serialize(),
					dataType: 'json',
					success: function (response) {
						$('#createBrandBtn').button('reset');
						
						if(response.success == true) {
							//reload the manageBrandTable
							manageBrandTable.ajax.reload(null, false);

							//reset the form text
							$('#submitBrandForm')[0].reset();

							//remove the error text
							$('.text-danger').remove();

							//remove the form error
							$('.form-group').removeClass('has-success').removeClass('has-error');

							$('#add-brand-message').html('<div class="alert alert-success alert-dismissible" role="alert">' +
	  													'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
	  													'<span aria-hidden="true">&times;</span></button> ' +
	  													'<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
	  													'</div>');

							$(".alert-success").delay(500).show(10, function(){
								$(this).delay(3000).hide(10, function(){
									$(this).remove();
								});
							}); // End of alert
						} //End of if
					} // end of success
				}) //end of ajax
			}

			return false;
		}); //Submit to add brand
	}

	/* Remove a brand */
	function removeBrand(brandID = null) {
		if (brandID) {
			$('#removeBrandBtn').unbind('click').bind('click', function () {
				$.ajax({
					url: 'php_action/removeBrand.php',
					type: 'post',
					data: {brandID: brandID},
					dataType: 'json',
					success: function(response) {
						if(response.success == true) {
							//hide the remove modal
							$('#removeBrandModal').modal('hide');

							//reload the datatable brand
							manageBrandTable.ajax.reload(null, false);

							$('.remove-message').html('<div class="alert alert-success alert-dismissible" role="alert">' +
	  													'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
	  													'<span aria-hidden="true">&times;</span></button> ' +
	  													'<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.message +
	  													'</div>');

							$(".alert-success").delay(500).show(10, function(){
								$(this).delay(3000).hide(10, function(){
									$(this).remove();
								});
							}); // End of alert
						}
					}
				});
			});
		}
	}

	/* edit Brand */
	function editBrand (brandID = null) {
		if(brandID) {
			$('#brandID').remove();

			//refresh the form
			$('#editBrandForm')[0].reset();

			//remove the error text
			$('.text-danger').remove();
			//remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');

			$('.editBrandFooter').after('<input type="hidden" name="brandID" id="brandID" value="' + brandID + '"/>');

			$.ajax({
				url: 'php_action/fetchSelectedBrand.php',
				type: 'post',
				data: {brandID: brandID},
				dataType: 'json',
				success: function(response) {
					$('#editBrandName').val(response.brand_name);
					$('#editBrandStatus').val(response.brand_status);

					//submit edit brand form function
					$('#editBrandForm').unbind('submit').bind('submit', function(){

						//remove the error text
						$('.text-danger').remove();
						//remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
						
						var brandName = $('#editBrandName').val();
						var brandStatus = $('#editBrandStatus').val();

						if (brandName == "") {
							$('#editBrandName').after('<p class="text-danger">Brand Name is required!</p>');
							$('#editBrandName').closest('.form-group').addClass('has-error');
						} else {
							//remove the error messages
							$('#editBrandName').find('.text-danger').remove();
							$('#editBrandName').closest('.form-group').addClass('has-success');
						}

						if (brandStatus == "") {
							$('#editBrandStatus').after('<p class="text-danger">Brand Status is required!</p>');
							$('#editBrandStatus').closest('.form-group').addClass('has-error');
						} else {
							//remove the error messages
							$('#editBrandStatus').find('.text-danger').remove();
							$('#editBrandStatus').closest('.form-group').addClass('has-success');
						}

						if(brandName && brandStatus) {
							var formElt = $(this);

							$.ajax({
								url: formElt.attr('action'),
								type: formElt.attr('method'),
								data: formElt.serialize(),
								dataType: 'json',
								success: function (response) {
									
									if(response.success == true) {
										//reload the manageBrandTable
										manageBrandTable.ajax.reload(null, false);

										//remove the error text
										$('.text-danger').remove();

										//remove the form error
										$('.form-group').removeClass('has-success').removeClass('has-error');

										$('#edit-brand-message').html('<div class="alert alert-success alert-dismissible" role="alert">' +
				  													'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
				  													'<span aria-hidden="true">&times;</span></button> ' +
				  													'<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.message +
				  													'</div>');

										$(".alert-success").delay(500).show(10, function(){
											$(this).delay(3000).hide(10, function(){
												$(this).remove();
											});
										}); // End of alert
									} //End of if
								} // end of success
							}) //end of ajax
						}

						return false;
					}); //Submit to edit brand
				} // success case
			}); // /ajax			
		}
	}