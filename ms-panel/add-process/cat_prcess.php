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

			$QRY = qry_run("select * from ms_main where pname = '".chp('pname')."' OR plink = '".chp('plink')."'");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Category Name/Slug already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: main.php");

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_main order by ranking DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}
				$slug = (chp('plink'))?chp('plink'):generate_slug(chp('pname'));
				$INC = qry_run("Insert into ms_main (pname,pdetail,pshow,plink,ptitle,pmeta,phead,keywords,description,ranking) Values('".htmlspecialchars(chp('pname'), ENT_QUOTES)."','".htmlspecialchars(chp('pdetail'), ENT_QUOTES)."','".ch_chkb('pshow')."','".$slug."','".htmlspecialchars(chp('ptitle'), ENT_QUOTES)."','".htmlspecialchars(chp('pmeta'), ENT_QUOTES)."','".htmlspecialchars(chp('phead'), ENT_QUOTES)."','".htmlspecialchars(chp('keywords'), ENT_QUOTES)."','".htmlspecialchars(chp('description'), ENT_QUOTES)."',".$rank.")");

				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					
					$last_id = mysqli_insert_id($db_con);
				
					
					//------- UPLOAD ----------------------------------------
					
					$img1 = "";

					$pic1 = $last_id."-pic-1.";

					if (ch_file('img1') == "Yes")

					{

						$ext = do_file('img1',$pic1,$cat_path);

						if ($ext == "No")

						{

							$img1 = "";

						}else{

							$img1 = $pic1.$ext;

						}

					}

					$img2 = "";

					$pic2 = $last_id."-pic-2.";

					if (ch_file('img2') == "Yes")

					{

						$ext = do_file('img2',$pic2,$cat_path);

						if ($ext == "No")

						{

							$img2 = "";

						}else{

							$img2 = $pic2.$ext;

						}

					}

					$img3 = "";

					$pic3 = $last_id."-pic-3.";

					if (ch_file('img3') == "Yes")

					{

						$ext = do_file('img3',$pic3,$cat_path);

						if ($ext == "No")

						{

							$img3 = "";

						}else{

							$img3 = $pic3.$ext;

						}

					}

					$img4 = "";

					$pic4 = $last_id."-pic-4.";

					if (ch_file('img4') == "Yes")

					{

						$ext = do_file('img4',$pic4,$cat_path);

						if ($ext == "No")

						{

							$img4 = "";

						}else{

							$img4 = $pic4.$ext;

						}

					}

					$UPD = qry_run("Update ms_main Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img3."',img4 = '".$img4."' where mainid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: ../main.php");

					die;

				}

			}

		}

	}
}
	//------- NEW END ------------

	

if (chp('LVL') == 2)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_section where mainid = ".ch_lvl('mid')." AND (pname = '".chp('pname')."' OR plink = '".chp('plink')."')");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Category Name/Slug already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: secions.php?mid=".ch_lvl('mid'));

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_section where mainid = ".ch_lvl('mid')." order by ranking DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}
				$slug = (chp('plink'))?chp('plink'):generate_slug(chp('pname'));
				$INC = qry_run("Insert into ms_section (mainid,pname,pdetail, pshow,plink,ptitle,pmeta,phead,keywords,description,ranking) Values(".ch_lvl('mid').",'".htmlspecialchars(chp('pname'), ENT_QUOTES)."','".htmlspecialchars(chp('pdetail'), ENT_QUOTES)."','".ch_chkb('pshow')."','".$slug."','".ch_chkb('ptitle')."','".ch_chkb('pmeta')."','".htmlspecialchars(chp('phead'), ENT_QUOTES)."','".htmlspecialchars(chp('keywords'), ENT_QUOTES)."','".htmlspecialchars(chp('description'), ENT_QUOTES)."',".$rank.")");

				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					$last_id = mysqli_insert_id($db_con);

					//------- UPLOAD ----------------------------------------

					//$sub_path = "pictures/";
					$img1 = "";

					$pic1 = ch_lvl('mid')."-".$last_id."-pic-1.";

					if (ch_file('img1') == "Yes")

					{

						$ext = do_file('img1',$pic1,$sub_cat_path);

						if ($ext == "No")

						{

							$img1 = "";

						}else{

							$img1 = $pic1.$ext;

						}

					}

					$img2 = "";

					$pic2 = ch_lvl('mid')."-".$last_id."-pic-2.";

					if (ch_file('img2') == "Yes")

					{

						$ext = do_file('img2',$pic2,$sub_cat_path);

						if ($ext == "No")

						{

							$img2 = "";

						}else{

							$img2 = $pic2.$ext;

						}

					}

					$UPD = qry_run("Update ms_section Set img1 = '".$img1."',img2 = '".$img2."' where secid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: ../secions.php?mid=".ch_lvl('mid'));

					die;

				}

			}

		}

	}
	}

	//------- NEW END ------------

	

