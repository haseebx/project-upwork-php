<?php  
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
include "../assets/include/head.php";
include "../assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
		<?php 
        $pname = ""; 
        $RNK = qry_run("select * from ms_prods where pid = ".ch_lvl('pid')." order by ranking");
        if (num_rec($RNK) > 0) 
        { 
        $rk = fetch_rec($RNK); 
        $pname = $rk['pname']; 
        } 
        ?>
    	<div class="col-md-12">
        	<h1 class="page-header">
            	<small>More View <?=$pname?></small>
            </h1>
        </div>
        <form action="<?=$web_url?>/add-process/cat_prcess.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();"> 
        <input type="hidden" name="main" value="<?=ch_lvl('mid')?>"> 
        <input type="hidden" name="sec" value="<?=ch_lvl('sec')?>"> 
        <input type="hidden" name="cat" value="<?=ch_lvl('cat')?>"> 
        <input type="hidden" name="pid" value="<?=ch_lvl('pid')?>"> 
        <input type="hidden" name="LVL" value="9"> 
        <input type="hidden" name="sub_mit" value="Y"> 
        <input type="hidden" name="C_TYPE" value="NEW">
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Heading</label>
                <input type="text" class="form-control" name="pname" placeholder="Heading">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Active / Unactive</label>
                <input type="text" class="form-control" name="pshow" value="Yes" placeholder="Active / Unactive">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Detail</label>
                 <input type="text" class="form-control" name="pdetail" placeholder="Detail">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <input type="file" name="img2">
                <p class="help-block">Please Insert Your Image.</p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
        
        <div class="panel-body">
            <div id="morris-area-chart">
                <div class="row">
                    
                    <div class="panel-body">
                    <div id="morris-area-chart">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>View Heading</th>
                            <th>Active</th>
                            <th>Ranking</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php 
                    $QRY = qry_run("select * from ms_more where pid = ".ch_lvl('pid')." order by ranking");
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
                            <form name="frm_ranking<?=$rs['mainid']?>" method="post" action="ranking.php"> 
                            <input type="hidden" name="main" value="<?=$rs['mid']?>"> 
                            <input type="hidden" name="sec" value="<?=$rs['sec']?>"> 
                            <input type="hidden" name="cat" value="<?=$rs['cat']?>"> 
                            <input type="hidden" name="pid" value="<?=$rs['pid']?>"> 
                            <input type="hidden" name="more" value="<?=$rs['mainid']?>"> 
                            <input type="hidden" name="LVL" value="9"> 
                            <input type="hidden" name="sub_mit" value="Yes">
                            <th>
                                <div class="input-group">
                                <input type="text" class="form-control" name="ranking<?=$rs['mainid']?>" value="<?=$rs['ranking']?>">
                                <span class="input-group-btn">
                                <button class="btn btn-warning" type="submit"><i class="fa fa-random"></i></button>
                                </span>
                                </div>
                            </th>
                            </form>
                            <th><a href="<?=$web_url?>/add-process/cat_prcess.php?mid=<?=$rs['mid']?>&sec=<?=$rs['sec']?>&cat=<?=$rs['cat']?>&pid=<?=$rs['pid']?>&more=<?=$rs['mainid']?>&C_TYPE=DEL&LVL=9" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delet</a></th>
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
<?php include "../assets/include/footer.php";?>