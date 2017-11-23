<?php require_once 'includes/header.php'; ?>
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="dashboard.php">Home</a></li>
                <li class="active">Category</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i> Manage Catgories</div>
                <div class="panel-body">
                    <div class="remove-message">
                        
                    </div>
                    
                    <div class="div-action pull-right" style="padding-bottom: 20px;">
                        <button class="btn btn-default" id="addCategoryModalBtn" data-toggle="modal" data-target="#addCategoryModal" onclick="addCategory()"> <i class="glyphicon glyphicon-plus-sign"></i> Add Category</button>
                    </div><!-- End of Div-Action -->
                    
                    <table class="table" id="manageCategoryTable">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th style="width: 20%;">Options</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div> <!-- end of panel -->
        </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addCategoryModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> <i class="fa fa-plus"></i> Add Category</h4>
                </div>
                
                <form class="form-horizontal" id="submitCategoryForm" method="POST" action="php_action/createCategory.php">
                   <div class="modal-body">
                        <div id="add-category-message">
                            
                        </div>

                        <div class="form-group">
                            <label for="categoryName" class="col-sm-4 control-label">Category Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="categoryName" name = "categoryName" placeholder="Category Name" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoryStatus" class="col-sm-4 control-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="categoryStatus" id="categoryStatus" >
                                    <option value=""> ~~~~~  SELECT  ~~~~~</option> 
                                    <option value="1">Available</option> 
                                    <option value="2">Not Available</option> 
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="createCategoryBtn" data-loading-text="Loading">Add Category</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Edit Catgegory Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editCategoryModal">
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

    <!-- Remove Category Modal -->
    <div class="modal fade" tabindex="-1" role="dialog"  id="removeCategoryModal">
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
    
    <script src="custom/js/category.js"></script>
<?php require_once 'includes/footer.php'; ?>