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

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inquiry Basket | <?=$web_title?></title>
<meta name="keywords" content="<?=$keywords_common?>">
<meta name="description" content="<?=$description_common?>">
<meta 
     name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
/>
<?php include"_head.php";?>
<body>
<?php include"include/header.php";?>


<div class="pag-main">
<div class="container-fluid">
	<div class="">
    	<?php /*?><?php include"include/left.php";?><?php */?>
         <div class="col-md-12 prds-inner-bg">
		<div class="col-md-12 col-sm-12 col-xs-12 heading">Inquiry Basket</div>
            	<div class="in-div">
				<div class="brds_text">
            	
<ul class="breadcrumb">
                        <li> <a href="<?=$web_url_1?>home">Home </a></li>
                        <li>Inquiry Basket &nbsp;</li>
                       
                        
                      </ul>
                </div>
              
        	<div class="content_head"></div></div>
            <div class="content_text">
            <?php
            $CRT = qry_run("Select * from ms_cart where sid = '".$sessionid."' order by mainid");
            if (num_rec($CRT) > 0)
            {
            ?>
            <div class="col-md-12" style="background:#d4d4d4; padding:10px 0; color:#000;">
            <div class="col-md-2">
            <div class="basket_heading">Product Detail</div>
            </div>
            <div class="col-md-6">
            <div class="basket_heading"></div>
            </div>
            <div class="col-md-2">
            <div class="basket_heading">Quantity</div>
            </div>
            <div class="col-md-2">
            <div class="basket_heading">Delete</div>
            </div>
            </div>
            <?php
            $live = 0;
            $tlt_qty = 0;
            $tlt_sub = 0;
            while($rct = fetch_rec($CRT))
            {
            ?>
            <div class="row">
            <div class="col-md-2">
            <div class="basket_img" style="margin-top:20px;"><img src="<?=$web_url_1?>items/products/<?=$rct['img1']?>" class="img-responsive"></div>
            </div>
            <div class="col-md-6">
            <div class="basket_name" style="margin-top:20px;"><?=$rct['pname']?></div>
            <div class="basket_art"><?=$rct['pcode']?></div>
            <div class="basket_art"><?=$rct['opt']?></div>
            </div>
            <div class="col-md-2">
            <form name="frm_basket_update" method="post" action="<?=$web_url_1?>update_basket.php">
            <input type="hidden" name="sub_mit" value="Yes">
            <input type="hidden" name="mmid" value="<?=$rct['mainid']?>">
            <input type="hidden" name="pmid" value="<?=$rct['pid']?>">
            <div class="basket_name" style="margin-top: 20px;"><input name="qty" type="text" class="txt_id" id="qty2" value="<?=$rct['qty']?>" size="6" style="text-align:center; color:#000;"></div>
            <div class="basket_art" style="margin-top: 20px;"><input name="Submit" type="submit" class="butn-hvr"  value="Update"></div>
            </form>
            </div>
            <div class="col-md-2">
            <div class="basket_name" style="margin-top: 20px;"><a href="<?=$web_url_1?>del_item.php?cid=<?=$rct['mainid']?>" class="butn-hvr" onClick="javascript:return confirm('Do you want to delete this item?');" >Delete</a></div>
            </div>
            </div>
            <?php
            $live = $rct['live'];
            $tlt_qty = $tlt_qty + $rct['qty'];
            $tlt_sub = $tlt_sub + ($rct['prate']*$rct['qty']);
            }
            ?>
            <div class="row" style="margin-top:20px;">
            <div class="col-md-9"></div>
			<?php 
			$CRTs = qry_run("Select * from ms_cart where sid = '".$sessionid."' order by mainid");

            if (num_rec($CRTs) > 0)

            {

			$rsss = fetch_rec($CRTs);
			$link = $rsss['contlink'];
			}
			?>
            <div class="col-md-6"><a href="<?=$link?>" class="butn-hvr"  >Continue Browsing</a> <a href="<?=$web_url_1?>quote-request"  class="butn-hvr" >Send Inquiry</a></div>
            </div>
            <?php 
            }else{
            ?>
            <div class="content_text" style="text-align:center;">Empty Inquiry Basket......!</div>
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