if (chp('LVL') == 3)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_cat where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND (pname = '".chp('pname')."' OR plink = '".chp('plink')."')");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Category Name/Slug already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: category.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec'));

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_cat where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." order by ranking DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}
				$slug  = (chp('plink'))?chp('plink'):generate_slug(chp('pname'));
				
				 $INC = qry_run("Insert into ms_cat (mainid,secid,pname,pdetail, plink, pshow,phead,keywords,description,ranking) Values(".ch_lvl('mid').",".ch_lvl('sec').",'".htmlspecialchars(chp('pname'), ENT_QUOTES)."','".htmlspecialchars(chp('sdetail'), ENT_QUOTES)."','".$slug."','".ch_chkb('pshow')."','".htmlspecialchars(chp('phead'), ENT_QUOTES)."','".htmlspecialchars(chp('keywords'), ENT_QUOTES)."','".htmlspecialchars(chp('description'), ENT_QUOTES)."',".$rank.")");
				
				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					$last_id = mysqli_insert_id($db_con);

					//------- UPLOAD ----------------------------------------

					$img1 = "";

					$pic1 = ch_lvl('mid')."-".ch_lvl('sec')."-".$last_id."-pic-1.";

					if (ch_file('img1') == "Yes")

					{

						$ext = do_file('img1',$pic1,$sub_cat_path);

						if ($ext == "No")

						{

							$img1 = "";

						}else{

							$img1 = $pic1.$ext;

						}

					}

					$img2 = "";

					$pic2 = ch_lvl('mid')."-".ch_lvl('sec')."-".$last_id."-pic-2.";

					if (ch_file('img2') == "Yes")

					{

						$ext = do_file('img2',$pic2,$sub_cat_path);

						if ($ext == "No")

						{

							$img2 = "";

						}else{

							$img2 = $pic2.$ext;

						}

					}

					$UPD = qry_run("Update ms_cat Set img1 = '".$img1."',img2 = '".$img2."' where catid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: ../subsection.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec'));

					die;

				}

			}

		}

	}
}

	//------- NEW END ------------

	

