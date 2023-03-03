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
                <small>Manage Gallery</small>
            </h1>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Gallery</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
									<?php 
                                    $QRY = qry_run("select * from ms_pic_category WHERE mainid = ".$_REQUEST['mid'].""); 
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $rs = fetch_rec($QRY); 
                                    ?>
                                    <form action="<?=$web_url?>/process/gallerys_process.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();">
                                    <input type="hidden" name="sub_mit" value="Y">
                                    <input type="hidden" name="C_TYPE" value="EDIT">
                                    <input type="hidden" name="mainid" value="<?=$rs['mainid']?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Gallery Heading</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Gallery Heading" value="<?=$rs['pname']?>">
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
                                                <label for="exampleInputEmail1">Gallery Detail</label>
                                                <textarea class="ckeditor form-control" name="pdetail" rows="3" placeholder="Gallery Detail"><?=$rs['pdetail']?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Gallery Thumb</label>
                                                <input type="hidden" name="imgs1" value="<?=$rs['img1']?>">
                                                <input type="file" name="img1">
                                                <p class="help-block">Please Insert Your Gallery Thumb.</p>
                                                <img src="<?=$web_url_1?>items/gallery/<?=$rs['img1']?>" class="img-responsive">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <ol class="breadcrumb">
                                            	<li><strong>SEO Detail</strong></li>
                                            </ol>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Title</label>
                                                <input type="text" class="form-control" name="phead" placeholder="Title" value="<?=$rs['phead']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Alt Text</label>
                                                <input type="text" class="form-control" name="alt_text" placeholder="Alt Text" value="<?=$rs['alt_text']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Keywords</label>
                                                <input type="text" class="form-control" name="keywords" placeholder="Keywords" value="<?=$rs['keywords']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Description</label>
                                                <textarea class="form-control" name="description" rows="3" placeholder="Description"><?=$rs['description']?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Submit</button> <a href="<?=$web_url?>/gallerys.php" class="btn btn-danger">Cancel</a>
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