<?php  

include "common/param.php";

include "common/func.php";

include "common/chk_login.php";

include "assets/include/head.php";

include "assets/include/header.php";

$mid = 1;

?>

<div class="container-fluid">

	<div class="row">

    	<div class="col-lg-12 col-md-12 col-sm-12">

            <h1 class="page-header">

                <small>Website Setting</small>

            </h1>

            

            

        	

            

            <div class="row">

                <div class="col-lg-12">

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Left Menu Setting</h3>

                        </div>

                        <div class="panel-body">

                            <div id="morris-area-chart">

                                <div class="row">

                                	<form action="left_menu_process.php" method="post" enctype="multipart/form-data">

                                    <input type="hidden" name="sub_mit" value="Y">



									<?php

                                    $QRY = qry_run("select * from ms_menu");

                                    if (num_rec($QRY) > 0)

                                    {

                                    $rs = fetch_rec($QRY);

                                    ?>

                                    <?php if (chp('UP') == "Y"){ ?>

                                    <div class="col-md-12">

                                    	<p><font color="#006600"><strong>Updated Successfully.........</strong></font></p>

                                    </div>

                                    <?php }?>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Website Categories Level</label>

                                            <input type="text" class="form-control" name="LVL" value="<?=$rs['LVL']?>">

                                        </div>

                                    </div>

                                	<div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Categories</label>

                                            <input type="text" class="form-control" name="Categories" value="<?=$rs['Categories']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Feature Products</label>

                                            <input type="text" class="form-control" name="Feature" value="<?=$rs['Feature']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Special Products</label>

                                            <input type="text" class="form-control" name="Special" value="<?=$rs['Special']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Hot Products</label>

                                            <input type="text" class="form-control" name="Hot" value="<?=$rs['Hot']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Options / Variations</label>

                                            <input type="text" class="form-control" name="Options" value="<?=$rs['Options']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Content Pages</label>

                                            <input type="text" class="form-control" name="Pages" value="<?=$rs['Pages']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">News & Events</label>

                                            <input type="text" class="form-control" name="News" value="<?=$rs['News']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Submitted Inquiries</label>

                                            <input type="text" class="form-control" name="Inquiries" value="<?=$rs['Inquiries']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Newsletter</label>

                                            <input type="text" class="form-control" name="Newsletter" value="<?=$rs['Newsletter']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Promotional Banners</label>

                                            <input type="text" class="form-control" name="banner" value="<?=$rs['banner']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Manage Logos</label>

                                            <input type="text" class="form-control" name="Logos" value="<?=$rs['Logos']?>">

                                        </div>

                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Factory View</label>

                                            <input type="text" class="form-control" name="Factory" value="<?=$rs['Factory']?>">

                                        </div>

                                    </div>

                                    

                                    <div class="col-md-6">

                                        <div class="form-group">

                                            <button type="submit" class="btn btn-primary">Update</button>

                                        </div>

                                    </div>

                                    <?php }?>

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

<?php include "assets/include/footer.php";?>