if (chp('LVL') == 4)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('pname') != "")

		{

			

			$QRY = qry_run("select * from ms_prods where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." AND pcode = '".chp('pcode')."' AND sdetail = '".chp('sdetail')."'");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Item Name/Slug already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: ../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat'));

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_prods where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." order by ranking DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}

				$part = 0;

				$ART = qry_run("select * from ms_prods order by pid DESC");

				if (num_rec($ART) > 0)

				{

					$rt = fetch_rec($ART);

					$part = $rt['part'] + 1;

				}else{

					$part = 1001;

				}

				$rand_id = rand(0,99999999);

				$CHK_R = qry_run("select * from ms_prods where rand_id = '".$rand_id."'");

				if (num_rec($CHK_R) > 0)

				{

					$rand_id = rand(0,88888888);

				}

				if (chp('brand') != "")

				{

					$brand = explode("^",chp('brand'));

				}else{

					$brand[0] = 0;

					$brand[1] = "";

				}
				$slug  = (chp('sdetail'))?chp('sdetail'):generate_slug(chp('pname'));
				$INC = qry_run("Insert into ms_prods (mainid,secid,catid,pname,pcode,part,sdetail,pdetail,pshow,ptitle,pmeta,phead,keywords,description,ranking,from_head,from_link,pdate,last_update,rand_id,feature,special,new,market_rate,prate,spl_rate,stock,shipping,tax,free_shipping,taxable,brandid,brand_name,whole_sale_rate) Values(".ch_lvl('mid').",".ch_lvl('sec').",".ch_lvl('cat').",'".chp('pname')."','".chp('pcode')."','".chp('part')."','".$slug."','".chp('pdetail')."','".ch_chkb('pshow')."','".chp('ptitle')."','".chp('pmeta')."','".htmlspecialchars(chp('phead'), ENT_QUOTES)."','".htmlspecialchars(chp('keywords'), ENT_QUOTES)."','".htmlspecialchars(chp('description'), ENT_QUOTES)."',".$rank.",'".htmlspecialchars(chp('from_head'), ENT_QUOTES)."','".htmlspecialchars(chp('from_link'), ENT_QUOTES)."','".date('Y-m-d')."','".date('Y-m-d')."','".$rand_id."','".ch_chkb('feature')."','".ch_chkb('special')."','".ch_chkb('new')."',".ch_lvl('market_rate').",".ch_lvl('prate').",".ch_lvl('spl_rate').",".ch_lvl('stock').",".ch_lvl('shipping').",".ch_lvl('tax').",'".ch_chkb('free_shipping')."','".ch_chkb('taxable')."',".$brand[0].",'".$brand[1]."',".ch_lvl('whole_sale_rate').")");

				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					$last_id = mysqli_insert_id($db_con);

					//----- Product Options ----------------

						$QRYs = qry_run("select * from ms_options where pshow = 'Yes' order by ranking");

						if (num_rec($QRYs) > 0)

						{

							$p = 1;

							while($rss = fetch_rec($QRYs))

							{

								if (isset($_POST['opt'.$rss['mainid']]))

								{

									$opt = $_POST['opt'.$rss['mainid']];

									$opt[] = implode(",", $opt);

									$tlt_rec =  count($opt)-1;

									if ($tlt_rec > 0)

									{

										

										for ($i=1; $i<=$tlt_rec; $i++)

										{

											$QRYo = qry_run("select * from ms_sub_opt where subid = ".$opt[$i-1]." order by ranking");

											if (num_rec($QRYo) > 0)

											{

												$rso = fetch_rec($QRYo);

												$INST = qry_run("Insert into ms_prod_opt (pid,pname,prate,ptype,opt_id,sub_opt_id) Values (".$last_id.",'".$rso['pname']."',".ch_lvl('prate'.$rso['subid']).",'".chp('ptype'.$rso['subid'])."',".$rss['mainid'].",".$rso['subid'].")");

											}

										}

									}

								}

							}

						}

					//---- Feature Ranking -----------------

					if (ch_chkb('feature') == "Yes")

					{

						$RANKf = qry_run("Select * from ms_prods where feature = 'Yes' order by feature_ranking");

						$NUMf = num_rec($RANKf);

						if ($NUMf > 0)

						{

							$nrankf = 1;

							while($Fsf = fetch_rec($RANKf))

							{

								$UPDf = qry_run("Update ms_prods Set feature_ranking = ".$nrankf." where pid = ".$Fsf['pid']."");

								$nrankf = $nrankf + 1;

							}

						}

					}

					if (ch_chkb('new') == "Yes")

					{

						$RANKf = qry_run("Select * from ms_prods where new = 'Yes' order by new_ranking");

						$NUMf = num_rec($RANKf);

						if ($NUMf > 0)

						{

							$nrankf = 1;

							while($Fsf = fetch_rec($RANKf))

							{

								$UPDf = qry_run("Update ms_prods Set new_ranking = ".$nrankf." where pid = ".$Fsf['pid']."");

								$nrankf = $nrankf + 1;

							}

						}

					}

					if (ch_chkb('special') == "Yes")

					{

						$RANKf = qry_run("Select * from ms_prods where special = 'Yes' order by spl_ranking");

						$NUMf = num_rec($RANKf);

						if ($NUMf > 0)

						{

							$nrankf = 1;

							while($Fsf = fetch_rec($RANKf))

							{

								$UPDf = qry_run("Update ms_prods Set spl_ranking = ".$nrankf." where pid = ".$Fsf['pid']."");

								$nrankf = $nrankf + 1;

							}

						}

					}

					//------- UPLOAD ----------------------------------------

					$img1 = "";

					$pic1 = chp('pcode')."-".$last_id."-pic-1.";

					$img2 = "";

					$pic2 = chp('pcode')."-".$last_id."-pic-2.";

					$img3 = "";

					$pic3 = chp('pcode')."-".$last_id."-pic-3.";

					$img4 = "";

					$pic4 = chp('pcode')."-".$last_id."-pic-4.";

					

					if (ch_file('img2') == "Yes")

					{

						$ext = do_file('img2',$pic4,$prd_path);

						if ($ext == "No")

						{

							$img4 = "";

						}else{

							$img4 = $pic4.$ext;

							

							//************************ AUTO THUMBNAIL SETTING **********************

							$img3 = cr_image($img4,3000,'W',$ext,$pic3,$prd_path);

							$img2 = cr_image($img3,1000,'W',$ext,$pic2,$prd_path);

							$img1 = cr_image($img3,300,'W',$ext,$pic1,$prd_path);

							unlink($prd_path.$img4);

							$img4 = "";

							//************************ END CREATING THUMBNAIL *************************

						}

					}

					$file1 = "";
					
					$UPD = qry_run("Update ms_prods Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img3."',file1 = '".$file1."' where pid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: ../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat'));

					die;

				}

			}

		}

	}
}

	//------- NEW END ------------

	


