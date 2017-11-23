var manageCategoryTable;

$(document).ready(function () {
	//active the category top navbar 
	$('#navCategories').addClass('active');

	manageCategoryTable = $('#manageCategoryTable').DataTable({
		'ajax': 'php_action/fetchCategory.php',
		'order' : [] 
	});	
});

	/* Add a category */
	function addCategory() {
		//remove the error text
		$('.text-danger').remove();
		//remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');
		
		//submit category form function
		$('#submitCategoryForm').unbind('submit').bind('submit', function(){
			//remove the error text
			$('.text-danger').remove();
			//remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');

			var categoryName = $('#categoryName').val();
			var categoryStatus = $('#categoryStatus').val();

			if (categoryName == "") {
				$('#categoryName').after('<p class="text-danger">Category Name is required!</p>');
				$('#categoryName').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#categoryName').find('.text-danger').remove();
				$('#categoryName').closest('.form-group').addClass('has-success');
			}

			if (categoryStatus == "") {
				$('#categoryStatus').after('<p class="text-danger">Category Status is required!</p>');
				$('#categoryStatus').closest('.form-group').addClass('has-error');
			} else {
				//remove the error messages
				$('#categoryStatus').find('.text-danger').remove();
				$('#categoryStatus').closest('.form-group').addClass('has-success');
			}

			if(categoryName && categoryStatus) {
				var formElt = $(this);

				//button loading
				$('#createCategoryBtn').button('loading');

				$.ajax({
					url: formElt.attr('action'),
					type: formElt.attr('method'),
					data: formElt.serialize(),
					dataType: 'json',
					success: function (response) {
						$('#createCategoryBtn').button('reset');
						
						if(response.success == true) {
							//reload the manageCategoryTable
							manageCategoryTable.ajax.reload(null, false);

							//reset the form text
							$('#submitCategoryForm')[0].reset();

							//remove the error text
							$('.text-danger').remove();

							//remove the form error
							$('.form-group').removeClass('has-success').removeClass('has-error');

							$('#add-category-message').html('<div class="alert alert-success alert-dismissible" role="alert">' +
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
		}); //Submit to add category
	}
	
	/* Remove a category */
	function removeCategory(categoryID = null) {
		if (categoryID) {
			$('#removeCategoryBtn').unbind('click').bind('click', function () {
				$.ajax({
					url: 'php_action/removeCategory.php',
					type: 'post',
					data: {categoryID: categoryID},
					dataType: 'json',
					success: function(response) {
						if(response.success == true) {
							//hide the remove modal
							$('#removeCategoryModal').modal('hide');

							//reload the datatable category
							manageCategoryTable.ajax.reload(null, false);

							$('.remove-message').html('<div class="alert alert-success alert-dismissible" role="alert">' +
	  													'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
	  													'<span aria-hidden="true">&times;</span></button> ' +
	  													'<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
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

	/* edit Category */
	function editCategory (categoryID = null) {
		if(categoryID) {
			$('#categoryID').remove();

			//refresh the form
			$('#editCategoryForm')[0].reset();

			//remove the error text
			$('.text-danger').remove();
			//remove the form error
			$('.form-group').removeClass('has-error').removeClass('has-success');

			$('.editCategoryFooter').after('<input type="hidden" name="categoryID" id="categoryID" value="' + categoryID + '"/>');

			$.ajax({
				url: 'php_action/fetchSelectedCategory.php',
				type: 'post',
				data: {categoryID: categoryID},
				dataType: 'json',
				success: function(response) {
					$('#editCategoryName').val(response.categories_name);
					$('#editCategoryStatus').val(response.categories_status);

					//submit edit category form function
					$('#editCategoryForm').unbind('submit').bind('submit', function(){

						//remove the error text
						$('.text-danger').remove();
						//remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
						
						var categoryName = $('#editCategoryName').val();
						var categoryStatus = $('#editCategoryStatus').val();

						if (categoryName == "") {
							$('#editCategoryName').after('<p class="text-danger">Category Name is required!</p>');
							$('#editCategoryName').closest('.form-group').addClass('has-error');
						} else {
							//remove the error messages
							$('#editCategoryName').find('.text-danger').remove();
							$('#editCategoryName').closest('.form-group').addClass('has-success');
						}

						if (categoryStatus == "") {
							$('#editCategoryStatus').after('<p class="text-danger">Category Status is required!</p>');
							$('#editCategoryStatus').closest('.form-group').addClass('has-error');
						} else {
							//remove the error messages
							$('#editCategoryStatus').find('.text-danger').remove();
							$('#editCategoryStatus').closest('.form-group').addClass('has-success');
						}

						if(categoryName && categoryStatus) {
							var formElt = $(this);

							$.ajax({
								url: formElt.attr('action'),
								type: formElt.attr('method'),
								data: formElt.serialize(),
								dataType: 'json',
								success: function (response) {
									
									if(response.success == true) {
										//reload the manageCategoryTable
										manageCategoryTable.ajax.reload(null, false);

										//remove the error text
										$('.text-danger').remove();

										//remove the form error
										$('.form-group').removeClass('has-success').removeClass('has-error');

										$('#edit-category-message').html('<div class="alert alert-success alert-dismissible" role="alert">' +
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
					}); //Submit to edit category
				} // success case
			}); // /ajax			
		}
	}