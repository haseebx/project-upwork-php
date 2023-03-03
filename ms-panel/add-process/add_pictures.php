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
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Add New Pictures</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                    <form action="<?=$web_url?>/process/gallery_process.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();">
                                    <input type="hidden" name="sub_mit" value="Y">
                                    <input type="hidden" name="main" value="<?=ch_lvl('main')?>">
                                    <input type="hidden" name="LVL" value="2">
                                    <input type="hidden" name="ptype" value="<?=$ptype?>">
                                    <input type="hidden" name="C_TYPE" value="NEW">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Picture Heading</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Picture Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Active / Unactive</label>
                                                <select class="form-control" name="pshow" id="pshow">
                                                	<option value="Yes">Active</option>
                                                    <option value="No">Unactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Complete Detail</label>
                                                <textarea class="ckeditor form-control" name="pdetail" rows="3" placeholder="Complete Detail"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Thumb Image</label>
                                                <input type="file" name="img1">
                                                <p class="help-block">Please Insert Your Picture Image.</p>
                                            </div>
                                        </div>
										
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Large Image</label>
                                                <input type="file" name="img2">
                                                <p class="help-block">Please Insert Your Picture Image.</p>
                                            </div>
                                        </div>
                                    
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="../add_process/pictures.php" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
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