if (chp('LVL') == 7)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_options where pname = '".chp('pname')."'");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Option Name already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: $web_url/p_options.php");

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_options order by mainid DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}

				$INC = qry_run("Insert into ms_options (pname,pdetail,pshow,ptype,ranking) Values('".chp('pname')."','".chp('pdetail')."','".ch_chkb('pshow')."','".chp('ptype')."',".$rank.")");

				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					$last_id = mysqli_insert_id($db_con);

					//------- UPLOAD ----------------------------------------

					$img1 = "";

					$pic1 = $last_id."-opt-1.";

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

					$UPD = qry_run("Update ms_options Set img1 = '".$img1."' where mainid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: $web_url/p_options.php");

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

			$pic1 = $last_id."-opt-1.";

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

			//------- UPLOAD END --------------------------------------

			$UPD = qry_run("Update ms_options Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."',ptype = '".chp('ptype')."',pstyle = '".chp('pstyle')."',img1 = '".$img1."' where mainid = ".ch_lvl('mid')."");

			header("Location: $web_url/p_options.php");

			die;	

		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (ch_lvl('mid') != "")

		{

			$DEL_opt = qry_run("Delete from ms_sub_opt where mainid = ".ch_lvl('mid')."");

			$DEL = qry_run("Delete from ms_options where mainid = ".ch_lvl('mid')."");

			// Re Ranking -----------

			$rank = 1;

			$RNK = qry_run("select * from ms_options order by ranking");

			if (num_rec($RNK) > 0)

			{

				while($rk = fetch_rec($RNK))

				{

					$UPD = qry_run("Update ms_options Set ranking = ".$rank." where mainid = ".$rk['mainid']."");

					$rank = $rank + 1;

				}

			}//------ END RANKING -----

			header("Location: $web_url/p_options.php");

			die;

		}

	}

	if (chp('C_TYPE') == "PSHOW")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_options Set pshow = '".$P_show."' where mainid = ".ch_lvl('mid')."");

		header("Location: $web_url/p_options.php");

		die;

	}

}

