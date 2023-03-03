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
                <small>Product Options / Variations<a href="add-process/add_option.php" class="pull-right btn btn-danger"><i class="fa fa-upload"></i> Add New Option</a></small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Product Options / Variations</h3>
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
                                            <th>Option Name</th>
                                            <th>Position</th>
                                            <th>Style</th>
                                            <th>Ranking</th>
                                            <th>Publish</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<?php 
                                    $QRY = qry_run("select * from ms_options order by ranking"); 
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $p = 1; 
                                    while($rs = fetch_rec($QRY)) 
                                    { 
                                    ?> 
                                    <tbody>
                                        <tr>
                                            <th><?=$p?>.</th>
                                            <th><a href="sub_opt.php?mid=<?=$rs['mainid']?>" class="base_link"><?=stp($rs['pname'])?></a></th>
                                            <th><?=$rs['pstyle']?></th>
                                            <th><?=$rs['ptype']?></th>
                                            <form name="frm_ranking<?=$rs['mainid']?>" method="post" action="ranking.php"> 
                                            <input type="hidden" name="main" value="<?=$rs['mainid']?>"> 
                                            <input type="hidden" name="LVL" value="7"> 
                                            <input type="hidden" name="sub_mit" value="Yes">
                                            <th><input type="text" class="form-control" name="ranking<?php echo $rs['mainid'];?>" value="<?=$rs['ranking']?>"></th>
                                            </form>
                                            <th><?=$rs['pshow']?></th>
                                            <th><a href="edit_option.php?mid=<?=$rs['mainid']?>" class="btn btn-primary">Edit</a> - <a href="cat_prcess.php?mid=<?=$rs['mainid']?>&C_TYPE=DEL&LVL=7" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delet</a></th>
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