<?php  
include "common/param.php";
include "common/func.php";
include "common/chk_login.php";
include "assets/include/head.php";
include "assets/include/header.php";
$mid = 1;
?>

<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
                <small>Website Setting</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-envelope fa-fw"></i> Email Setting</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	<form action="email_process.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="sub_mit" value="Y">
                                    <input type="hidden" name="LVL" value="1">
                                    <input type="hidden" name="C_TYPE" value="EDIT">
                                    <input type="hidden" name="mid" value="<?=$mid?>">
									<?php
                                    $QRY = qry_run("select * from ms_webs WHERE mainid = ".$mid."");
                                    if (num_rec($QRY) > 0)
                                    {
                                    $rs = fetch_rec($QRY);
                                    ?>
                                    <?php if (chp('UP') == "Y"){ ?>
                                    <div class="col-md-12">
                                    	<p><font color="#006600"><strong>Updated Successfully.........</strong></font></p>
                                    </div>
                                    <?php }?>
                                	<div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email Function</label>
                                            <select name="email_type" class="form-control form-select">
												<option value="phpmail" <? echo ($rs['email_type'] == "phpmail")?"selected":'';?>PHP Mail</option>
												<option value="smtp" <? echo ($rs['email_type'] == "smtp")?"selected":'';?>SMTP Mail</option>
											</select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">From Address</label>
                                            <input type="text" class="form-control" name="from_email" value="<?=$rs['from_email']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" name="email_user" value="<?=$rs['email_user']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" class="form-control" name="email_pass" value="<?php echo md5_usalt_uhash($rs['email_pass']);?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mail Server</label>
                                            <input type="text" class="form-control" name="mail_server" value="<?=$rs['mail_server']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">SMTP Port</label>
                                            <input type="text" class="form-control" name="port" value="<?=$rs['port']?>">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>
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
<?php include "assets/include/footer.php";?>