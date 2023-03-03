<!--Banner Start-->
<div class="banner">




<!--start-->
  <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%;height:100%;margin:0 auto;">
        <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
            <ul class="amazingslider-slides" style="display:none;">
            <?php
$QRY = qry_run("select * from ms_pictures where pshow = 'Yes' AND mainid = '2' order by ranking");
if (num_rec($QRY) > 0)
{
$n = 0;
while($rs = fetch_rec($QRY))
{
$n++;
?>
                <li><a href="<?=$rs['plink']?>"><img src="<?=$web_url_1?>items/gallery/<?=$rs['img1']?>" class="center-block" alt=" "  title="" /></a>
                </li>
                <?php
}
}
?>
            </ul>
            
        </div>
    </div>
<!--end-->

</div>

<!--Banner End-->