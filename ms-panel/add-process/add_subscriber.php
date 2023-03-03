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
                                        <form action="<?=$web_url?>/process/subscriber_process.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();"> 
                                        <input type="hidden" name="sub_mit" value="Y"> 
                                        <input type="hidden" name="LVL" value="1"> 
                                        <input type="hidden" name="C_TYPE" value="NEW">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subscriber Name</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Subscriber Name">
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subscriber Email</label>
                                                <input type="text" class="form-control" name="email" placeholder="Subscriber Email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Subscriber Group Name</label>
                                                <select name="group" class="form-control" id="group">
                                                    <option value="0^0">- Select a Group -</option> 
                                                    <?php 
                                                    $QRY = qry_run("select * from ms_mail_group order by mainid"); 
                                                    if (num_rec($QRY) > 0) 
                                                    { 
                                                    while($rs = fetch_rec($QRY)) 
                                                    { 
                                                    ?> 
                                                    <option value="<?=$rs['mainid']?>^<?=$rs['pname']?>"><?=$rs['pname']?></option> 
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