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
            	<small>Categories</small>
            </h1>
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php 
                            $cate = ""; 
                            $RNK = qry_run("select * from ms_main where mainid = ".ch_lvl('mid')." order by ranking"); 
                            if (num_rec($RNK) > 0) 
                            { 
                            $rk = fetch_rec($RNK); 
                            $cate = $rk['pname']; 
                            } 
                            $QRY = qry_run("select * from ms_section where mainid = ".ch_lvl('mid')." order by ranking"); 
                            if (num_rec($QRY) > 0) 
                            { 
                            $plink = "No"; 
                            }else{ 
                            $plink = "Yes"; 
                            } 
                            ?>
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Categories | <?=$cate?></h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                        <form action="cat_prcess.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();"> 
                                        <input type="hidden" name="sub_mit" value="Y"> 
                                        <input type="hidden" name="LVL" value="3"> 
                                        <input type="hidden" name="C_TYPE" value="EDIT"> 
                                        <input type="hidden" name="mid" value="<?=ch_lvl('mid')?>"> 
                                        <input type="hidden" name="sec" value="<?=ch_lvl('sec')?>"> 
                                        <input type="hidden" name="cat" value="<?=ch_lvl('cat')?>"> 
                                        <?php 
                                        $QRY = qry_run("select * from ms_cat WHERE mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat').""); 
                                        if (num_rec($QRY) > 0) 
                                        { 
                                        $rs = fetch_rec($QRY); 
                                        
                                        ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Section Name</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Section Name" value="<?=$rs['pname']?>">
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
                                                <label for="exampleInputEmail1">Section Detail</label>
                                                <textarea class="ckeditor form-control" name="pdetail" rows="3" placeholder="Section Detail"><?=$rs['pdetail']?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category Slug</label>
                                                <input type="text" class="form-control" name="plink" placeholder="Category Slug" value="<?=$rs['plink']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Menu Image</label>
                                                <input type="hidden" name="imgs1" value="<?=$rs['img1']?>">
                                                <input type="file" name="img1">
                                                <p class="help-block">Please Insert Your Menu Image.</p>
                                                <img src="<?=$web_url_1?>items/subcategory/<?=$rs['img1']?>" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Banner Image</label>
                                                <input type="hidden" name="imgs2" value="<?=$rs['img2']?>"> 
                                                <input type="file" name="img2">
                                                <p class="help-block">Please Insert Your Banner Image.</p>
                                                <img src="<?=$web_url_1?>items/subcategory/<?=$rs['img2']?>" class="img-responsive" />
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
                                                <input type="text" class="form-control" name="pmeta" placeholder="Alt Text" value="<?=$rs['pmeta']?>">
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
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="<?=$web_url?>/subsection.php?mid=<?=$_REQUEST['../edit_process/mid']?>&amp;sec=<?=$_REQUEST['sec']?>" class="btn btn-danger">Cancel</a>
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
<?php include "../assets/include/footer.php";?>