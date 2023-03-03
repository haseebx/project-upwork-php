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
			$QRY = qry_run("select * from ms_contents where pname = '".chp('pname')."'");
			if (num_rec($QRY) > 0)
			{
				?>
				<script language="JavaScript">
				alert ("This Page Name already in OUR DATABASE");
				history.go(-1);
				</script>
				<?php
				header("Location: content.php");
				die;
			}else{
				$rank = 0;
				$RNK = qry_run("select * from ms_contents order by ranking DESC");
				if (num_rec($RNK) > 0)
				{
					$rk = fetch_rec($RNK);
					$rank = $rk['ranking'] + 1;
				}else{
					$rank = 1;
				}
				$INC = qry_run("Insert into ms_contents (pname,pdetail,ptype,plink,ptitle,pmeta,img_position,pshow,phead,keywords,description,p_position,ranking) Values('".chp('pname')."','".chp('pdetail')."','".chp('ptype')."','".chp('plink')."','".chp('ptitle')."','".chp('pmeta')."','".chp('img_position')."','".ch_chkb('pshow')."','".chp('phead')."','".chp('keywords')."','".chp('description')."','".chp('p_position')."',".$rank.")");
				if (!$INC)
				{
					echo mysql_error();
					die;
				}else{
					 $last_id = mysqli_insert_id($db_con); 
					//------- UPLOAD ----------------------------------------
					$img1 = "";
					$pic1 = $last_id."-page.";
					if (ch_file('img1') == "Yes")
					{
						$ext = do_file('img1',$pic1,$pages_path);
						if ($ext == "No")
						{
							$img1 = "";
						}else{
							$img1 = $pic1.$ext;
						}
					}
					
					$UPD = qry_run("Update ms_contents Set img1 = '".$img1."' where mainid = ".$last_id."");
					//---------------------- UPLOAD END --------------------------------
					header("Location: $web_url/content.php");
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
			$pic1 = $last_id."-page.";
			if (ch_file('img1') == "Yes")
			{
				$ext = do_file('img1',$pic1,$pages_path);
				if ($ext == "No")
				{
					$img1 = "";
				}else{
					$img1 = $pic1.$ext;
				}
			}else{
				$img1 = chp('img1');
			}
			
			//------- UPLOAD END --------------------------------------
			//$UPD = qry_run("Update ms_contents Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',img1 = '".$img1."',ptype = '".chp('ptype')."',plink = '".chp('plink')."',img_position = '".chp('img_position')."' where mainid = ".ch_lvl('mid')."");
			$UPD = qry_run("Update ms_contents Set pname = '".chhtml('pname')."',pdetail = '".chp('pdetail')."',img1 = '".$img1."',pshow = '".ch_chkb('pshow')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',ptype = '".chp('ptype')."',plink = '".chp('plink')."',ptitle = '".chp('ptitle')."',pmeta = '".chp('pmeta')."' where mainid = ".ch_lvl('mid')."");
			header("Location: $web_url/content.php");
			die;	
		}
	}
	//------ EDIT END ------------------------------
	if (chp('C_TYPE') == "DEL")
	{
		if (ch_lvl('mid') != "")
		{
			//$DEL = qry_run("Delete from ms_contents where mainid = ".ch_lvl('mid')."");
			
			header("Location: $web_url/content.php");
			die;
		}
	}
	
}
?>