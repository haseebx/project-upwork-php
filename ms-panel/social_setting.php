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
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Website Setting</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	<form action="<?=$web_url?>/process/social_process.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="sub_mit" value="Y">
                                    <input type="hidden" name="LVL" value="1">
                                    <input type="hidden" name="C_TYPE" value="EDIT">
                                    <input type="hidden" name="mid" value="<?=$mid?>">
									<?php
                                    $QRY = qry_run("select * from ms_social WHERE mainid = ".$mid."");
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
                                            <label for="exampleInputEmail1">Facebook</label>
                                            <input type="text" class="form-control" name="facebook" value="<?=$rs['facebook']?>">
                                        </div>
                                    </div>
									
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Twitter</label>
                                            <input type="text" class="form-control" name="twitter" value="<?=$rs['twitter']?>">
                                        </div>
                                    </div>
									
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Instagram</label>
                                            <input type="text" class="form-control" name="instagram" value="<?=$rs['instagram']?>">
                                        </div>
                                    </div>
									
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pintrest</label>
                                            <input type="text" class="form-control" name="pintrest" value="<?=$rs['pintrest']?>">
                                        </div>
                                    </div>
									
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Linkedin </label>
                                            <input type="text" class="form-control" name="linkedin" value="<?=$rs['linkedin']?>">
                                        </div>
                                    </div>
									
									
									
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Google +</label>
                                            <input type="text" class="form-control" name="google" value="<?=$rs['google']?>">
                                        </div>
                                    </div>
									
									
									<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Skype</label>
                                            <input type="text" class="form-control" name="skype" value="<?=$rs['skype']?>">
                                        </div>
                                    </div>
									
									<div class="col-md-12">
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