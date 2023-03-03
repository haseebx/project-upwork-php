<?php  
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
if (chp('LVL') == 1) 
{ 
    if (chp('C_TYPE') == "NEW") 
    { 
        if (chp('pname') != "") 
        { 
            $QRY = qry_run("select * from ms_banners where pname = '".chp('pname')."'"); 
            if (num_rec($QRY) > 0) 
            { 
                ?> 
                <script language="JavaScript"> 
                alert ("This Banner Heading already in OUR DATABASE"); 
                history.go(-1); 
                </script> 
                <?php 
                header("Location: banners.php"); 
                die; 
            }else{ 
			
				$rank = 0;
				$RNK = qry_run("select * from ms_banners order by ranking DESC");
				if (num_rec($RNK) > 0)
				{
				$rk = fetch_rec($RNK);
				$rank = $rk['ranking'] + 1;
				}else{
				$rank = 1;
				}
                 
                $INC = qry_run("Insert into ms_banners (pname,ptype,plink,pshow,bcategory,ranking) Values('".chp('pname')."','".chp('ptype')."','".chp('plink')."','".chp('pshow')."','".chp('bcategory')."',".$rank.")");
                if (!$INC) 
                { 
                    echo mysqli_error($db_con); 
                    die; 
                }else{ 
                    $last_id = mysqli_insert_id($db_con); 
                    //------- UPLOAD ---------------------------------------- 
                    $img1 = ""; 
                    $pic1 = $last_id."-banner."; 
                    if (ch_file('img1') == "Yes") 
                    { 
                        $ext = do_file('img1',$pic1,$banner_path); 
                        if ($ext == "No") 
                        { 
                            $img1 = ""; 
                        }else{ 
                            $img1 = $pic1.$ext; 
                        } 
                    } 
                     
                    $UPD = qry_run("Update ms_banners Set img1 = '".$img1."' where mainid = ".$last_id.""); 
                    //---------------------- UPLOAD END -------------------------------- 
                    header("Location: $web_url/banners.php"); 
                    die; 
                } 
            } 
        } 
    } 
    //------- NEW END ------------ 
    if (chp('C_TYPE') == "EDIT") 
    { 
        if (chp('pname') != "") 
        { 
            //------- UPLOAD ---------------------------------------- 
			
            $last_id = ch_lvl('mid'); 
            $img1 = ""; 
            $pic1 = $last_id."-banner."; 
            if (ch_file('img1') == "Yes") 
            { 
                $ext = do_file('img1',$pic1,$banner_path); 
                if ($ext == "No") 
                { 
                    $img1 = ""; 
                }else{ 
                    $img1 = $pic1.$ext; 
                } 
            }else{ 
                $img1 = chp('imgs1'); 
            } 
            //------- UPLOAD END -------------------------------------- 
            $UPD = qry_run("Update ms_banners Set pname = '".chhtml('pname')."',plink = '".chp('plink')."',ptype = '".chp('ptype')."',pshow = '".ch_chkb('pshow')."',img1 = '".$img1."',bcategory = '".chp('bcategory')."' where mainid = ".ch_lvl('mid')."");
            header("Location: $web_url/banners.php"); 
            die;     
        } 
    } 
    //------ EDIT END ------------------------------ 
    if (chp('C_TYPE') == "DEL") 
    { 
        if (ch_lvl('mid') != "") 
        { 
			$QRY = qry_run("Select * from ms_banners where mainid = ".ch_lvl('mid')."");
			if (num_rec($QRY) > 0)
			{
			$rp = fetch_rec($QRY);
			if (file_exists($banner_path.$rp['img1']))
			{
				unlink("../pictures/".$rp['img1']);
			}
			}
			$DEL = qry_run("Delete from ms_banners where mainid = ".ch_lvl('mid')."");
			
			// Re Ranking -----------
			$rank = 1;
			$RNK = qry_run("select * from ms_banners order by ranking");
			if (num_rec($RNK) > 0)
			{
			while($rk = fetch_rec($RNK))
			{
				$UPD = qry_run("Update ms_banners Set ranking = ".$rank." where mainid = ".$rk['mainid']."");
				$rank = $rank + 1;
			}
			}
			//------ END RANKING -----
			
            header("Location: $web_url/banners.php"); 
            die; 
        } 
    } 
     
} 
?>