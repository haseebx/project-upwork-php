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
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Password Setting</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	<form action="<?=$web_url?>/process/password_process.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="sub_mit" value="Y">
                                    <input type="hidden" name="LVL" value="1">
                                    <input type="hidden" name="C_TYPE" value="EDIT">
                                    <input type="hidden" name="mid" value="<?=$mid?>">
									<?php
                                    $QRY = qry_run("select * from ms_webs WHERE mainid = ".$mid."");
                                    if (num_rec($QRY) > 0)
                                    {
                                    $rs = fetch_rec($QRY);
                                    ?>
                                    <?php if (chp('OLD') == "Y"){ ?>
                                    <div class="col-md-12">
                                    	<p><font color="#FF0000">Wrong OLD Password.........</font></p>
                                    </div>
                                    <?php }?>
                                    <?php if (chp('UP') == "Y"){ ?>
                                    <div class="col-md-12">
                                    	<p><font color="#006600"><strong>Updated Successfully.........</strong></font></p>
                                    </div>
                                    <?php }?>
                                    <?php if (chp('E') == "Y"){ ?>
                                    <div class="col-md-12">
                                    	<p><font color="#FF0000"><strong>Something went wrong.........</strong></font></p>
                                    </div>
                                    <?php }?>
                                	<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Old Password</label>
                                            <input type="password" class="form-control" name="old_pass">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">New Password</label>
                                            <input type="password" class="form-control" name="new_pass" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Active / Unactive</label>
                                            <select class="form-control" name="website" id="website">
                                                <option value="Yes" <?php if ($rs['website'] == "Yes"){ ?> selected<?php }?>>Active</option>
                                                <option value="No" <?php if ($rs['website'] == "No"){ ?> selected<?php }?>>Unactive</option>
                                            </select>
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