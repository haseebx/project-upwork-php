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
                <small>Product Options / Variations<a href="add-process/add_sub_option.php?mid=<?=$_REQUEST['mid']?>" class="pull-right btn btn-danger"><i class="fa fa-upload"></i> Add New Option</a></small>
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
                                	
									<div class="panel-body">
                                    <div id="morris-area-chart">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Option Name</th>
                                            <th>Ranking</th>
                                            <th>Publish</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<?php 
                                    $QRY = qry_run("select * from ms_sub_opt where mainid = ".ch_lvl('mid')." order by ranking"); 
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $p = 1; 
                                    while($rs = fetch_rec($QRY)) 
                                    { 
                                    ?> 
                                    <tbody>
                                        <tr>
                                            <th><?=$p?>.</th>
                                            <th><?=stp($rs['pname'])?></th>
                                            
                                            <th><input type="text" class="form-control" name="ranking<?php echo $rs['subid'];?>" value="<?=$rs['ranking']?>"></th>
                                            
                                            <th><?=$rs['pshow']?></th>
                                            <th><a href="edit-process/edit_sub_opt.php?mid=<?=$rs['mainid']?>&amp;sid=<?=$rs['subid']?>" class="btn btn-primary">Edit</a> - <a href="cat_prcess.php?mid=<?=$rs['mainid']?>&sid=<?=$rs['subid']?>&C_TYPE=DEL&LVL=8" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delet</a></th>
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