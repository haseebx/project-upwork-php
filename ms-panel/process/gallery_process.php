<?php 
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";

if (chp('LVL') == 2)
{
	if (chp('C_TYPE') == "NEW")
	{
		if (chp('pname') != "")
		{
			
				$ranking = 0;
				$QRYs = qry_run("select * from ms_pictures where mainid = ".ch_lvl('main')." order by subid DESC");
				if (num_rec($QRYs) > 0)
				{
					$rsb = fetch_rec($QRYs);
					$ranking = $rsb['ranking'];
				}
				$ranking = $ranking + 1;
				
				$INC = qry_run("Insert into ms_pictures (mainid,pname,pdetail,pshow,ranking,pvideo,ptype) Values(".ch_lvl('main').",'".chp('pname')."','".ch('pdetail')."','".ch_chkb('pshow')."',".$ranking.",'".ch('pvideo')."','".chp('ptype')."')");
				if (!$INC)
				{
					echo mysql_error();
					die;
				}else{
					$last_id = mysqli_insert_id($db_con);
					$img1 = "";
					
					$pic1 = $last_id."-gallery-pic-1.";
					if (ch_file('img1') == "Yes")
					{
						$ext = do_file('img1',$pic1,$gallery_path);
						if ($ext == "No")
						{
							$img1 = "";
						}else{
							$img1 = $pic1.$ext;
						}
					}
						$img2 = "";
					$pic2 = $last_id."-gallery-pic-lrg.";
					if (ch_file('img2') == "Yes")
					{
						$ext = do_file('img2',$pic2,$gallery_path);
						if ($ext == "No")
						{
							$img2 = "";
						}else{
							$img2 = $pic2.$ext;
						}
					}


					

					$UPD = qry_run("Update ms_pictures Set img1 = '".$img1."',img2 = '".$img2."' where subid = ".$last_id."");
					//---------------------- UPLOAD END --------------------------------
					if (chp('ptype') == "PIC"){
						header("Location: $web_url/pictures.php?main=".ch_lvl('main'));
					}else{
						header("Location: $web_url/pictures.php?main=".ch_lvl('main'));
					}
					die;
				}
			//}
		}
	}
	//------- NEW END ------------
	if (chp('C_TYPE') == "EDIT")
	{
		if (chp('pname') != "")
		{
			//------- UPLOAD ----------------------------------------
			$last_id = $_REQUEST['sub'];
			$img1 = "";
			$pic1 = $last_id."-inner-gallery-1.";
			if (ch_file('img1') == "Yes")
			{
				$ext = do_file('img1',$pic1,$gallery_path);
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
					$pic2 = $last_id."-gallery-pic-lrg.";
					if (ch_file('img2') == "Yes")
					{
						$ext = do_file('img2',$pic2,$gallery_path);
						if ($ext == "No")
						{
							$img2 = "";
						}else{
							$img2 = $pic2.$ext;
						}
					}
			
			//------- UPLOAD END --------------------------------------
			$UPD = qry_run("Update ms_pictures Set pname = '".chhtml('pname')."',ptype = '".chp('ptype')."',pdetail = '".ch('pdetail')."',pshow = '".ch_chkb('pshow')."',pvideo = '".ch('pvideo')."',img1 = '".$img1."',img2 = '".$img2."',feature = '".chp('feature')."',feature_video = '".ch('feature_video')."' where subid = ".ch_lvl('sub')."");
//die();
			if (chp('ptype') == "PIC"){
				header("Location: $web_url/pictures.php?main=".ch_lvl('main'));
			}else{
				header("Location: $web_url/pictures.php?main=".ch_lvl('main'));
			}
			die;	
		}
	}
	//------ EDIT END ------------------------------
	if (chp('C_TYPE') == "DEL")
	{
		if (ch_lvl('sub') != "")
		{
			$QRY = qry_run("Select * from ms_pictures where subid = ".ch_lvl('sub')."");
			if (num_rec($QRY) > 0)
			{
			$rp = fetch_rec($QRY);
			if (file_exists($gallery_path.$rp['img1']))
			{
				unlink($gallery_path.$rp['img1']);
			}
			if (file_exists($gallery_path.$rp['img2']))
			{
				unlink($gallery_path.$rp['img2']);
			}
			}
			$DEL = qry_run("Delete from ms_pictures where subid = ".ch_lvl('sub')."");
			//-------- RE Rank ----------------
			$RANK = qry_run("Select * from ms_pictures where mainid = ".ch_lvl('main')." order by ranking");
			$NUM = num_rec($RANK);
			if ($NUM > 0)
			{
				
				$nrank = 1;
				while($Fs = fetch_rec($RANK))
				{
				
					$UPD = qry_run("Update ms_pictures Set ranking = ".$nrank." where subid = ".$Fs['subid']."");
					$nrank = $nrank + 1;
				}
			}
			//-------- END ---------------------
			if (chp('ptype') == "PIC"){
				header("Location: $web_url/pictures.php?main=".ch_lvl('main'));
			}else{
				header("Location: $web_url/pictures.php?main=".ch_lvl('main'));
			}
			die;
		}
	}
	//------ RANKING ------------------------------
	if (chp('C_TYPE') == "RANK")
	{
		$er = "";
		$sec = ch('sec');
		$main = ch('main');
		$new_rank = $_REQUEST['ranking'.$sec];
		if ($new_rank > 0)
		{
				$old_rank = 0;
				$MAIN = qry_run("Select * from ms_pictures where subid = ".$sec."");
				$num = num_rec($MAIN);
				if ($num > 0)
				{
					$Rs = fetch_rec($MAIN);
					$old_rank = $Rs['ranking'];
				}
				$MAIN = qry_run("Select * from ms_pictures where mainid = ".$main." AND ranking = ".$new_rank."");
				$num = num_rec($MAIN);
				if ($num > 0)
				{
					$Rs = fetch_rec($MAIN);
					$sub = $Rs['subid'];
				}
				if ($old_rank > $new_rank)
				{
					$RANK = qry_run("Select * from ms_pictures where mainid = ".$main." AND ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");
					$NUM = num_rec($RANK);
					if ($NUM > 0)
					{
						while($Fs = fetch_rec($RANK))
						{
							$newrank = $Fs['ranking'] + 1;
							$UPD = qry_run("Update ms_pictures Set ranking = ".$newrank." where mainid = ".$Fs['mainid']." AND subid = ".$Fs['subid']."");
						}
						$UPD = qry_run("Update ms_pictures Set ranking = ".$new_rank." where subid = ".$sec."");
					}
				}
				if ($old_rank < $new_rank)
				{
					$RANK = qry_run("Select * from ms_pictures where mainid = ".$main." AND ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");
					$NUM = num_rec($RANK);
					if ($NUM > 0)
					{
						while($Fs = fetch_rec($RANK))
						{
							$newrank = $Fs['ranking'] - 1;
							$UPD = qry_run("Update ms_pictures Set ranking = ".$newrank." where subid = ".$Fs['subid']."");
						}
						$UPD = qry_run("Update ms_pictures Set ranking = ".$new_rank." where subid = ".$sec."");
					}
				}
			//-------- RE Rank ----------------
			$RANK = qry_run("Select * from ms_pictures where mainid = ".$main." order by ranking");
			$NUM = num_rec($RANK);
			if ($NUM > 0)
			{
				$nrank = 1;
				while($Fs = fetch_rec($RANK))
				{
					$UPD = qry_run("Update ms_pictures Set ranking = ".$nrank." where subid = ".$Fs['subid']."");
					$nrank = $nrank + 1;
				}
			}
			//-------- END ---------------------
		}
		if (chp('ptype') == "PIC"){
			header("Location: $web_url/pictures.php?main=".ch_lvl('main'));
		}else{
			header("Location: $web_url/pictures.php?main=".ch_lvl('main'));
		}
		die;
	}
}
?>