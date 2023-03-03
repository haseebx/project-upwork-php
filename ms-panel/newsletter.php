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
                <small>Manage Newsletter<a href="add-process/add_newsletter.php" class="pull-right btn btn-danger"><i class="fa fa-upload"></i> Add New Newsletter</a></small>
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
                                	
									<div class="panel-body">
                                    <div id="morris-area-chart">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Dated</th>
                                            <th>Active</th>
                                            <th>View</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<?php 
                                    $QRY = qry_run("select * from ms_letter order by mainid"); 
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
                                            <th><?=shdate($rs['pdate'])?></th>
                                            <th><?=$rs['pshow']?></th>
                                            <th><a href="view_letter.php?mid=<?=$rs['mainid']?>" class="btn btn-success" target="_blank"><i class="glyphicon glyphicon-picture"></i> View</a></th>
                                            <th><a href="edit-process/edit_letter.php?mid=<?=$rs['mainid']?>" class="btn btn-primary">Edit</a> - <a href="process/letter_process.php?mid=<?=$rs['mainid']?>&C_TYPE=DEL&LVL=1" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delet</a></th>
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