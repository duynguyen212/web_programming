<?php require_once 'includes/header.php';?>
	 <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">Home</a></li>
                <li class="active">Product</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i> Manage Products</div>
                <div class="panel-body">
                    <div class="remove-message">
                        
                    </div>
                    
                    <div class="div-action pull-right" style="padding-bottom: 20px;">
                        <button class="btn btn-default" id="addProductModalBtn" data-toggle="modal" data-target="#addProductModal" > <i class="glyphicon glyphicon-plus-sign"></i> Add Product</button>
                    </div><!-- End of Div-Action -->
                    
                    <table class="table" id="manageProductsTable">
                        <thead>
                            <tr>
                                <th style="width: 10%;">Photo</th>
                                <th>Product Name</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th style="width: 8%;">Options</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div> <!-- end of panel -->
        </div> 
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addProductModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> <i class="fa fa-plus"></i> Add Product</h4>
                </div>
                
                <form class="form-horizontal" id="submitProductForm" method="POST" enctype="multipart/form-data" action="php_action/createProduct.php">
                   <div class="modal-body" style="max-height: 450px; overflow: auto;"> 
                        <div id="add-product-message">
                            
                        </div>

                        <div class="form-group">
                        	<label for="productImage" class="col-sm-4 control-label">Product Image</label>
                            <div class="col-sm-8">
                                <!-- the avatar markup - copy from fileinput site  -->
								<div id="kv-avatar-errors-1" class="center-block" style="width: 800px;display: none;"></div>
								<div class="kv-avatar center-block" style="width: 200px;">
									<input type="file" id = "productImage" name="productImage" class="file-loading">
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productName" class="col-sm-4 control-label">Product Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="productName" name = "productName" placeholder="Product Name" autocomplete="off" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productCode" class="col-sm-4 control-label">Product Code</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="productCode" name = "productCode" placeholder="Product Code" autocomplete="off" >
                            </div>
                        </div>
						<div class="form-group">
                            <label for="productQuantity" class="col-sm-4 control-label">Quantity</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="productQuantity" name = "productQuantity" placeholder="Product Quantity" autocomplete="off">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="productRate" class="col-sm-4 control-label">Rate</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="productRate" name = "productRate" placeholder="Product Rate" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productBrandName" class="col-sm-4 control-label">Brand Name</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="productBrandName" id="productBrandName" >
                                    <option value=""> ~~~~~  SELECT  ~~~~~</option> 
                                    <?php 
                                    	$sqlStr = "SELECT brand_id, brand_name FROM brands WHERE brand_active = 1 AND brand_status = 1";
                                    	$result = $connect->query($sqlStr);
                                    	while ($row = $result->fetch_array()) {
                                    		echo "<option value='".$row[0]."'>" .$row[1]. "</option> ";
                                    	}
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productCategoryName" class="col-sm-4 control-label">Category Name </label>
                            <div class="col-sm-8">
                            	<select class="form-control" name="productCategoryName" id="productCategoryName" >
                                    <option value=""> ~~~~~  SELECT  ~~~~~</option> 
                                    <?php 
                                    	$sqlStr = "SELECT categories_id, categories_name FROM category WHERE categories_active = 1 AND categories_status = 1";
                                    	$result = $connect->query($sqlStr);
                                    	while ($row = $result->fetch_array()) {
                                    		echo "<option value='".$row[0]."'>" .$row[1]. "</option> ";
                                    	}
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productStatus" class="col-sm-4 control-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="productStatus" id="productStatus" >
                                    <option value=""> ~~~~~  SELECT  ~~~~~</option> 
                                    <option value="1">Available</option> 
                                    <option value="2">Not Available</option> 
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading">Add Product</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Edit Product Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editProductModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">  <i class="fa fa-plus"></i> Edit Category</h4>
                </div>
                <form class="form-horizontal" id="editCategoryForm" action="php_action/editCategory.php" method="post">
                   <div class="modal-body">
                        <div id="edit-category-message"></div>
                        <div class="form-group">
                            <label for="editCategoryName" class="col-sm-3 control-label">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="editCategoryName" id="editCategoryName" placeholder="Category Name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editCategoryStatus" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-9">
                                <select name="editCategoryStatus" id="editCategoryStatus" class="form-control">
                                    <option value=""> ~~~~~ SELECT ~~~~~</option> 
                                    <option value="1">Available</option> 
                                    <option value="2">Not Available</option> 
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer editCategoryFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="editCategoryBtn" data-loading-text="Loading">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Remove Product Modal -->
    <div class="modal fade" tabindex="-1" role="dialog"  id="removeProductModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> <i class="glyphicon glyphicon-trash"></i> Remove Category </h4>
                </div>
                <div class="modal-body">
                    <p>Do you really want to remove?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
                    <button type="button" class="btn btn-primary" id="removeCategoryBtn"><i class="glyphicon glyphicon-ok-sign"></i>Remove</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

	<script src="custom/js/product.js"></script>
<?php require_once 'includes/footer.php';?>