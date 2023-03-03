<div class="col-md-3">
                <div class="left_head"> Our Categories</div>	
            <div id="masterdiv" style="margin-bottom:25px; float:left; width:100%;">
                <?php
    $ssow = "";
    $mlink = "";
    $a = 1;
    $QRY = qry_run("select * from ms_main where pshow = 'Yes' order by ranking");
    if (num_rec($QRY) > 0)
    {
    $p = 1;
    while($rs = fetch_rec($QRY))
    {
    $loc = "main";
    $QRYs = qry_run("select * from ms_section where mainid = ".$rs['mainid']." order by ranking");
    if (num_rec($QRYs) > 0)
    {
    $ssow = "Yes";
    }else{
    $ssow = "No";
    }
    
    if ($ssow == "Yes")
    {
    ?>
    <div class="menutitle" onclick="SwitchMenu('sub<?=$a?>');" style="cursor:pointer">
	<?php
    }
    ?>
    <div class="left_menu_main">
    <a href="<?php if ($ssow == "Yes"){ ?>#1<?php }else{?><?=$web_url_1?><?=rpd($rs['plink'])?><?php }?>" title="<?=$rs['pname']?>" ><?=$rs['pname']?></a>
    </div>
	<?php
    if ($ssow == "Yes")
    {
    ?>
    </div>
	<?php
    }
    ?>
    <?php
    if ($ssow == "Yes")
    {
    $QRYs = qry_run("select * from ms_section where mainid = ".$rs['mainid']." order by ranking");
    if (num_rec($QRYs) > 0)
    {
    ?>
    <span class="submenu" id="sub<?=$a?>" >
    <?php
    while ($rss = fetch_rec($QRYs))
    {
    ?>
    <div class="left_sub_menu">
    <a href="<?=$web_url_1?><?=rpd($rs['plink'])?>/<?=rpd($rss['plink'])?>" title="<?=$rss['pname']?>" ><i class="fa fa-angle-right" aria-hidden="true"></i> &nbsp; <?=$rss['pname']?></a>
    </div>
    
    <?php
    $QRYpp = qry_run("select * from ms_cat where mainid = ".$rs['mainid']." AND secid = ".$rss['secid']." order by ranking");
    if (num_rec($QRYpp) > 0)
    {
	while ($rsp = fetch_rec($QRYpp))
    {
	?>
    <div class="left_sub_menu_sub">
    	<a href="<?=$web_url_1?><?=rpd($rs['plink'])?>/<?=rpd($rss['plink'])?>/<?=rpd($rsp['plink'])?>"><i class="fa fa-angle-double-right"></i> <?=$rsp['pname']?></a>
    </div>
    <?php
	}
	}
	?>
    
    <?php
    }
    ?>
    </span>
    <?php
    }
    $a = $a + 1;
    }
    }
    }
    ?>
                </div>
        
        </div>