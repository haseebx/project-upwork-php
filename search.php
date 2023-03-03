<?php
include"ms-panel/common/func.php";
include"ms-panel/common/param.php";
include"live.php";
$SET = qry_run("select * from ms_webs");
$rs = fetch_rec($SET);
if($rs['website'] == "Yes"){
?>
<!DOCTYPE html>
<html lang="en">
<?php include"_head.php";?>

<body>
<?php include"include/header.php";?>


<div class="pag-main">
<div class="container-fluid">
	<div class="">
    	<?php include"include/left.php";?>
        <div class="col-md-9 prds-inner-bg">
		<div class="col-md-12 col-sm-12 col-xs-12 heading">Search</div>
            	<div class="in-div">
				<div class="brds_text">
            	
<ul class="breadcrumb">
                        <li>Home</li>
                        <li>Search &nbsp;</li>
                       
                        
                      </ul>
                </div>
              
        	<div class="content_head">Search Result " <?=chf('tsearch')?> "</div></div>
        	
            <div class="row">
				<?php
                $cur_page = intval(ch_page('cur'));
                //$PER_PAGE = 4;
                $prod_page = $PER_PAGE;
                $perpage = $prod_page;
                if ($cur_page == 1)
                {
                $subt = 0;
                }else{
                $subt = $cur_page * $prod_page;
                $subt = $subt - $prod_page;
                }
                $sqln = "Select * from ms_prods where pshow = 'Yes' AND (pname Like '%".chf('tsearch')."%' OR part Like '%".chf('tsearch')."%' OR pdetail Like '%".chf('tsearch')."%') order by part";
                $queryn = qry_run($sqln);
                $rs_n = num_rec($queryn);
                ?>
                <?php
                $sql = "Select * from ms_prods where pshow = 'Yes' AND (pname Like '%".chf('tsearch')."%' OR part Like '%".chf('tsearch')."%' OR pdetail Like '%".chf('tsearch')."%') order by part";
                $query = qry_run($sql);
                $rs_num = num_rec($query);
                if ($rs_num > 0)
                {
                while ($rsp = fetch_rec($query))
                {
                ?>
                 <?php
                $qryy1 = qry_run("select * from ms_main where mainid='".$rsp['mainid']."'");
                $roww1 = fetch_rec($qryy1);
                $mmname1 = $roww1['plink'];
                $qryy2 = qry_run("select * from ms_section where secid='".$rsp['secid']."' and mainid='".$rsp['mainid']."'");
                $roww2 = fetch_rec($qryy2);
                $ssname2 = $roww2['plink'];
                $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2)."/detail/".$rsp['part'];
                ?>
            	            <form action="<?=$web_url_1?>addtocart.php" method="post" name="frm_cart" id="frm_cart">

            	<div class="col-md-3 col-sm-6 col-xs-12 ">
				<div class="p_box">
				 
                    	<div class="p_img">
                        	<ul class="lb-album">
					<li>
						<a href="#modal-id-<?=$rsp['part']?>">
							<img src="<?=$web_url_1?>items/products/<?=$rsp['img1']?>" class="img-responsive">
							<span><i class="fa fa-search-plus" aria-hidden="true"></i></span>
						</a>
						
						    <div class="light-modal zoomInUp" id="modal-id-<?=$rsp['part']?>" role="dialog" aria-labelledby="light-modal-label" aria-hidden="false">
        <div class="jello light-modal-content animated">
            <!-- light modal header -->
            <div class="light-modal-header">
                <h3 class="light-modal-heading"><?=$rsp['pname']?></h3>
                <a href="#" class="light-modal-close-icon" aria-label="close">&times;</a>
            </div>
            <!-- light modal body -->
            <div class="light-modal-body">
			<div class="col-md-7">
                <img src="<?=$web_url_1?>items/products/<?=$rsp['img3']?>" class="img-responsive">
		    </div>
			<div class="col-md-5">
           <div class="thumb-link">
                       <div class="dpe_name"><?=$rsp['pname']?></div>
                        <div class="dpe_arts">Art # <?=$rsp['part']?></div>
						<div class="dpe_detail"><?=$rsp['pdetail']?></div>
						<div class="dpe_basket"> <a href="<?=$lnk5555?>" class="btn sub">View Detail </a> 
                        <button type="submit" class="btn sub">Add to basket</button></p>
                      <input  type="hidden" name="qty"  id="qty" class="form-control qty" value="2"  /> 
				
                <input type="hidden" name="sub_mit" value="Yes">
                <input type="hidden" name="live" value="<?=$mid?>_<?=$sid?>_<?=$cid?>_<?=$rsp['pid']?>" />
				
				 <?php
                    if ($sid != 0){
                    ?>
                    <input type="hidden" name="ppllnnkk" value="<?=$web_url_1.rpd($M_head)."/".rpd($S_head);?>">
					<input type="hidden" name="cont" value="<?=$web_url_1.rpd($M_slug)."/".rpd($S_slug);?>">
                    <?php }else{ ?>
                    <input type="hidden" name="ppllnnkk" value="<?=$web_url_1.rpd($M_head);?>">
					<input type="hidden" name="cont" value="<?=$web_url_1.rpd($M_slug)?>">
                    <?php } ?>
                        </div>
                    </div>
					</div>
            </div>
            <!-- light modal footer -->
            <div class="light-modal-footer">
                <a href="#" class="light-modal-close-btn" aria-label="close">Close</a>
            </div>
        </div>
    </div>
						
						
						
					</li>
					
					
				
				</ul>
                        </div>
						<div class="thumb-link">
                       <div class="p_name"><?=$rsp['pname']?></div>
                        <div class="p_art">Art # <?=$rsp['part']?></div>
						<div class="p_basket"> <a href="<?=$lnk5555?>" class="vew">View Detail </a> 
                        <button type="submit" class="btn bas">Add to basket</button></p>
                      <input  type="hidden" name="qty"  id="qty" class="form-control qty" value="2"  /> 
				
                <input type="hidden" name="sub_mit" value="Yes">
                <input type="hidden" name="live" value="<?=$mid?>_<?=$sid?>_<?=$cid?>_<?=$rsp['pid']?>" />
				
				 <?php
                    if ($sid != 0){
                    ?>
                    <input type="hidden" name="ppllnnkk" value="<?=$web_url_1.rpd($M_head)."/".rpd($S_head);?>">
					<input type="hidden" name="cont" value="<?=$web_url_1.rpd($M_slug)."/".rpd($S_slug);?>">
                    <?php }else{ ?>
                    <input type="hidden" name="ppllnnkk" value="<?=$web_url_1.rpd($M_head);?>">
					<input type="hidden" name="cont" value="<?=$web_url_1.rpd($M_slug)?>">
                    <?php } ?>
                        </div>
                    </div>
                   
                    </div>
               
           </div>
            </form>
                <?php
                }
                }else{
                ?>
                <div class="content_text" style="text-align:center;">No Record Found.....!</div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include"include/footer.php";
include"include/scripts.php";
?>
<?php
}else{
	header("Location: close.php");
	die;
}
?>