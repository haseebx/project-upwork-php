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
                <small>Manage Pictures</small>
            </h1>
            
            
        	
            <?php
			$Page_head = "";
			$ptype = "PIC";
			$CAT = qry_run("Select * from ms_pic_category where mainid = ".ch_lvl('main')."");
			if (num_rec($CAT) > 0)
			{
				$rsc = fetch_rec($CAT);
				$Page_head = $rsc['pname'];
				$ptype = $rsc['ptype'];
			}
			?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Manage Pictures</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
									<?php
                                    $QRY = qry_run("select * from ms_pictures WHERE subid = ".ch_lvl('sub')."");
                                    if (num_rec($QRY) > 0)
                                    {
                                    $rs = fetch_rec($QRY);
                                    
                                    ?>
                                        <form action="<?=$web_url?>/process/gallery_process.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();">
                                        <input type="hidden" name="sub_mit" value="Y">
                                        <input type="hidden" name="LVL" value="2">
                                        <input type="hidden" name="C_TYPE" value="EDIT">
                                        <input type="hidden" name="ptype" value="<?=$ptype?>">
                                        <input type="hidden" name="main" value="<?=ch_lvl('main')?>">
                                        <input type="hidden" name="sub" value="<?=ch_lvl('sub')?>">
                                        <input type="hidden" name="img1" value="<?=$rs['img1']?>">
                                        <input type="hidden" name="img2" value="<?=$rs['img2']?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Picture Heading</label>
                                                <input type="text" class="form-control" name="pname" value="<?=$rs['pname']?>" placeholder="Picture Name">
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
                                                <label for="exampleInputEmail1">Complete Detail</label>
                                                <textarea class="ckeditor form-control" name="pdetail" rows="3" placeholder="Complete Detail"><?=$rs['pdetail']?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Thumb Image</label>
                                                <input type="file" name="img1">
                                                <p class="help-block">Please Insert Your Banner Image.</p>
                                            </div>
                                        </div>
                                        
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">large Image</label>
                                                <input type="file" name="img2">
                                                <p class="help-block">Please Insert Your Banner Image.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="<?=$web_url?>/pictures.php?main=<?=$_REQUEST['main']?>" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            	<img src="<?=$web_url_1?>items/gallery/<?=$rs['img1']?>" class="img-responsive" />
                                            </div>
                                        </div>
										
										 <div class="col-md-6">
                                            <div class="form-group">
                                            	<img src="<?=$web_url_1?>items/gallery/<?=$rs['img2']?>" class="img-responsive" />
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