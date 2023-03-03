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
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php if ($sid != 0){ ?><?=$S_phead?><?php }else{?><?=$phead?><?php }?> | <?=$web_title?></title>
<meta name="keywords" content="<?=$M_keywords?>">
<meta name="description" content="<?=$M_desc?>">
	<link rel="icon" href="<?=$web_url_1?>images/favicon.png" type="image/x-icon" />
<!-- Bootstrap CSS -->
<link href="<?=$web_url_1?>css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link rel="stylesheet" id="vgwc-style-carousel-css" href="<?=$web_url_1?>css/style2.css" type="text/css" media="all">
<link href="<?=$web_url_1?>css/main.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
<!-- Website Font style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href="<?=$web_url_1?>css/top.css" rel="stylesheet">
<!-- Font Awesome CSS -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<link href="<?=$web_url_1?>css/hover.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="all" href="<?=$web_url_1?>css/stellarnav.css">
<link href="<?=$web_url_1?>css/set3.css" rel="stylesheet">
<?php include"_head.php";?>

<style type="text/css">

div.cloudzoom-zoom,div.cloudzoom-zoom-inside{
display: block !important;
}
div.cloudzoom-blank,div.cloudzoom-blank div.cloudzoom-lens{
display: none !important;
}
</style>
<script type="text/javascript">
		function subtractQty(){
			if(document.getElementById("qty").value - 1 < 0)
				return;
			else
				 document.getElementById("qty").value--;
		}
</script>
</head>

<body>
<?php include"include/header.php";?>
<?php include"include/sub_banner.php";?>
<div class="breadcrum-links">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>
                        <a href="#">Home /</a> 
                    </li>
                    <li>
                        <a href="#">Our Products</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clrfxd"></div>
