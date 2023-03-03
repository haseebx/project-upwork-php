<?php  

include "common/param.php";

include "common/func.php";

include "common/chk_login.php";

include "assets/include/head.php";

include "assets/include/header.php";

?>

<div class="container-fluid">

	<div class="row">

    	<?php include "assets/include/left_menu.php";?>

        <div class="col-lg-9 col-md-9 col-sm-9">

        <h1 class="page-header">

            		<small>Categories<a href="del_categories.php" class="pull-right btn btn-danger"><i class="fa fa-trash-o"></i></a> <a href="add_categories.php" class="pull-right btn btn-primary"><i class="fa fa-upload"></i> Add New Category</a></small>

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

                                    <table class="table">

                                    <thead>

                                    	<tr>

                                        	<th><input type="checkbox" name="chkSelect" value="true"></th>

                                            <th>#</th>

                                            <th>Category Name</th>

                                            <th>Active</th>

                                            <th>Sort Order</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>

									<?php 

                                    $QRY = qry_run("select * from ms_main order by ranking"); 

                                    if (num_rec($QRY) > 0) 

                                    { 

                                    $p = 1; 

                                    while($rs = fetch_rec($QRY)) 

                                    { 

                                    $slink = "No"; 

                                    $secid = 0; 

                                    $catid = 0; 

                                    $QRYs = qry_run("select * from ms_prods where mainid = ".$rs['mainid']." AND secid = ".$secid." AND catid = ".$catid." order by ranking"); 

                                    if (num_rec($QRYs) > 0) 

                                    { 

                                    $slink = "Yes"; 

                                    } 

                                    ?>

                                    <tbody>

                                        <tr>

                                        	<th><input type="checkbox" name="Chk[<?=$rs['mainid'];?>]" value="<?=$rs['mainid'];?>"  class="categories"></th>

                                            <th><?=$p?>.</th>

                                            <th><?=$rs['pname']?></th>

                                            <th><?=$rs['pshow']?></th>

                                            <th><input type="text" class="form-control" name="ranking<?php echo $rs['mainid'];?>" value="<?=$rs['ranking']?>"></th>

                                            <th><a href="edit_categories.php?mid=<?=$rs['mainid']?>" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a></th>

                                        </tr>

                                    </tbody>

                                    <?php

									$p++;

									}

									}

									?>

                                    </table>

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

<?php include "assets/include/footer.php";?>