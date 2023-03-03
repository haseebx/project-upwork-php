<?php  
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
include "../assets/include/head.php";
include "../assets/include/header.php";
if (ch('sub_mit') == "Yes")
{
    if (ch_lvl('pid') > 0)
    { 
        if (ch('M_act') == "Move") 
        { 
            $RANK = 0; 
            $CATID = preg_split ("/-/",ch('catid')); 
            
            $RNK = qry_run("select * from ms_prods where mainid = ".$CATID[0]." AND secid = ".$CATID[1]." AND catid = ".$CATID[2]." order by ranking DESC"); 
            if (num_rec($RNK) > 0) 
            { 
                $rsk = fetch_rec($RNK); 
                $RANK = $rsk['ranking']; 
            } 
            $RANK = $RANK + 1;
			
            $UPD = qry_run("Update ms_prods Set mainid = ".$CATID[0].",secid = ".$CATID[1].",catid = ".$CATID[2].",ranking=".$RANK." where pid = ".ch_lvl('pid').""); 
            ?> 
            <script language="JavaScript"> 
            <?php if (ch('stay') == "Yes"){?> 
            window.opener.location.reload(); 
            <?php }else{?> 
            window.opener.location='prods.php?mid=<?=$CATID[0]?>&sec=<?=$CATID[1]?>&cat=<?=$CATID[2]?>'; 
            <?php }?> 
            window.close(); 
            </script> 
            <?php 
        }else{ 
            $CATID = preg_split("/-/",ch('catid')); 
            $RNK = qry_run("select * from ms_prods where mainid = ".$CATID[0]." AND secid = ".$CATID[1]." AND catid = ".$CATID[2]." order by ranking DESC"); 
            if (num_rec($RNK) > 0) 
            { 
                $rsk = fetch_rec($RNK); 
                $RANK = $rsk['ranking']; 
            } 
            $RANK = $RANK + 1; 
            $PRD = qry_run("select * from ms_prods where pid = ".ch_lvl('pid')." order by ranking"); 
            if (num_rec($PRD) > 0) 
            { 
                $pd = fetch_rec($PRD); 
                $SQL = "Insert into ms_prods(mainid,secid,catid,pname,part,pcode,sdetail,pdetail,pshow,phead,keywords,description,prate,market_rate,stock,whole_sale_rate,ranking) Values(";
                $SQL = $SQL . "".$CATID[0].",".$CATID[1].",".$CATID[2].",'".$pd['pname']."','".$pd['part']."','".$pd['pcode']."','".$pd['sdetail']."','".$pd['pdetail']."','".$pd['pshow']."','".$pd['phead']."','".$pd['keywords']."','".$pd['description']."',".$pd['prate'].",".$pd['market_rate'].",".$pd['stock'].",".$pd['whole_sale_rate'].",".$RANK.")";
                $CPY = qry_run($SQL); 
                $last_id = mysqli_insert_id($db_con); 
                $pic1 = $pd['part']."_".$last_id."-pic-1."; 
                $pic2 = $pd['part']."_".$last_id."-pic-2."; 
                $pic3 = $pd['part']."_".$last_id."-pic-3."; 
                $img4 = $pd['img3']; 
                $Path = "../pictures/"; 
                if ($pd['img3'] != "") 
                { 
                    $img3 = cr_image($img4,800,'W',$ext,$pic3,$Path); 
                    $img2 = cr_image($img3,350,'W',$ext,$pic2,$Path); 
                    $img1 = cr_image($img3,150,'W',$ext,$pic1,$Path); 
                    $UPD = qry_run("Update ms_prods Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img3."' where pid = ".$last_id.""); 
                } 
                $OPT = qry_run("Select * from ms_prod_opt where pid = ".ch_lvl('pid')." order by sid"); 
                if (num_rec($OPT) > 0) 
                { 
                    while($rp = fetch_rec($OPT)) 
                    { 
                        $INST = qry_run("Insert into ms_prod_opt (pid,pname,prate,ptype,opt_id,sub_opt_id) Values (".$last_id.",'".$rp['pname']."',".$rp['prate'].",'".$rp['ptype']."',".$rp['opt_id'].",".$rp['sub_opt_id'].")");
                    } 
                } 
            } 
            ?> 
            <script language="JavaScript">
            <?php if (ch('stay') == "Yes"){?> 
            window.opener.location.reload(); 
            <?php }else{?> 
            window.opener.location='prods.php?mid=<?=$CATID[0]?>&sec=<?=$CATID[1]?>&cat=<?=$CATID[2]?>'; 
            <?php }?> 
            window.close(); 
            </script> 
            <?php 
        } 
    } 
} 
?>
<script language="JavaScript">
function goBack() {
    window.history.go(-1);
}
</script>
<div class="container-fluid">
	<div class="row text-center">
		<?php 
        $pname = ""; 
        $RNK = qry_run("select * from ms_prods where pid = ".ch_lvl('pid')." order by ranking"); 
        if (num_rec($RNK) > 0) 
        { 
        $rk = fetch_rec($RNK); 
        $pname = $rk['pname']; 
        $MID = $rk['mainid']; 
        $SID = $rk['secid']; 
        $CID = $rk['catid']; 
        }
        
        ?> 
    	<div class="col-md-12">
        	<button onclick="goBack()" class="btn btn-danger" style="margin-top:20px;">Go To Products Page</button>
        	<h1 class="page-header">
            	<small>Copy / Move <?=$pname?></small>
            </h1>
        </div>
        <form name="frm_move" method="post" action="move_prods.php"> 
        <input type="hidden" name="sub_mit" id="sub_mit" value="Yes"> 
        <input type="hidden" name="pid" id="pid" value="<?=ch_lvl('pid')?>">
        <div class="col-md-12">
        	<label>
            	<input type="checkbox" name="M_act" value="Move" checked> Move Product
            </label>
            <label>
            	<input type="checkbox" name="M_act" value="Copy"> Copy Product
            </label>
        </div>
        <div class="col-md-12">
            <select name="catid" id="catid" class="form-control">
				<?php 
                $CAT = qry_run("Select * from ms_main order by ranking"); 
                if (num_rec($CAT) > 0) 
                { 
                while($rs = fetch_rec($CAT)) 
                { 
                ?> 
                <?php 
                $SEC = qry_run("select * from ms_section where mainid = ".$rs['mainid']." order by ranking"); 
                if (num_rec($SEC) > 0) 
                { 
                while($rss = fetch_rec($SEC)) 
                { 
                
                ?> 
                <?php 
                $SUBC = qry_run("select * from ms_cat where mainid = ".$rs['mainid']." AND secid = ".$rss['secid']." order by ranking"); 
                if (num_rec($SUBC) > 0) 
                { 
                while($rsc = fetch_rec($SUBC)) 
                { 
                
                ?>
                <option value="<?=$rs['mainid']?>-<?=$rss['secid']?>-<?=$rsc['catid']?>"<?php if ($CID == $rsc['catid']){ ?> style="background:#009900;"<?php }?>>  
                <?=$rs['pname']?> 
                >  
                <?=$rss['pname']?> 
                >  
                <?=$rsc['pname']?> 
                </option> 
                <?php 
                } 
                }else{ 
                ?> 
                <option value="<?=$rs['mainid']?>-<?=$rss['secid']?>-0"<?php if ($SID == $rss['secid']){ ?> style="background:#009900;"<?php }?>>  
                <?=$rs['pname']?> 
                >  
                <?=$rss['pname']?> 
                </option> 
                <?php 
                } 
                ?> 
                <?php 
                } 
                }else{ 
                ?> 
                <option value="<?=$rs['mainid']?>-0-0"<?php if ($MID == $rs['mainid']){ ?> style="background:#009900;"<?php }?>>  
                <?=$rs['pname']?> 
                </option> 
                <?php 
                } 
                ?> 
                <?php 
                } 
                } 
                ?>
            </select>
        </div>
        <div class="col-md-12">
        	<div class="form-group" style="margin:20px 0;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <div class="col-md-12">
        	<label>
            	<input name="stay" type="checkbox" id="stay" value="Yes" checked> Stay in this Category
            </label>
        </div>
        </form>
    </div>
</div>
<?php include "../assets/include/footer.php";?>