<div class="full">
<div class="container-fluid">
	<div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12 pad-l">
		<div class="row">
         <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 pad-r pad-l" style="margin-top: 20px;">
                    <div class="i_box">
                    	<div class="i_img">
                    		<img class = "cloudzoom img-responsive" src = "<?=$web_url_1?>items/products/<?=$P_rs['img3']?>" data-cloudzoom = "zoomImage: '<?=$web_url_1?>items/products/<?=$P_rs['img3']?>', zoomPosition: 'inside', autoInside: true" >
                        </div>
                    </div>
					<div class="">
                    	<div class="col-md-2 col-sm-2 col-xs-4 bd thumbnail1" style="padding:10px;">
                        	<img style="max-height:80px; cursor:pointer;" src = "<?=$web_url_1?>items/products/<?=$P_rs['img1']?>" class = 'cloudzoom-gallery img-responsive' data-cloudzoom = "useZoom: '.cloudzoom', image: '<?=$web_url_1?>items/products/<?=$P_rs['img2']?>', zoomImage: '<?=$web_url_1?>items/products/<?=$P_rs['img3']?>' " >
                        </div>
						<?php 
                        $sqlss = "Select * from ms_more where pshow = 'Yes' AND pid = ".$pid." order by ranking";
                        $queryss = qry_run($sqlss);
                        $rs_num = num_rec($queryss);
                        if ($rs_num > 0)
                        {
                        while ($rsm = fetch_rec($queryss))
                        {
                        ?>
                        <div class="col-md-2 col-sm-2 col-xs-4 bd" style="padding:10px;">
                        	<img style="max-height:80px; cursor:pointer;" src = "<?=$web_url_1?>items/products/<?=$rsm['img3']?>" class = 'cloudzoom-gallery img-responsive' data-cloudzoom = "useZoom: '.cloudzoom', image: '<?=$web_url_1?>items/products/<?=$rsm['img3']?>', zoomImage: '<?=$web_url_1?>items/products/<?=$rsm['img3']?>' " >
                        </div>
                        <?php
						}
						}
						?>
                    </div>
                </div>
				
		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 form0class">
                <form action="<?=$web_url_1?>addtocart.php" method="post" name="frm_cart" id="frm_cart">
                <div class="d_name"><?=$P_rs['pname']?></div>
                <div class="d_art">Article NO : <?=$P_rs['part']?></div>
                <div class="d_desc">Description:</div>
                <div class="d_detail"><?=$P_rs['pdetail']?></div>
                <?php
                $QRYo = qry_run("select * from ms_options where pshow = 'Yes' order by ranking");
                if (num_rec($QRYo) > 0)
                {
                $op = 1;
                while($rso = fetch_rec($QRYo))
                {
                $QRYp = qry_run("select * from ms_prod_opt where opt_id = ".$rso['mainid']." AND pid = ".$pid." order by sid ASC");
                if (num_rec($QRYp) > 0)
                {
                ?>
                <div class="col-md-12 col-sm-12 col-xs-12 opt pad-l"><h5><?=$rso['pname']?>:</h5>
                <select name="opt<?=$op?>" id="opt<?=$rso['mainid']?>" class="form-control">
                <?php
                while($rsp = fetch_rec($QRYp))
                {
                ?>
                <option value="Please Select Option">
                <?=$rsp['pname']?>
                </option>
                <?php
                }
                ?>
                </select>
            </div>
                <?php
                $op = $op + 1;
                }
                }
                }
                ?>
                                       
                <div class="d_qty"><span>Quantity: </span>
				<input name="qty"  id="qty" class="form-control qty" value="50"  /> 
				</div>
                <input type="submit"  class="btn btn-default sub pidds"  value="Add To Cart">
                <input type="hidden" name="sub_mit" value="Yes">
                <input type="hidden" name="live" value="<?=$mid?>_<?=$sid?>_<?=$cid?>_<?=$P_rs['pid']?>" />				
				 <?php
                    if ($sid != 0){
                    ?>
                    <input type="hidden" name="ppllnnkk" value="<?=$web_url_1.rpd($M_head)."/".rpd($S_head);?>">
					<input type="hidden" name="cont" value="<?=$web_url_1.rpd($M_slug)."/".rpd($S_slug);?>">
                    <?php }else{ ?>
                    <input type="hidden" name="ppllnnkk" value="<?=$web_url_1.rpd($M_head);?>">
					<input type="hidden" name="cont" value="<?=$web_url_1.rpd($M_slug)?>">
                    <?php } ?>
                </form>
                </div>				
               </div>
				</div>
             </div>
          <div class="clrfxd"></div>

           <section class="relatedProductSection">
                  <div class="row">
           <div class="col-md-12 col-xs-12">
                <div class="heading">
                  <center>
                     <h1>Related Products</h1>
                  </center>                     
                </div>
            </div> 
        </div>
                <div class="container-fluid">
                <div class="row">
                <?php 
                $sql = "Select * from ms_prods where pshow = 'Yes' AND mainid = ".$mid." AND secid = ".$sid." AND catid = ".$cid." AND pid <> ".$pid." order by rand() limit 4";

                $query = qry_run($sql);

                $rs_num = num_rec($query);

                if ($rs_num > 0)

                {

                while ($rsp = fetch_rec($query))

                {
                ?>

                <?php

                if ($cid != 0){

                $ppllnnkk = $web_url_1.rpd($M_slug)."/".rpd($S_slug)."/".rpd($C_slug)."/detail/".$rsp['part'];

                }elseif ($sid != 0){

                $ppllnnkk = $web_url_1.rpd($M_slug)."/".rpd($S_slug)."/detail/".$rsp['part'];

                }else{

                $ppllnnkk = $web_url_1.rpd($M_slug)."/detail/".$rsp['part'];    

                }

                ?>

                  <div class="col-md-3">
                      <div class="product">
                    <div class="box15">
                    <img src="<?=$web_url_1?>items/products/<?=$rsp['img1']?>" alt="<?=$rsp['pname']?>">

                    <div class="product-hover">
                     <a href="<?=$lnk5555?>"><i class="fa fa-search"></i></a>
                     <form action="<?=$web_url_1?>addtocart.php" method="post" name="frm_cart" id="frm_cart">
                 <button> <i class="fa fa-shopping-bag"></i> Add To Cart</button>  
                 <input  type="hidden" name="qty"  id="qty" class="form-control qty" value="1"  />                
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
                   </form>
                                
                        </div>
                    </div>
                     <div class="caption">
                        <?=$rsp['pname']?>
                         <a href="<?=$lnk5555?>">
                          Art No:   <?=$rsp['part']?>                                
                           </a>
                       </div> 
                     </div>
                   </div>
                <?php }}?>
           </div>
        </div>
    </section>
    </div>
    </div>
<?php
include"include/footer.php";
include"include/scripts.php";
?>
<script type="text/javascript" src="<?=$web_url_1?>js/cloudzoom.js"></script>
<script>
	CloudZoom.quickStart();
</script>
<script type="text/javascript">

    $(document).ready(function(){
    
    $('ul.tabs li').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('ul.tabs li').removeClass('current');
        $('.tab-content').removeClass('current');

        $(this).addClass('current');
        $("#"+tab_id).addClass('current');
    })

})
</script>

<?php include"include/footer-end.php"; ?>
<?php
}else{
	header("Location: close.php");
	die;
}
?>