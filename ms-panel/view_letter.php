<?php  
include "common/param.php"; 
include "common/func.php"; 
include "common/chk_login.php";
include "assets/include/head.php";
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-md-12">
			<?php 
            $QRY = qry_run("select * from ms_letter WHERE mainid = ".ch_lvl('mid').""); 
            if (num_rec($QRY) > 0) 
            { 
            $rs = fetch_rec($QRY); 
            ?>
            <h1 class="page-header">
                <small><?=$rs['pname']?></small>
            </h1>
            <p><?=$rs['pdetail']?></p>
            <?php
			}
			?>
        </div>
    </div>
</div>
<?php include "assets/include/footer.php";?>