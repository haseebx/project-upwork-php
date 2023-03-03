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
                <small>Manage Pictures <a href="add-process/add_pictures.php?main=<?=$_REQUEST['main']?>" class="pull-right btn btn-danger"><i class="fa fa-upload"></i> Add New Picture</a></small>
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
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Manage Pictures</h3>
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
                                            <th>Picture Name</th>
                                            <th>Active</th>
                                            <th>Ranking</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									<?php
                                    $QRY = qry_run("select * from ms_pictures where mainid = ".ch_lvl('main')." order by ranking");
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
                                            <th><?=$rs['pshow']?></th>
                                           
                                            <th><input type="text" class="form-control" name="ranking<?php echo $rs['subid'];?>" value="<?=$rs['ranking']?>" placeholder="Banner Name"></th>
                                          
                                            <th><a href="edit-process/edit_pictures.php?main=<?=$rs['mainid']?>&amp;sub=<?=$rs['subid']?>" class="btn btn-primary">Edit</a> - <a href="process/gallery_process.php?main=<?=$rs['mainid']?>&sub=<?=$rs['subid']?>&C_TYPE=DEL&LVL=2" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delet</a></th>
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