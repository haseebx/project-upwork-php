<?php  
include "../add_process/param.php";
include "../add_process/func.php";
include "../add_process/chk_login.php";
include "../add_process/assets/include/head.php";
include "../add_process/assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
    	<?php include "../add_process/assets/include/left_menu.php";?>
        <div class="col-lg-9 col-md-9 col-sm-9">
        <h1 class="page-header">
            		<small>Categories</small>
        </h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Categories</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	
									<div class="panel-body">
                                        <div id="morris-area-chart">
                                                <div class="row">
                                               <form action="<?=$_SERVER['../add_process/PHP_SELF']; ?>" enctype="multipart/form-data" method="post">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Name</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Slug</label>
                                                        <input type="text" class="form-control" name="slug" value="Yes" placeholder="Slug Here">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Menu</label>
                                                        <input type="text" class="form-control" name="slug" value="Yes" placeholder="Slug Here">
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Update</button> <a href="../add_process/main.php" class="btn btn-danger">Cancel</a>
                                                </div>
                                                </div>
                                                </form>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
<?php include "../add_process/assets/include/footer.php";?>