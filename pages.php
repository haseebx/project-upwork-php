<?php
include"ms-panel/common/func.php";
include"ms-panel/common/param.php";
include"live.php";
$P_phead = "";
$M_phead = "";
$P_pdetail = "";
$M_keywords = "";
$M_desc = "";
$P_img = "";
$QRY = qry_run("select * from ms_contents WHERE mainid = ".ch_f_int('id')."");
if (num_rec($QRY) > 0)
{
	$M_rs = fetch_rec($QRY);
	$P_phead = $M_rs['pname'];
	$P_pdetail = $M_rs['pdetail'];
	$M_phead = $M_rs['pname'];
	if ($M_rs['phead'] != "")
	{
		$M_phead = $M_rs['phead'];
	}
	$M_keywords = $M_rs['keywords'];
	$M_desc = $M_rs['description'];
	$P_img = $M_rs['img1'];
}
$SET = qry_run("select * from ms_webs");
$rs = fetch_rec($SET);
if($rs['website'] == "Yes"){
?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$P_phead?> | <?=$web_title?> </title>
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


<div class="pag-main">
<div class="container-fluid">
	<div class="">
    	<?php /*?><?php include"include/left.php";?><?php */?>
        <div class="col-md-12 prds-inner-bg">
		<div class="heading"><?=$P_phead?></div>
            	<div class="in-div">
				<div class="brds_text">
            	
<ul class="breadcrumb">
                        <li><a href="<?=$web_url_1?>home">Home </a></li>
                        <li><?=$P_phead?> &nbsp;</li>
                       
                        
                      </ul>
                </div>
              
        	</div>
        	
			<?php if (ch_f_int('id') != 2){ ?>
            <div class="content_text"><?=stp($P_pdetail)?></div>
            <?php }?>
            <?php if (ch_f_int('id') == 2){ ?>
            <div class="row">
            <div class="col-lg-6 col-md-7 col-sm-7">
            <div class="content_text"><?=stp($P_pdetail)?></div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-5">
            <?php if(isset($_REQUEST['ids']) && $_REQUEST['ids'] == 101){?>
            <div class="content_text" style="color:#090;">Thank You Your Request has been Submitted..</div>
            <?php }?>
            <?php if(isset($_REQUEST['ids']) && $_REQUEST['ids'] == 100){?>
            <div class="content_text" style="color:#F00;">Please Fill Requied Fiels</div>
            <?php }?>
            <form action="<?=$web_url_1?>submit_feedform.php" class="ctgs" method="post">
            <input type="text" name="pname" class="form-control cont-form" placeholder="Your Name"  required>
            <input type="text" name="compny" class="form-control cont-form" placeholder="Your Company Name" required>
            <input type="text" name="cell" class="form-control cont-form" placeholder="Your Cell Number" required>
            <input type="text" name="email" class="form-control cont-form" placeholder="Your Email" required>
            <textarea name="message" rows="3" class="form-control3" placeholder="Your Message" required></textarea>
            <input type="submit" value="Submit" class="butn-hvr" >
            </form>
            </div>
            </div>
            <?php }?>
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