if (chp('LVL') == 8)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_sub_opt where mainid = ".ch_lvl('mid')." AND pname = '".chp('pname')."'");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Option Name already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: $web_url/sub_opt.php?mid=".ch_lvl('mid'));

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_sub_opt where mainid = ".ch_lvl('mid')." order by subid DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}

				$INC = qry_run("Insert into ms_sub_opt (mainid,pname,pdetail,pshow,ranking) Values(".ch_lvl('mid').",'".chp('pname')."','".chp('pdetail')."','".ch_chkb('pshow')."',".$rank.")");

				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					$last_id = mysqli_insert_id($db_con);

					//------- UPLOAD ----------------------------------------

					$img1 = "";

					$pic1 = $last_id."_sub-opt-1.";

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

					$UPD = qry_run("Update ms_sub_opt Set img1 = '".$img1."' where subid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: $web_url/sub_opt.php?mid=".ch_lvl('mid'));

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

			$last_id = ch_lvl('sid');

			$img1 = "";

			$pic1 = $last_id."-sub-opt-1.";

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

			//------- UPLOAD END --------------------------------------

			$UPD = qry_run("Update ms_sub_opt Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."',img1 = '".$img1."' where subid = ".ch_lvl('sid')."");

			header("Location: $web_url/sub_opt.php?mid=".ch_lvl('mid'));

			die;	

		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (ch_lvl('mid') != "")

		{

			$DEL = qry_run("Delete from ms_sub_opt where mainid = ".ch_lvl('mid')." AND subid = ".ch_lvl('sid')."");

			// Re Ranking -----------

			$rank = 1;

			$RNK = qry_run("select * from ms_sub_opt where mainid = ".ch_lvl('mid')." order by ranking");

			if (num_rec($RNK) > 0)

			{

				while($rk = fetch_rec($RNK))

				{

					$UPD = qry_run("Update ms_sub_opt Set ranking = ".$rank." where subid = ".$rk['subid']."");

					$rank = $rank + 1;

				}

			}//------ END RANKING -----

			header("Location: $web_url/sub_opt.php?mid=".ch_lvl('mid'));

			die;

		}

	}

	if (chp('C_TYPE') == "PSHOW")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_sub_opt Set pshow = '".$P_show."' where subid = ".ch_lvl('sid')."");

		header("Location: $web_url/sub_opt.php?mid=".ch_lvl('mid'));

		die;

	}

}

