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
                <small>Product Options / Variations</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<?php 
                            $pname = ""; 
                            $QRYs = qry_run("select * from ms_options where mainid = ".ch_lvl('mid')." order by ranking"); 
                            if (num_rec($QRYs) > 0) 
                            { 
                            $rss = fetch_rec($QRYs); 
                            $pname = $rss['pname']; 
                            } 
                            ?>
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Product Options / Variations | <?=$pname?></h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
										<?php 
                                        $QRY = qry_run("select * from ms_sub_opt WHERE mainid = ".ch_lvl('mid')." AND subid = ".ch_lvl('sid').""); 
                                        if (num_rec($QRY) > 0) 
                                        { 
                                        $rs = fetch_rec($QRY); 
                                        
                                        ?>
                                        <form action="cat_prcess.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();"> 
                                        <input type="hidden" name="sub_mit" value="Y"> 
                                        <input type="hidden" name="mid" value="<?=ch_lvl('mid')?>"> 
                                        <input type="hidden" name="sid" value="<?=ch_lvl('sid')?>"> 
                                        <input type="hidden" name="LVL" value="8"> 
                                        <input type="hidden" name="C_TYPE" value="EDIT">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Option Name</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Option Name" value="<?=stp($rs['pname'])?>">
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
                                                <label for="exampleInputEmail1">Option Detail</label>
                                                <textarea class="ckeditor form-control" name="pdetail" rows="3" placeholder="Page Detail"><?=stp($rs['pdetail'])?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="<?=$web_url?>/sub_opt.php?mid=<?=$_REQUEST['mid']?>" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                    <?php }?>
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