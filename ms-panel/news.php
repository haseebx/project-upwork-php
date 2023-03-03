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
                <small>News & Events<a href="add-process/add_news.php" class="pull-right btn btn-danger"><i class="fa fa-upload"></i> Add News</a></small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> News & Events</h3>
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
                                            <th>News Heading</th>
                                            <th>Dated</th>
                                            <th>Publish</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<?php 
                                    $QRY = qry_run("select * from ms_news order by mainid"); 
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
                                            <th><?=date("d-m-Y",$rs['pdate'])?></th>
                                            <th><?=$rs['pshow']?></th>
                                            <th><a href="edit-process/edit_news.php?mid=<?=$rs['mainid']?>" class="btn btn-primary">Edit</a> - <a href="process/news_process.php?mid=<?=$rs['mainid']?>&C_TYPE=DEL&LVL=1" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delet</a></th>
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