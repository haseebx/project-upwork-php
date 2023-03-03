<?php
// include"ms-panel/common/func.php";
include"ms-panel/common/param.php";
// include"live.php";
// $SET = qry_run("select * from ms_webs");
// $rs = fetch_rec($SET);
if($rs['website'] == "Yes"){
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta 
     name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
/>
<title><?=$web_title?></title>
<meta name="keywords" content="<?=$web_name;?>">
<meta name="description" content="<?=$web_name;?>">
<link rel="stylesheet" href="<?=$web_url_1?>css/effect.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link href='<?=$web_url_1?>lightbox/simplelightbox.css' rel='stylesheet' type='text/css'>
<?php include"_head.php";?>

<body>
<?php include"include/header.php";?>

<?php include"include/banner.php";?>

                      <!--------------Category Section------------->
<section class="categorySection">
  <div class="container-fluid">
        <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="cate-heading">
                <center><img src="images/pH.png"></center>
            </div>
        </div>
       </div>


                  <!---------------First Main Category------------>

    <div class="row">
                         <?php
                            // $query = qry_run("Select * from ms_main where pshow = 'Yes' and mainid = '1' order by ranking ");
                            if (num_rec($query) > 0){
                            while($rs = fetch_rec($query)){
                            ?>
                            <?php
                            $qryy1 = qry_run("select * from ms_main where mainid='".$rs['mainid']."'");
                            $roww1 = fetch_rec($qryy1);
                            $mmname1 = $roww1['plink'];
                            $qryy2 = qry_run("select * from ms_section where  mainid='".$rs['mainid']."'");
                            $roww2 = fetch_rec($qryy2);
                            $ssname2 = $roww2['plink'];
                            if ($ssname2 != ''){
                            $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2);
                            }else{
                            $lnk5555 = $web_url_1.rpd($mmname1);
                            }
                            ?>
        <div class="col-md-3">
            <div class="main-category">
                      <div class="hovereffect2">
                       <img class="img-responsive" src="<?=$web_url_1?>items/category/<?=$rs['img1']?>">
                       <div class="overlay">
                       <h2><?=$rs['pname']?></h2>
                       <a class="info" href="<?=$roww1['plink']?>">Click Here</a>
                       </div>
                       </div>           
             </div>
        </div>
            <?php }}?> 
                      <!-------------First Sub Category row ------------>

        <div class="col-md-9">
            <div class="row">
                
                 <?php
                $query = qry_run("Select * from ms_section where pshow = 'Yes' and mainid = '1' order by ranking limit 6");
                if (num_rec($query) > 0){
                while($rs = fetch_rec($query)){
                $qryy1 = qry_run("Select * from ms_main where pshow = 'Yes' and mainid = '1' order by ranking");
                $roww1 = fetch_rec($qryy1);
                $mmname1 = $roww1['plink'];
                $qryy2 = qry_run("select * from ms_section where  secid='".$rs['secid']."'");
                $roww2 = fetch_rec($qryy2);
                $ssname2 = $roww2['plink'];
                $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2);
                ?>
                <div class="col-md-4">
                    <div class="category">
                       <div class="hovereffect">
                       <img class="img-responsive" src="<?=$web_url_1?>items/subcategory/<?=$rs['img1']?>" alt="Image Not Available">
                       <div class="overlay">
                       <h2><?=$rs['pname']?></h2>
                       <a class="info" href="<?=$lnk5555?>">Click Here</a>
                       </div>
                       </div>                       
                   </div>
                </div>              
                <?php }}?>
            </div>
                     

        </div>
    </div>
</div>
                      <!--------------2nd sub category row ----------->

