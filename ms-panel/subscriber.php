<?php  
include "common/param.php"; 
include "common/func.php"; 
include "common/chk_login.php";
include "assets/include/head.php";
include "assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
                <small>Subscriber's List <a href="sub_group.php" class="pull-right btn btn-danger">Manage Subscriber's Groups </a></small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Subscriber's List <a href="add-process/add_subscriber.php" class="pull-right btn btn-xs btn-danger" style="color:#fff;">Add New Subscriber</a></h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	
									<div class="panel-body">
                                    <div id="morris-area-chart">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subscriber Name</th>
                                            <th>E-mail</th>
                                            <th>Group</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<?php 
                                    $SQL = "select * from ms_subscribers order by mainid"; 
                                    $queryn = qry_run($SQL); 
                                    $rs_n = num_rec($queryn); 
                                    $QRY = qry_run($SQL); 
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $p = 1; 
                                    while($rs = fetch_rec($QRY)) 
                                    { 
                                    ?>
                                    <tbody>
                                        <tr>
                                            <th><?=$p?>.</th>
                                            <th><?=$rs['pname']?></th>
                                            <th><?=$rs['pmail']?></th>
                                            <th><?=$rs['group_name']?></th>
                                            <th><?=$rs['pshow']?></th>
                                            <th><a href="edit-process/edit_subscriber.php?mid=<?=$rs['mainid']?>" class="btn btn-primary">Edit</a> - <a href="process/subscriber_process.php?mid=<?=$rs['mainid']?>&C_TYPE=DEL&LVL=1" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delet</a></th>
                                        </tr>
                                    </tbody>
                                    <?php
									$p++;
									}
									}
									?>
                                    </table>
                                    </div>
                                    </div>
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