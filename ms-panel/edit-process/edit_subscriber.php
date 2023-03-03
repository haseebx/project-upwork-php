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
                <small>Subscriber's List</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Subscriber's List</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
										<?php 
                                        $QRY = qry_run("select * from ms_subscribers WHERE mainid = ".ch_lvl('mid').""); 
                                        if (num_rec($QRY) > 0) 
                                        { 
                                        $rs = fetch_rec($QRY); 
                                        
                                        ?>
                                        <form action="<?=$web_url?>/process/subscriber_process.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();"> 
                                        <input type="hidden" name="sub_mit" value="Y"> 
                                        <input type="hidden" name="LVL" value="1"> 
                                        <input type="hidden" name="C_TYPE" value="EDIT"> 
                                        <input type="hidden" name="mid" value="<?=ch_lvl('mid')?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subscriber Name</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Subscriber Name" value="<?=$rs['pname']?>">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subscriber Email</label>
                                                <input type="text" class="form-control" name="email" placeholder="Subscriber Email" value="<?=$rs['pmail']?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Subscriber Group Name</label>
                                                <select name="group" class="form-control" id="group">
                                                    <option value="0^0">- Select a Group -</option> 
                                                    <?php 
                                                    $QRYg = qry_run("select * from ms_mail_group order by mainid"); 
                                                    if (num_rec($QRYg) > 0) 
                                                    { 
                                                    while($rsg = fetch_rec($QRYg)) 
                                                    { 
                                                    ?> 
                                                    <option value="<?=$rsg['mainid']?>^<?=$rsg['pname']?>"<?php if ($rs['group_id'] == $rsg['mainid']){ ?> selected<?php }?>> 
                                                    <?=$rsg['pname']?> 
                                                    </option> 
                                                    <?php 
                                                    } 
                                                    } 
                                                    ?>  
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="<?=$web_url?>/subscriber.php" class="btn btn-danger">Cancel</a>
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