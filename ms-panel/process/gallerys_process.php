<?php 
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";

if (chp('sub_mit') == "Y")
{
	if(chp('C_TYPE') == 'NEW')
	{
		if (chp('pname') != "")
		{
			$QRY = qry_run("select * from ms_pic_category where pname = '".chp('pname')."'");
			if (num_rec($QRY) > 0)
			{
				?>
				<script language="JavaScript">
				alert ("This Page Name already in OUR DATABASE");
				history.go(-1);
				</script>
				<?php
				header("Location: gallerys.php");
				die;
			}
			
			$INC = qry_run("Insert into ms_pic_category (pname,pdetail,pshow,phead,alt_text,keywords,description) Values('".chp('pname')."','".chp('pdetail')."','".chp('pshow')."','".chp('phead')."','".chp('alt_text')."','".chp('keywords')."','".chp('description')."')");
			if (!$INC)
				{
					echo mysqli_error($db_con);
					die;
				}else{
					$last_id = mysqli_insert_id($db_con);
					//------- UPLOAD ----------------------------------------
					$img1 = "";
					
					$pic1 = $last_id."-gallery-1.";
					if (ch_file('img1') == "Yes")
					{
						$ext = do_file('img1',$pic1,$sub_path);
						if ($ext == "No")
						{
							$img1 = "";
						}else{
							$img1 = $pic1.$ext;
						}
					}
					$img2 = "";
					
					$UPD = qry_run("Update ms_pic_category Set img1 = '".$img1."' where mainid = ".$last_id."");
					//---------------------- UPLOAD END --------------------------------
					header("Location: $web_url/gallerys.php");
					die;
				}
		}
	}
	
	if(chp('C_TYPE') == 'EDIT')
	{
		if (chp('pname') != "")
		{
			//------- UPLOAD ----------------------------------------
			$last_id = $_REQUEST['mainid'];
			$img1 = "";
			$pic1 = $last_id."-gallery-1.";
			if (ch_file('img1') == "Yes")
			{
				$ext = do_file('img1',$pic1,$sub_path);
				if ($ext == "No")
				{
					$img1 = "";
				}else{
					$img1 = $pic1.$ext;
				}
			}else{
				$img1 = chp('imgs1');
			}
			$UPD = qry_run("Update ms_pic_category Set pname = '".$_REQUEST['pname']."',pdetail = '".$_REQUEST['pdetail']."',pshow = '".$_REQUEST['pshow']."',phead = '".$_REQUEST['phead']."',alt_text = '".$_REQUEST['alt_text']."',keywords = '".$_REQUEST['keywords']."',description = '".$_REQUEST['description']."',img1 = '".$img1."' where mainid = ".$_REQUEST['mainid']."");
			header("Location: $web_url/gallerys.php");
			die;
		}
	}
	
}

if(chp('C_TYPE') == 'DEL')
{
	$QRY = qry_run("Select * from ms_pic_category where mainid = ".ch_lvl('mid')."");
			if (num_rec($QRY) > 0)
			{
			$rp = fetch_rec($QRY);
			if (file_exists($sub_path.$rp['img1']))
			{
				unlink($sub_path.$rp['img1']);
			}
			
			}
	$DEL = qry_run("Delete from ms_pic_category where mainid = ".$_REQUEST['mid']."");
	header("Location: $web_url/gallerys.php");
	die;
}
?>