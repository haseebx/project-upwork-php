<?php 
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
$sub_path = "../items/catalogs/";
if (chp('LVL') == 1)
{
	if (chp('C_TYPE') == "NEW")
	{
		if (chp('pname') != "")
		{
			$QRY = qry_run("select * from ms_pdf where pname = '".chp('pname')."'");
			if (num_rec($QRY) > 0)
			{
				?>
				<script language="JavaScript">
				alert ("This Page Name already in OUR DATABASE");
				history.go(-1);
				</script>
				<?php
				header("Location: pdf.php");
				die;
				}else{
				$INC = qry_run("Insert into ms_pdf (pname,pdetail,ptitle,pmeta,pshow,phead,keywords,description) Values('".chp('pname')."','".chp('pdetail')."','".chp('ptitle')."','".chp('pmeta')."','".chp('pshow')."','".chp('phead')."','".chp('keywords')."','".chp('description')."')");
				if (!$INC)
				{
					echo mysqli_error($db_con);
					die;
				}else{
					$last_id = mysqli_insert_id($db_con);
					//------- UPLOAD ----------------------------------------
					$img1 = "";
					$pic1 = $last_id."-pdf-1.";
					if (ch_file('img1') == "Yes")
					{
						$ext = move_uploaded_file('img1',$pic1,$catalog_path);
						if ($ext == "No")
						{
							$img1 = "";
						}else{
							$img1 = $pic1.$ext;
						}
					}
					
					
					
					$img2 = "";
					$pic2 = $last_id."-pdf-2.";
					if (ch_file('img2') == "Yes")
					{
						$ext = do_file('img2',$pic2,$catalog_path);
						if ($ext == "No")
						{
							$img2 = "";
						}else{
							$img2 = $pic2.$ext;
						}
					}
					
					$UPD = qry_run("Update ms_pdf Set img1 = '".$img1."',img2 = '".$img2."' where mainid = ".$last_id."");
					//---------------------- UPLOAD END --------------------------------
					header("Location: ../pdf.php");
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
			$pic1 = $last_id."-pdf-1.";
			if (ch_file('img1') == "Yes")
			{
				$ext = do_file('img1',$pic1,$catalog_path);
				if ($ext == "No")
				{
					$img1 = "";
				}else{
					$img1 = $pic1.$ext;
				}
			}else{
				$img1 = chp('imgs1');
			}
			$img2 = "";
			$pic2 = $last_id."-pdf-2.";
			if (ch_file('img2') == "Yes")
			{
				$ext = do_file('img2',$pic2,$catalog_path);
				if ($ext == "No")
				{
					$img2 = "";
				}else{
					$img2 = $pic2.$ext;
				}
			}else{
				$img2 = chp('imgs2');
			}
			
			
			$UPD = qry_run("Update ms_pdf Set pname = '".chhtml('pname')."',pdetail = '".chp('pdetail')."',img1 = '".$img1."',img2 = '".$img2."',pshow = '".ch_chkb('pshow')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',ptitle = '".chp('ptitle')."',pmeta = '".chp('pmeta')."' where mainid = ".ch_lvl('mid')."");
			header("Location: ../pdf.php");
			die;	
		}
	}
	//------ EDIT END ------------------------------
	if (chp('C_TYPE') == "DEL")
	{
		if (ch_lvl('mid') != "")
		{
			
			$QRY = qry_run("Select * from ms_pdf where mainid = ".ch_lvl('mid')."");
			if (num_rec($QRY) > 0)
			{
			$rp = fetch_rec($QRY);
			if (file_exists($catalog_path.$rp['img1']))
			{
				unlink($catalog_path.$rp['img1']);
			}
			if (file_exists($catalog_path.$rp['img2']))
			{
				unlink($catalog_path.$rp['img2']);
			}
			}
			$DEL = qry_run("Delete from ms_pdf where mainid = ".ch_lvl('mid')."");
			header("Location: ../pdf.php");
			die;
		}
	}
	
}
?>