<?php  
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
include "../assets/include/head.php";
include "../assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
            	<small>Categories</small>
            </h1>
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
							<?php 
                            $cate = ""; 
                            $RNK = qry_run("select * from ms_main where mainid = ".ch_lvl('mid')." order by ranking");
                            if (num_rec($RNK) > 0) 
                            { 
                            $rk = fetch_rec($RNK); 
                            $cate = $rk['pname']; 
                            } 
                            $section = ""; 
                            $RNK = qry_run("select * from ms_section where secid = ".ch_lvl('sec')." order by ranking");
                            if (num_rec($RNK) > 0) 
                            { 
                            $rk = fetch_rec($RNK); 
                            $section = $rk['pname']; 
                            } 
                            $category = ""; 
                            $RNK = qry_run("select * from ms_cat where catid = ".ch_lvl('cat')." order by ranking");
                            if (num_rec($RNK) > 0) 
                            { 
                            $rk = fetch_rec($RNK); 
                            $category = $rk['pname']; 
                            } 
                            ?>
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Categories | <?php if (ch_lvl('mid') != 0){ ?><?=$cate?></a><?php }?><?php if (ch_lvl('sec') != 0){ ?> | <?=$section?></a><?php }?><?php if (ch_lvl('cat') != 0){ ?> | <?=$category?></a><?php }?></h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                        <form action="cat_prcess.php" method="post" enctype="multipart/form-data" name="frm_add" onSubmit="javascript:return chk_form();">
                                        <input type="hidden" name="sub_mit" value="Y">
                                        <input type="hidden" name="LVL" value="4">
                                        <input type="hidden" name="C_TYPE" value="EDIT">
                                        <input type="hidden" name="mid" value="<?=ch_lvl('mid')?>">
                                        <input type="hidden" name="sec" value="<?=ch_lvl('sec')?>">
                                        <input type="hidden" name="cat" value="<?=ch_lvl('cat')?>">
                                        <input type="hidden" name="pid" value="<?=ch_lvl('pid')?>">
										<?php
                                        $QRY = qry_run("select * from ms_prods WHERE mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." AND pid = ".ch_lvl('pid')."");
                                        if (num_rec($QRY) > 0)
                                        {
                                        $rs = fetch_rec($QRY);
                                        
                                        ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <input type="text" class="form-control" name="pname" placeholder="Product Name" value="<?=stp($rs['pname'])?>">
                                                <input name="pcode" type="hidden" class="txt_id" id="pcode" size="41" maxlength="50" value="<?=stp($rs['pcode'])?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Code/SKU</label>
                                                <input type="text" class="form-control" name="part" placeholder="Product Code/SKU" value="<?=stp($rs['part'])?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Slug</label>
                                                <input type="text" class="form-control" name="sdetail" placeholder="Slug" value="<?=stp($rs['sdetail'])?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                        	<div class="form-group">
                                                <label for="exampleInputEmail1">Manage Attributes</label>
                                            </div>
                                            
											<?php
                                            $QRYs = qry_run("select * from ms_options where pshow = 'Yes' order by ranking");
                                            if (num_rec($QRYs) > 0)
                                            {
                                            $p = 1;
                                            while($rss = fetch_rec($QRYs))
                                            {
                                            ?>
                                            <ol class="breadcrumb">
                                            	<li><strong><?=$rss['pname']?></strong></li>
                                            </ol>
                                            <div class="optionss">
												<?php
                                                $QRYo = qry_run("select * from ms_sub_opt where mainid = ".$rss['mainid']." order by ranking");
                                                if (num_rec($QRYo) > 0)
                                                {
                                                ?>
													<?php
                                                    while($rso = fetch_rec($QRYo))
                                                    {
                                                    $checked = "";
                                                    $prate = 0;
                                                    $ptype = "Plus";
                                                    $bg_color = "#FFFFFF";
                                                    $QRYp = qry_run("select * from ms_prod_opt where opt_id = ".$rss['mainid']." AND sub_opt_id = ".$rso['subid']." AND pid = ".ch_lvl('pid')."");
                                                    if (num_rec($QRYp) > 0)
                                                    {
                                                    $rsp = fetch_rec($QRYp);
                                                    $checked = " checked";
                                                    $bg_color = "#FaFaFa";
                                                    $prate = $rsp['prate'];
                                                    $ptype = $rsp['ptype'];
                                                    }
                                                    ?>
                                                    	<span><input type="checkbox" name="opt<?=$rss['mainid']?>[]" value="<?=$rso['subid']?>"<?=$checked?>> <?=stp($rso['pname'])?></span>
                                                    <?php
													}
													?>
                                                <?php
												}
												?>
                                            </div>
                                            <?php
                                            $p++;
											}
											}
											?>
                                            
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Complete Detail</label>
                                                <textarea class="ckeditor form-control" name="pdetail" rows="3" placeholder="Complete Detail"><?=stp($rs['pdetail'])?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Publish Product</label>
                                                <input name="pshow" type="checkbox" id="pshow2" value="Yes"<?php if ($rs['pshow'] == "Yes"){ ?> checked<?php }?>>&nbsp;&nbsp;&nbsp;
                                                <?php if ($Feature == "Yes"){ ?>
                                                <label for="exampleInputFile">Feature Product</label>
                                                <input name="feature" type="checkbox" id="pshow3" value="Yes"<?php if ($rs['feature'] == "Yes"){ ?> checked<?php }?>>&nbsp;&nbsp;&nbsp;
                                                <?php }?>
                                                <?php if ($Special == "Yes"){ ?>
                                                <label for="exampleInputFile">Special Product</label>
                                                <input name="special" type="checkbox" id="pshow4" value="Yes"<?php if ($rs['special'] == "Yes"){ ?> checked<?php }?>>&nbsp;&nbsp;&nbsp;
                                                <?php }?>
                                                <?php if ($Hot == "Yes"){ ?>
                                                <label for="exampleInputFile">What's New</label>
                                                <input name="new" type="checkbox" id="pshow5" value="Yes"<?php if ($rs['new'] == "Yes"){ ?> checked<?php }?>>&nbsp;&nbsp;&nbsp;
                                                <?php }?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            	<?php if ($auto_thumb == "No"){?>
                                                <label for="exampleInputFile">Product Image</label>
                                                <input type="file"  name="img2" id="img22">
                                                <p class="help-block">Please Insert Your Product Image.</p>
                                                <img src="<?=$web_url_1?>items/products/<?=$rs['img1']?>" class="img-responsive" />
                                                <?php }else{?>
                                                <label for="exampleInputFile">Product Image</label>
                                                <input type="file"  name="img2" id="img22">
                                                <p class="help-block">Please Insert Your Product Image.</p>
                                                <img src="<?=$web_url_1?>items/products/<?=$rs['img1']?>" class="img-responsive" />
                                                <?php }?>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                            <ol class="breadcrumb">
                                            	<li><strong>SEO Detail</strong></li>
                                            </ol>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Title</label>
                                                <input type="text" class="form-control" name="phead" placeholder="Title" value="<?=stp($rs['phead'])?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Alt Text</label>
                                                <input type="text" class="form-control" name="pmeta" placeholder="Alt Text" value="<?=stp($rs['pmeta'])?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Keywords</label>
                                                <input type="text" class="form-control" name="keywords" placeholder="Keywords" value="<?=stp($rs['keywords'])?>">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Description</label>
                                                <textarea class="form-control" name="description" rows="3" placeholder="Description"><?=stp($rs['description'])?></textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            	<button type="submit" class="btn btn-primary">Update</button> <a href="<?=$web_url?>/prods.php?mid=<?=$_REQUEST['../edit_process/mid']?>&amp;sec=<?=$_REQUEST['sec']?>&amp;cat=<?=$_REQUEST['cat']?>" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
<?php include "../assets/include/footer.php";?>