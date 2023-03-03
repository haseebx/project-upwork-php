<?php  
include "../edit_process/param.php"; 
include "../edit_process/func.php"; 
include "../edit_process/chk_login.php";
include "../edit_process/assets/include/head.php";
include "../edit_process/assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
                <small>Manage Newsletter</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Manage Newsletter</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                        <form action="../edit_process/letter_process.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();"> 
                                        <input type="hidden" name="sub_mit" value="Y"> 
                                        <input type="hidden" name="LVL" value="1"> 
                                        <input type="hidden" name="C_TYPE" value="EDIT"> 
                                        <input type="hidden" name="mid" value="<?=ch_lvl('mid')?>">
										<?php 
                                        $QRY = qry_run("select * from ms_letter WHERE mainid = ".ch_lvl('mid').""); 
                                        if (num_rec($QRY) > 0) 
                                        { 
                                        $rs = fetch_rec($QRY); 
                                        
                                        ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subject</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Subject" value="<?=$rs['pname']?>">
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
                                                <label for="exampleInputEmail1">Template / Contents</label>
                                                <textarea class="form-control ckeditor" name="pdetail" rows="3" placeholder="Template / Contents"><?=$rs['pdetail']?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="<?=$web_url?>/newsletter.php" class="btn btn-danger">Cancel</a>
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