if (chp('LVL') == 9)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_more where pid = ".ch_lvl('pid')." AND pname = '".chp('pname')."'");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Heading Name already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: more_../prods.php?mid=".ch_lvl('main')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_more where pid = ".ch_lvl('pid')." order by mainid DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}

				$INC = qry_run("Insert into ms_more (mid,sec,cat,pid,pname,pdetail,pshow,ranking) Values(".ch_lvl('main').",".ch_lvl('sec').",".ch_lvl('cat').",".ch_lvl('pid').",'".chp('pname')."','".chp('pdetail')."','".ch_chkb('pshow')."',".$rank.")");

				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					$last_id = mysqli_insert_id($db_con);

					//------- UPLOAD ----------------------------------------

					$img1 = "";

					$img2 = "";

					$img3 = "";

					$img4 = "";

					$pic1 = ch_lvl('pid')."-".$last_id."-more-1.";

					$pic2 = ch_lvl('pid')."-".$last_id."-more-2.";

					$pic3 = ch_lvl('pid')."-".$last_id."-more-4.";

					$pic4 = ch_lvl('pid')."-".$last_id."-more-3.";

					if (ch_file('img2') == "Yes")

					{

						$ext = do_file('img2',$pic3,$prd_path);

						if ($ext == "No")

						{

							$img3 = "";

						}else{

							$img3 = $pic3.$ext;

							

							//************************ AUTO THUMBNAIL SETTING **********************

							$img4 = cr_image($img3,3000,'W',$ext,$pic4,$prd_path);

							$img2 = cr_image($img3,1000,'W',$ext,$pic2,$prd_path);

							$img1 = cr_image($img3,300,'W',$ext,$pic1,$prd_path);

							unlink($prd_path.$img3);

							$img3 = "";

							//************************ END CREATING THUMBNAIL *************************

						}

					}

					$UPD = qry_run("Update ms_more Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img4."' where mainid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: $web_url/process/more_prods.php?mid=".ch_lvl('main')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

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

			$last_id = ch_lvl('more');

			//------- UPLOAD ----------------------------------------

			$img1 = "";

			$img2 = "";

			$img3 = "";

			$img4 = "";

			$pic1 = ch_lvl('pid')."-".$last_id."-more-1.";

			$pic2 = ch_lvl('pid')."-".$last_id."-more-2.";

			$pic3 = ch_lvl('pid')."-".$last_id."-more-4.";

			$pic4 = ch_lvl('pid')."-".$last_id."-more-3.";

			if (ch_file('img2') == "Yes")

			{

				$ext = do_file('img2',$pic3,$prd_path);

				if ($ext == "No")

				{

					$img3 = "";

				}else{

					$img3 = $pic3.$ext;


					//************************ AUTO THUMBNAIL SETTING **********************

					$img4 = cr_image($img3,3000,'W',$ext,$pic4,$prd_path);

					$img2 = cr_image($img3,1000,'W',$ext,$pic2,$prd_path);

					$img1 = cr_image($img3,300,'W',$ext,$pic1,$prd_path);

					unlink($prd_path.$img3);

					$img3 = "";

					$UPD = qry_run("Update ms_more Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img4."' where mainid = ".$last_id."");

					//************************ END CREATING THUMBNAIL *************************

				}

			}

			//------- UPLOAD END --------------------------------------

			$UPD = qry_run("Update ms_more Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."' where mainid = ".ch_lvl('more')."");

			header("Location: $web_url/process/more_prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

			die;	

		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (ch_lvl('pid') != "")

		{

			$QRY = qry_run("Select * from ms_more where pid = ".ch_lvl('pid')." AND mainid = ".ch_lvl('more')."");

			if (num_rec($QRY) > 0)

			{

				$rp = fetch_rec($QRY);

				if (file_exists($prd_path.$rp['img1'])) 

				{

					unlink($prd_path.$rp['img1']);

				}

				if (file_exists($prd_path.$rp['img2'])) 

				{

					unlink($prd_path.$rp['img2']);

				}

				if (file_exists($prd_path.$rp['img3'])) 

				{

					unlink($prd_path.$rp['img3']);

				}

			}

			$DEL = qry_run("Delete from ms_more where pid = ".ch_lvl('pid')." AND mainid = ".ch_lvl('more')."");

			// Re Ranking -----------

			$rank = 1;

			$RNK = qry_run("select * from ms_more where pid = ".ch_lvl('pid')." order by ranking");

			if (num_rec($RNK) > 0)

			{

				while($rk = fetch_rec($RNK))

				{

					$UPD = qry_run("Update ms_more Set ranking = ".$rank." where mainid = ".$rk['mainid']."");

					$rank = $rank + 1;

				}

			}//------ END RANKING -----

			header("Location: $web_url/process/more_prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

			die;

		}

	}

	if (chp('C_TYPE') == "PSHOW")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_more Set pshow = '".$P_show."' where mainid = ".ch_lvl('more')."");

		header("Location: more_../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

		die;

	}

}



?>