<div class="container-fluid" id="top-margin-cate"> 
     <div class="row">
        <div class="col-md-9">
          <div class="row">
                 <?php
                $query = qry_run("Select * from ms_section where pshow = 'Yes' and mainid = '10' order by ranking limit 6");
                if (num_rec($query) > 0){
                while($rs = fetch_rec($query)){
                $qryy1 = qry_run("Select * from ms_main where pshow = 'Yes' and mainid = '10' order by ranking");
                $roww1 = fetch_rec($qryy1);
                $mmname1 = $roww1['plink'];
                $qryy2 = qry_run("select * from ms_section where  secid='".$rs['secid']."'");
                $roww2 = fetch_rec($qryy2);
                $ssname2 = $roww2['plink'];
                $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2);
                ?>
                <div class="col-md-4">
                    <div class="category">
                       <div class="hovereffect">
                       <img class="img-responsive" src="<?=$web_url_1?>items/subcategory/<?=$rs['img1']?>" alt="Image Not Available">
                       <div class="overlay">
                       <h2><?=$rs['pname']?></h2>
                       <a class="info" href="<?=$lnk5555?>">Click Here</a>
                       </div>
                       </div>                       
                   </div>
                </div>              
                <?php }}?>
            </div>

                           
            
        </div>
                    <!-----------2nd main category------------>
          <?php
                $query = qry_run("Select * from ms_main where pshow = 'Yes' and mainid = '10' order by ranking ");
                if (num_rec($query) > 0){
                while($rs = fetch_rec($query)){
                $qryy1 = qry_run("select * from ms_main where mainid='".$rs['mainid']."'");
                $roww1 = fetch_rec($qryy1);
                $mmname1 = $roww1['plink'];
                $qryy2 = qry_run("select * from ms_section where  mainid='".$rs['mainid']."'");
                $roww2 = fetch_rec($qryy2);
                $ssname2 = $roww2['plink'];
                $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2);
                ?>
        <div class="col-md-3">
            <div class="main-category">
                      <div class="hovereffect2">
                       <img class="img-responsive" src="<?=$web_url_1?>items/category/<?=$rs['img1']?>" alt="">
                       <div class="overlay">
                       <h2><?=$rs['pname']?></h2>
                       <a class="info" href="<?=$lnk5555?>">Click Here</a>
                       </div>
                       </div>           
             </div>
        </div>
            <?php }}?>
    </div>
</div>
                  <!------------3rd Main Category------------->

<div class="container-fluid" id="top-margin-cate">    
     <div class="row">
          <?php
                $query = qry_run("Select * from ms_main where pshow = 'Yes' and mainid = '7' order by ranking ");
                if (num_rec($query) > 0){
                while($rs = fetch_rec($query)){
                $qryy1 = qry_run("Select * from ms_main where pshow = 'Yes' and mainid = '7' order by ranking");
                $roww1 = fetch_rec($qryy1);
                $mmname1 = $roww1['plink'];
                $qryy2 = qry_run("select * from ms_section where  mainid='".$rs['mainid']."'");
                $roww2 = fetch_rec($qryy2);
                $ssname2 = $roww2['plink'];
                $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2);
                ?>
        <div class="col-md-3">
            <div class="main-category">
                      <div class="hovereffect2">
                       <img class="img-responsive" src="<?=$web_url_1?>items/category/<?=$rs['img1']?>" alt="">
                       <div class="overlay">
                       <h2><?=$rs['pname']?></h2>
                       <a class="info" href="<?=$lnk5555?>">Click Here</a>
                       </div>
                       </div>           
             </div>
        </div>
            <?php }}?>
            <!--------------3rd sub category row ----------->
        <div class="col-md-9">
            <div class="row">
                 <?php
                $query = qry_run("Select * from ms_section where pshow = 'Yes' and mainid = '7' order by ranking limit 6");
                if (num_rec($query) > 0){
                while($rs = fetch_rec($query)){
                $qryy1 = qry_run("Select * from ms_main where pshow = 'Yes' and mainid = '7' order by ranking");
                $roww1 = fetch_rec($qryy1);
                $mmname1 = $roww1['plink'];
                $qryy2 = qry_run("select * from ms_section where  secid='".$rs['secid']."'");
                $roww2 = fetch_rec($qryy2);
                $ssname2 = $roww2['plink'];
                $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2);
                ?>
                <div class="col-md-4">
                    <div class="category">
                       <div class="hovereffect">
                       <img class="img-responsive" src="<?=$web_url_1?>items/subcategory/<?=$rs['img1']?>" alt="Image Not Available">
                       <div class="overlay">
                       <h2><?=$rs['pname']?></h2>
                       <a class="info" href="<?=$lnk5555?>">Click Here</a>
                       </div>
                       </div>                       
                   </div>
                </div>              
                <?php }}?>
            </div>
         
        </div>
    </div>
    </div>
