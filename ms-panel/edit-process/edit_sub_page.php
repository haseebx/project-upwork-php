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
                <small>Content Sub Pages</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Content Sub Pages</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
										<?php
                                        $QRY = qry_run("select * from ms_contents_sub where mainid = ".$_REQUEST['mainid']." AND subid = ".$_REQUEST['subid']."");
                                        if (num_rec($QRY) > 0)
                                        {
                                        $rs = fetch_rec($QRY);
                                        
                                        ?>
                                        <form action="<?=$web_url?>/process/content_sub_process.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();">
                                        <input type="hidden" name="sub_mit" value="Y">
                                        <input type="hidden" name="LVL" value="1">
                                        <input type="hidden" name="C_TYPE" value="EDIT">
                                        <input type="hidden" name="mainid" value="<?=$_REQUEST['mainid']?>">
                                        <input type="hidden" name="subid" value="<?=$_REQUEST['subid']?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Page Name</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Page Name" value="<?=$rs['pname']?>">
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
                                                <label for="exampleInputFile">Page Detail</label>
                                                <textarea class="ckeditor form-control" name="pdetail" rows="3" placeholder="Page Detail"><?=$rs['pdetail']?></textarea>
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
                                                <input type="text" class="form-control" name="meta_text" placeholder="Alt Text" value="<?=$rs['meta_text']?>">
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
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="<?=$web_url?>/content_sub.php?mainid=<?=$_REQUEST['mainid']?>" class="btn btn-danger">Cancel</a>
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