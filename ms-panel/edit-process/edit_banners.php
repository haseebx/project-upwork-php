<?php  
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
include "../assets/include/head.php";
include "../assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
                <small>Promotional Banners</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Add New Banner</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
									<?php 
                                    $QRY = qry_run("select * from ms_banners WHERE mainid = ".ch_lvl('mid').""); 
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $rs = fetch_rec($QRY); 
                                    
                                    ?>
                                    <form action="<?=$web_url?>/process/banner_process.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();"> 
                                    <input type="hidden" name="sub_mit" value="Y"> 
                                    <input type="hidden" name="LVL" value="1"> 
                                    <input type="hidden" name="C_TYPE" value="EDIT"> 
                                    <input type="hidden" name="mid" value="<?=ch_lvl('mid')?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Banner Heading</label>
                                                <input type="text" class="form-control" name="pname" value="<?=$rs['pname']?>" placeholder="Banner Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Active / Unactive</label>
                                                <select class="form-control" name="pshow" id="pshow">
                                                	<option value="Yes" <?php if ($rs['pshow'] == "Yes"){ ?> selected<?php }?>>Active</option>
                                                    <option value="No" <?php if ($rs['pshow'] == "No"){ ?> selected<?php }?>>Unactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Banner Link</label>
                                                <input type="text" class="form-control" name="plink" value="<?=$rs['plink']?>" placeholder="Banner Link">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Banner Image</label>
                                                <input type="file" name="img1">
                                                <p class="help-block">Please Insert Your Banner Image.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="<?=$web_url?>/banners.php" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            	<img src="<?=$web_url_1?>items/banners/<?=$rs['img1']?>" class="img-responsive" />
                                            </div>
                                        </div>
                                        
                                    </form>
                                    <?php
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
</div>
<?php include "../assets/include/footer.php";?>