</section>
<div class="space"></div>


                    <!-----About Section------------>

<section class="aboutSection">
    <div class="container-fluid pdm-off">
        <div class="row">
           <div class=" col-md-12 col-xs-12">
                           <?php
                            $QRY = qry_run("select * from ms_contents where pshow = 'Yes' and mainid = '3'");
                            if (num_rec($QRY) > 0)
                            {
                            while($rs = fetch_rec($QRY))
                            {
                            ?>
                <div class="about">
                <p><?=$rs['pdetail']; ?></p>
                 </div>
                       <?php } } ?>
           </div>
        </div>
    </div>
</section>
                   <!------------Feature Section--------->

<section class="featureSection" style="background-color: transparent;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="feature-Heading">
                    <center>                   
                     <img src="<?=$web_url_1?>images/fH.png">
                   </center>
                </div>
            </div>
        </div>
    <div class="row">
     <div class="products-wrapper">
           <div class="slidee2">
         <?php
                $query = qry_run("Select * from ms_prods where pshow = 'Yes' AND feature = 'Yes' order by ranking ");
                if (num_rec($query) > 0){
                while ($rsp = fetch_rec($query)){
                $qryy1 = qry_run("select * from ms_main where mainid='".$rsp['mainid']."'");
                $roww1 = fetch_rec($qryy1);
                $mmname1 = $roww1['plink'];
                $qryy2 = qry_run("select * from ms_section where secid='".$rsp['secid']."' and mainid='".$rsp['mainid']."'");
                $roww2 = fetch_rec($qryy2);
                $ssname2 = $roww2['plink'];
                $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2)."/detail/".$rsp['part'];
                ?>
                
                
                <div class="col-md-2 col-xs-12">
      <a href="<?=$lnk5555?>">
    <div class="tc-image-effect5">
    <div class="height1">
   

<a href="<?=$lnk5555?>"><img src="<?=$web_url_1?>items/products/<?=$rsp['img1']?>" />
  <div class="text">
  <p><?=$rsp['pname']?><br>ART #: <?=$rsp['part']?></p>

  </div>
  <div class="caption">   <h3><?=$rsp['pname']?></h3>

 
  <p> ART #: <?=$rsp['part']?></p>
  </div> 
  </div>  
  </div>
  </a>
  </div>
  
               
         <?php }}?>
</div>
     </div>
  </div>
  </div>            
</section>
<div class="space"></div>

<?php
include"include/footer.php";
include"include/scripts.php";
?>


 <script src="<?=$web_url_1?>sliderengine/amazingslider.js"></script>
   <script type="text/javascript" src="<?=$web_url_1?>js/jquery.flexisel.js"></script>
 <script src="<?=$web_url_1?>sliderengine/initslider-1.js"></script>
 <script src="<?=$web_url_1?>slick/sliding-all.js"></script>
<script src="<?=$web_url_1?>slick/slick.min.js"></script>


<script>
    $(function(){
        var $gallery = $('.gallery a').simpleLightbox();

        $gallery.on('show.simplelightbox', function(){
            console.log('Requested for showing');
        })
        .on('shown.simplelightbox', function(){
            console.log('Shown');
        })
        .on('close.simplelightbox', function(){
            console.log('Requested for closing');
        })
        .on('closed.simplelightbox', function(){
            console.log('Closed');
        })
        .on('change.simplelightbox', function(){
            console.log('Requested for change');
        })
        .on('next.simplelightbox', function(){
            console.log('Requested for next');
        })
        .on('prev.simplelightbox', function(){
            console.log('Requested for prev');
        })
        .on('nextImageLoaded.simplelightbox', function(){
            console.log('Next image loaded');
        })
        .on('prevImageLoaded.simplelightbox', function(){
            console.log('Prev image loaded');
        })
        .on('changed.simplelightbox', function(){
            console.log('Image changed');
        })
        .on('nextDone.simplelightbox', function(){
            console.log('Image changed to next');
        })
        .on('prevDone.simplelightbox', function(){
            console.log('Image changed to prev');
        })
        .on('error.simplelightbox', function(e){
            console.log('No image found, go to the next/prev');
            console.log(e);
        });
    });
</script>
<?php
}else{
	header("Location: close.php");
	die;
}
?>