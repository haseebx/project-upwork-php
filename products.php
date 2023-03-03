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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$phead?>  | <?=$S_phead?>  | <?=$web_title?> </title>
<meta name="keywords" content="<?=$M_keywords?>">
<meta name="description" content="<?=$M_desc?>">
<meta 
     name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
/>
<?php include"_head.php";?>
<body>

<?php include"include/header.php";?>

<?php include"include/sub_banner.php";?>



<div class="full">

<div class="container-fluid">

	<div class="">

   <?php include"include/left.php";?>

    

	<div class="col-md-9">

<div class="brds">

	<div class="heading"><?=$M_head?></div>

		<div class="in-div">

	<div class="brds_text">

		<ul class="breadcrumb">

			<?php

                if ($sid != 0){

                $ppllnnkk = $web_url_1.rpd($M_slug)."/".rpd($S_slug);

                }else{

                $ppllnnkk = $web_url_1.rpd($M_slug)."/detail/".$rsp['part'];	

                }

            ?>

		<li><a href="<?=$web_url_1?>home">Home </a></li>

		<li><a href="<?=$ppllnnkk?>"><?php if ($sid != 0){ ?><?=$M_head?> &nbsp; </a></li>

		<li><?=$S_head?><?php }else{?><?=$M_head?><?php }?></li>

		</ul>

    </div>

</div>

</div>

           

		   <?php




                $cur_page = ch_page('cur');

                $PER_PAGE = 12;

                $prod_page = $PER_PAGE;

                $perpage = $prod_page;

                if ($cur_page == 1)

                {

                $subt = 0;

                }else{

                $subt = $cur_page * $prod_page;

                $subt = $subt - $prod_page;

                }

                $sqln = "Select * from ms_prods where pshow = 'Yes' AND mainid = ".$mid." AND secid = ".$sid." AND catid = ".$cid." order by ranking";

                $queryn = qry_run($sqln);

                $rs_n = num_rec($queryn);

                ?>

				<div class="row11">

				<?php

                $sql = "Select * from ms_prods where pshow = 'Yes' AND mainid = ".$mid." AND secid = ".$sid." AND catid = ".$cid." order by ranking limit $subt,$perpage";

                $query = qry_run($sql);

                $rs_num = num_rec($query);

                if ($rs_num > 0)

                {

                while ($rsp = fetch_rec($query))

                {

                ?>

				<?php

                if ($sid != 0){

                $ppllnnkk = $web_url_1.rpd($M_slug)."/".rpd($S_slug)."/detail/".$rsp['part'];

                }else{

                $ppllnnkk = $web_url_1.rpd($M_slug)."/detail/".$rsp['part'];	

                }

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

						<div class="dpe_basket"> <a href="<?=$ppllnnkk?>" class="btn sub">View Detail </a> 

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

						<div class="p_basket"> <a href="<?=$ppllnnkk?>" class="vew">View Detail </a> 

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

                <div class="content_text" style="text-align:center;">Coming Soon.....!</div>

                <?php

                }

                ?>

				</div>

					<div class="content_head1"><span class="" style="line-height:19px;">

			<?php

                $tlt = $rs_n;

                $next = " Next";

                $back = " Back";

                $first = " First";

                $last = " Last ";

                $tlt_rec = $tlt; 

                $tlt_pages = ceil($tlt_rec / $perpage);

                $page = $cur_page;

                if ($page <= $tlt_pages)

                {

                if ($page <= 3)

                {

                $strt = 1;

                }else{

                $strt = ceil($page/3);

                if ($page % 3)

                {

                $strt = $strt * 3;

                }else{

                $strt = ($strt + 1) * 3;

                }

                $strt = ($strt - 6) + 1;

                }

                $endd = ($strt - 1) + 6;

                if ($endd > $tlt_pages)

                {

                $endd = $tlt_pages;

                }

                $m = $strt;

                if ($page > 1)

                {

                $p = $page -1;

                $f = 1;

                }else{

                $p = 1;

                $f = 1;

                }

                if ($page > 1)

                {

                if ($sid != 0){

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/".rpd($C_slug)."/page/".$f."' class = 'paging'>".$first."</a>  ";

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/".rpd($C_slug)."/page/".$p."' class = 'paging'>".$back."</a>  ";

                }elseif ($sid != 0){

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/page/".$f."' class = 'paging'>".$first."</a>  ";

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/page/".$p."' class = 'paging'>".$back."</a>  ";

                }else{

                echo "<a href='".$web_url_1.rpd($M_slug)."/page/".$f."' class = 'paging'>".$first."</a>  ";

                echo "<a href='".$web_url_1.rpd($M_slug)."/page/".$p."' class = 'paging'>".$back."</a>  ";	

                }

                }else{

                

                }

                

                

                while ($m <= $endd)

                {

                if ($m == $page)

                {

                if ($cid != 0){

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/".rpd($C_slug)."/page/".$m."' class = 'paging_act'><strong>" .$m. "</strong></a>  ";

                }elseif ($sid != 0){

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/page/".$m."' class = 'paging_act'><strong>" .$m. "</strong></a>  ";

                }else{

                echo "<a href='".$web_url_1.rpd($M_slug)."/page/".$m."' class = 'paging_act'><strong>" .$m. "</strong></a>  ";	

                }

                }else{

                if ($cid != 0){

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/".rpd($C_slug)."/page/".$m."' class = 'paging'>".$m."</a>  ";

                }elseif ($sid != 0){

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/page/".$m."' class = 'paging'>".$m."</a>  ";

                }else{

                echo "<a href='".$web_url_1.rpd($M_slug)."/page/".$m."' class = 'paging'>".$m."</a>  ";	

                }

                }

                $m = $m + 1;

                }

                if ($page < $tlt_pages)

                {

                $n = $page + 1;

                $l = $tlt_pages;

                }else{

                $p = $tlt_pages;

                $f = $tlt_pages;

                }

                if ($endd < $tlt_pages)

                {

                if ($sid != 0){

                echo " ... <a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/".rpd($C_slug)."/page/".$l."' class = 'paging'><strong>".$tlt_pages."</strong></a> ";

                }elseif ($sid != 0){

                echo " ... <a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/page/".$l."' class = 'paging'><strong>".$tlt_pages."</strong></a> ";

                }else{

                echo " ... <a href='".$web_url_1.rpd($M_slug)."/page/".$l."' class = 'paging'><strong>".$tlt_pages."</strong></a> ";	

                }

                }

                if ($page < $tlt_pages)

                {

                if ($sid != 0){

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/".rpd($C_slug)."/page/".$n."' class = 'paging'>".$next."</a>";

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/".rpd($C_slug)."/page/".$l."' class = 'paging'>".$last."</a>";

                }elseif ($sid != 0){

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/page/".$n."' class = 'paging'>".$next."</a>";

                echo "<a href='".$web_url_1.rpd($M_slug)."/".rpd($S_slug)."/page/".$l."' class = 'paging'>".$last."</a>";

                }else{

                echo "<a href='".$web_url_1.rpd($M_slug)."/page/".$n."' class = 'paging'>".$next."</a>";

                echo "<a href='".$web_url_1.rpd($M_slug)."/page/".$l."' class = 'paging'>".$last."</a>";	

                }

                }else{

                

                }

                }

                ?>

                </span></div>

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