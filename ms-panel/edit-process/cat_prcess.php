<?php 

include "../common/param.php";

include "../common/func.php";

include "../common/chk_login.php";

if (chp('LVL') == 1)

{

	//------- NEW END ------------

	if (chp('C_TYPE') == "EDIT")

	{

		if (chp('pname') != "")
		{

			$QRY = qry_run("select * from ms_main where plink = '".chp('plink')."' AND pname <> '".chp('pname')."'");

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
			//------- UPLOAD ----------------------------------------

			$last_id = ch_lvl('mid');

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

			}else{

				$img1 = chp('imgs1');

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

			}else{

				$img2 = chp('imgs2');

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

			}else{

				$img3 = chp('imgs3');

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

			}else{

				$img4 = chp('imgs4');

			}

			//------- UPLOAD END --------------------------------------


			$slug = (chp('plink'))?chp('plink'):generate_slug(chp('pname'));

			$UPD = qry_run("Update ms_main Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."',plink = '".$slug."',ptitle = '".chhtml('ptitle')."',pmeta = '".chhtml('pmeta')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img3."',img4 = '".$img4."' where mainid = ".ch_lvl('mid')."");

			header("Location: ../main.php");
			
			die;	
			}
		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (ch_lvl('mid') != "")

		{

			$CHK = qry_run("Select * from ms_section where mainid = ".ch_lvl('mid')."");

			if (num_rec($CHK) > 0)

			{

				header("Location: main.php?er=Y");

				die;

			}else{

					$IMG = qry_run("Select * from ms_main where mainid = ".ch_lvl('mid')."");

					if (num_rec($IMG) > 0)

					{

						$rm = fetch_rec($IMG);

						if (file_exists("pictures/".$rm['img1'])) 

						{

							unlink("pictures/".$rm['img1']);

						}

					}

					$DEL = qry_run("Delete from ms_main where mainid = ".ch_lvl('mid')."");

					// Re Ranking -----------

					$rank = 1;

					$RNK = qry_run("select * from ms_main order by ranking");

					if (num_rec($RNK) > 0)

					{

						while($rk = fetch_rec($RNK))

						{

							$UPD = qry_run("Update ms_main Set ranking = ".$rank." where mainid = ".$rk['mainid']."");

							$rank = $rank + 1;

						}

					}//------ END RANKING -----

			}

			header("Location: main.php");

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

		$UPD = qry_run("Update ms_main Set pshow = '".$P_show."' where mainid = ".ch_lvl('mid')."");

		header("Location: main.php");

		die;

	}

	if (chp('C_TYPE') == "FEATURE")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_main Set feature = '".$P_show."' where mainid = ".ch_lvl('mid')."");

		header("Location: main.php");

		die;

	}

}

if (chp('LVL') == 2)

{

	

	//------- NEW END ------------

	if (chp('C_TYPE') == "EDIT")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_section where mainid = ".ch_lvl('mid')." AND plink = '".chp('plink')."' AND pname <> '".chp('pname')."' ");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Category Name/Slug already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: ../secions.php?mid=".ch_lvl('mid'));

				die;

			}else{
			//------- UPLOAD ----------------------------------------

			//$sub_path = "../category/";

            $last_id = ch_lvl('sec');
			
			$img1 = "";

			$pic1 = ch_lvl('mid')."_".$last_id."-pic-1.";

			if (ch_file('img1') == "Yes")

			{

				$ext = do_file('img1',$pic1,$sub_cat_path);

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

			$pic2 = ch_lvl('mid')."_".$last_id."-pic-2.";

			if (ch_file('img2') == "Yes")

			{

				$ext = do_file('img2',$pic2,$sub_cat_path);

				if ($ext == "No")

				{

					$img2 = "";

				}else{

					$img2 = $pic2.$ext;

				}

			}else{

				$img2 = chp('imgs2');

			}

			//------- UPLOAD END --------------------------------------

			$slug  = (chp('plink'))?chp('plink'):generate_slug(chp('pname'));

			$UPD = qry_run("Update ms_section Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."',plink = '".$slug."',ptitle = '".chhtml('ptitle')."',pmeta = '".chhtml('pmeta')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',img1 = '".$img1."',img2 = '".$img2."' where secid = ".ch_lvl('sec')."");

			header("Location: ../secions.php?mid=".ch_lvl('mid'));

			die;	
			}
		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (ch_lvl('mid') != "" && ch_lvl('sec') != "")

		{

			$CHK = qry_run("Select * from ms_cat where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')."");

			if (num_rec($CHK) > 0)

			{

				header("Location: ../secions.php?er=Y&mid=".ch_lvl('mid'));

				die;

			}else{

					$CHK = qry_run("Select * from ms_prods where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')."");

					if (num_rec($CHK) > 0)

					{

						header("Location: ../secions.php?er=Y&mid=".ch_lvl('mid'));

						die;

					}else{

							$IMG = qry_run("Select * from ms_section where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')."");

							if (num_rec($IMG) > 0)

							{

								$rm = fetch_rec($IMG);

								if (file_exists("pictures/".$rm['img1'])) 

								{

									unlink("pictures/".$rm['img1']);

								}

							}

						

							$DEL = qry_run("Delete from ms_section where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')."");

							//--- RE-RABKING -----

							$rank = 1;

							$RNK = qry_run("select * from ms_section where mainid = ".ch_lvl('mid')." order by ranking");

							if (num_rec($RNK) > 0)

							{

								while($rk = fetch_rec($RNK))

								{

									$UPD = qry_run("Update ms_section Set ranking = ".$rank." where secid = ".$rk['secid']."");

									$rank = $rank + 1;

								}

							}

							//----- END Ranking ---

					}

			}

			header("Location: ../secions.php?mid=".ch_lvl('mid'));

			die;

		}

	}

	//---- DEL END -------

	if (chp('C_TYPE') == "PSHOW")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_section Set pshow = '".$P_show."' where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')."");

		header("Location: ../secions.php?mid=".ch_lvl('mid'));

		die;

	}

	if (chp('C_TYPE') == "FEATURE")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_section Set feature = '".$P_show."' where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')."");

		header("Location: ../secions.php?mid=".ch_lvl('mid'));

		die;

	}

}

if (chp('LVL') == 3)

{

	//------- NEW END ------------

	if (chp('C_TYPE') == "EDIT")

	{

		if (chp('pname') != "")

		{

			//------- UPLOAD ----------------------------------------

			$last_id = ch_lvl('cat');

			$img1 = "";

			$pic1 = ch_lvl('mid')."_".ch_lvl('sec')."_".$last_id."-pic-1.";

			if (ch_file('img1') == "Yes")

			{

				$ext = do_file('img1',$pic1,$sub_cat_path);

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

			$pic2 = ch_lvl('mid')."_".ch_lvl('sec')."_".$last_id."-pic-2.";

			if (ch_file('img2') == "Yes")

			{

				$ext = do_file('img2',$pic1,$sub_cat_path);

				if ($ext == "No")

				{

					$img2 = "";

				}else{

					$img2 = $pic2.$ext;

				}

			}else{

				$img2 = chp('imgs2');

			}

			//------- UPLOAD END --------------------------------------
			$slug  = (chp('sdetail'))?chp('sdetail'):generate_slug(chp('pname'));
			
			$UPD = qry_run("Update ms_cat Set pname = '".chhtml('pname')."',pdetail = '".$slug."',pshow = '".ch_chkb('pshow')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',img1 = '".$img1."',img2 = '".$img2."' where catid = ".ch_lvl('cat')."");

			header("Location: ../subsection.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec'));

			die;	

		}

	}

	//------ EDIT END ------------------------------


	if (chp('C_TYPE') == "PSHOW")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_cat Set pshow = '".$P_show."' where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')."");

		header("Location: ../subsection.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec'));

		die;

	}

}

if (chp('LVL') == 4)

{

	

	

	//------- NEW END ------------

	if (chp('C_TYPE') == "EDIT")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_prods where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." AND pcode = '".chp('pcode')."' AND sdetail = '".chp('sdetail')."' AND pname <> '".chp('pname')."'");

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
			//------- UPLOAD ----------------------------------------

			$last_id = ch_lvl('pid');

			$rand_id = chp('rand_id');

			

			$file1 = "";

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

					$UPD = qry_run("Update ms_prods Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img3."' where pid = ".ch_lvl('pid')."");

				}

			}

			//$brand = explode("^",chp('brand'));

			if (chp('brand') != "")

			{

				$brand = explode("^",chp('brand'));

			}else{

				$brand[0] = 0;

				$brand[1] = "";

			}

			//------- UPLOAD END --------------------------------------

			
			$slug  = (chp('sdetail'))?chp('sdetail'):generate_slug(chp('pname'));

			
			$UPD = qry_run("Update ms_prods Set pname = '".chhtml('pname')."',pcode = '".chp('pcode')."',part = '".chp('part')."',sdetail = '".$slug."',pdetail = '".chp('pdetail')."',pshow = '".ch_chkb('pshow')."',ptitle = '".chp('ptitle')."',pmeta = '".chp('pmeta')."',feature = '".ch_chkb('feature')."',special = '".ch_chkb('special')."',new = '".ch_chkb('new')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',last_update = '".date('Y-m-d')."',from_head = '".chhtml('from_head')."',from_link = '".chhtml('from_link')."',prate = ".ch_lvl('prate').",market_rate = ".ch_lvl('market_rate').",spl_rate = ".ch_lvl('spl_rate').",stock = ".ch_lvl('stock').",shipping = ".ch_lvl('shipping').",tax = ".ch_lvl('tax').",brandid = ".$brand[0].",brand_name = '".$brand[1]."',whole_sale_rate = ".ch_lvl('whole_sale_rate')." where pid = ".ch_lvl('pid')."");

			//----- Product Options ----------------

			$QRYd = qry_run("delete from ms_prod_opt where pid = ".ch_lvl('pid')."");

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

			header("Location: ../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat'));

			die;	
			}
		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (chp('mid') != "" && chp('sec') != "" && chp('cat') != "" && chp('pid') != "")

		{

			$QRY = qry_run("Select * from ms_prods where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." AND pid = ".ch_lvl('pid')."");

			if (num_rec($QRY) > 0)

			{

				$rp = fetch_rec($QRY);

				if (file_exists("pictures/".$rp['img1'])) 

				{

					unlink("pictures/".$rp['img1']);

				}

				if (file_exists("pictures/".$rp['img2'])) 

				{

					unlink("pictures/".$rp['img2']);

				}

				if (file_exists("pictures/".$rp['img3']))

				{

					unlink("pictures/".$rp['img3']);

				}

			}

			

			$DEL = qry_run("Delete from ms_prods where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." AND pid = ".ch_lvl('pid')."");

			

			$QRYd = qry_run("delete from ms_prod_opt where pid = ".ch_lvl('pid')."");

			//--- RE-RANKING -----

			$rank = 1;

			$RNK = qry_run("select * from ms_prods where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." order by ranking");

			if (num_rec($RNK) > 0)

			{

				while($rk = fetch_rec($RNK))

				{

					$UPD = qry_run("Update ms_prods Set ranking = ".$rank." where pid = ".$rk['pid']."");

					$rank = $rank + 1;

				}

			}

			//----- End Ranking ---

			header("Location: ../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat'));

			die;

		}

	}

	//---- DEL END -------

	if (chp('C_TYPE') == "PSHOW")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_prods Set pshow = '".$P_show."' where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." AND pid = ".ch_lvl('pid')."");

		header("Location: ../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat'));

		die;

	}

	if (chp('C_TYPE') == "SPECIAL")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_prods Set special = '".$P_show."' where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." AND pid = ".ch_lvl('pid')."");

		header("Location: ../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat'));

		die;

	}

	if (chp('C_TYPE') == "SALE")

	{

		if (chp('P_show') == "Yes")

		{

			$P_show = "No";

		}else{

			$P_show = "Yes";

		}

		$UPD = qry_run("Update ms_prods Set new = '".$P_show."' where mainid = ".ch_lvl('mid')." AND secid = ".ch_lvl('sec')." AND catid = ".ch_lvl('cat')." AND pid = ".ch_lvl('pid')."");

		header("Location: ../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat'));

		die;

	}

}

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

				//header("Location: p_options.php");

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

					$pic1 = $last_id."_opt_1.";

					if (ch_file('img1') == "Yes")

					{

						$ext = do_file('img1',$pic1,$prd_path);

						if ($ext == "No")

						{

							$img1 = "";

						}else{

							$img1 = $pic1.$ext;

						}

					}

					$UPD = qry_run("Update ms_options Set img1 = '".$img1."' where mainid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: p_options.php");

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

			$pic1 = $last_id."_opt_1.";

			if (ch_file('img1') == "Yes")

			{

				$ext = do_file('img1',$pic1,$prd_path);

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

			header("Location: p_options.php");

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

			header("Location: p_options.php");

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

		header("Location: p_options.php");

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

					$pic1 = $last_id."_sub_opt_1.";

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

			$pic1 = $last_id."_sub_opt_1.";

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

					$pic1 = ch_lvl('pid')."_".$last_id."_more_1.";

					$pic2 = ch_lvl('pid')."_".$last_id."_more_2.";

					$pic3 = ch_lvl('pid')."_".$last_id."_more_4.";

					$pic4 = ch_lvl('pid')."_".$last_id."_more_3.";

					if (ch_file('img2') == "Yes")

					{

						$ext = do_file('img2',$pic3,$sub_path);

						if ($ext == "No")

						{

							$img3 = "";

						}else{

							$img3 = $pic3.$ext;

							$Path = "pictures/";

							//************************ AUTO THUMBNAIL SETTING **********************

							$img4 = cr_image($img3,2000,'W',$ext,$pic4,$Path);

							$img2 = cr_image($img3,420,'W',$ext,$pic2,$Path);

							$img1 = cr_image($img3,100,'W',$ext,$pic1,$Path);

							unlink("pictures/".$img3);

							$img3 = "";

							//************************ END CREATING THUMBNAIL *************************

						}

					}

					$UPD = qry_run("Update ms_more Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img4."' where mainid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: more_../prods.php?mid=".ch_lvl('main')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

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

			$pic1 = ch_lvl('pid')."_".$last_id."_more_1.";

			$pic2 = ch_lvl('pid')."_".$last_id."_more_2.";

			$pic3 = ch_lvl('pid')."_".$last_id."_more_4.";

			$pic4 = ch_lvl('pid')."_".$last_id."_more_3.";

			if (ch_file('img2') == "Yes")

			{

				$ext = do_file('img2',$pic3,$sub_path);

				if ($ext == "No")

				{

					$img3 = "";

				}else{

					$img3 = $pic3.$ext;

					$Path = "pictures/";

					//************************ AUTO THUMBNAIL SETTING **********************

					$img4 = cr_image($img3,2000,'W',$ext,$pic4,$Path);

					$img2 = cr_image($img3,420,'W',$ext,$pic2,$Path);

					$img1 = cr_image($img3,100,'W',$ext,$pic1,$Path);

					unlink("pictures/".$img3);

					$img3 = "";

					$UPD = qry_run("Update ms_more Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img4."' where mainid = ".$last_id."");

					//************************ END CREATING THUMBNAIL *************************

				}

			}

			//------- UPLOAD END --------------------------------------

			$UPD = qry_run("Update ms_more Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."' where mainid = ".ch_lvl('more')."");

			header("Location: more_../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

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

				if (file_exists("pictures/".$rp['img1'])) 

				{

					unlink("pictures/".$rp['img1']);

				}

				if (file_exists("pictures/".$rp['img2'])) 

				{

					unlink("pictures/".$rp['img2']);

				}

				if (file_exists("pictures/".$rp['img3'])) 

				{

					unlink("pictures/".$rp['img3']);

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

			header("Location: more_../prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

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

if (chp('LVL') == 10)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_brands where bname = '".chp('pname')."'");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Brand Name already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: brands.php");

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_brands order by mainid DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}

				$INC = qry_run("Insert into ms_brands (bname,bdetail,pshow,phead,keywords,description,ranking,location) Values('".htmlspecialchars(chp('pname'), ENT_QUOTES)."','".htmlspecialchars(chp('pdetail'), ENT_QUOTES)."','".ch_chkb('pshow')."','".htmlspecialchars(chp('phead'), ENT_QUOTES)."','".htmlspecialchars(chp('keywords'), ENT_QUOTES)."','".htmlspecialchars(chp('description'), ENT_QUOTES)."',".$rank.",'".chp('location')."')");

				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					$last_id = mysqli_insert_id($db_con);

					//------- UPLOAD ----------------------------------------

					$img1 = "";

					$pic1 = $last_id."_brand_1.";

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

					$UPD = qry_run("Update ms_brands Set img1 = '".$img1."' where mainid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: brands.php");

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

			$pic1 = $last_id."_brand_1.";

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

			$UPD = qry_run("Update ms_brands Set bname = '".chhtml('pname')."',bdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',img1 = '".$img1."',location = '".chp('location')."' where mainid = ".ch_lvl('mid')."");

			header("Location: brands.php");

			die;	

		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (ch_lvl('mid') != "")

		{

			$DEL = qry_run("Delete from ms_brands where mainid = ".ch_lvl('mid')."");

			// Re Ranking -----------

			$rank = 1;

			$RNK = qry_run("select * from ms_brands order by ranking");

			if (num_rec($RNK) > 0)

			{

				while($rk = fetch_rec($RNK))

				{

					$UPD = qry_run("Update ms_brands Set ranking = ".$rank." where mainid = ".$rk['mainid']."");

					$rank = $rank + 1;

				}

			}//------ END RANKING -----

			header("Location: brands.php");

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

		$UPD = qry_run("Update ms_brands Set pshow = '".$P_show."' where mainid = ".ch_lvl('mid')."");

		header("Location: brands.php");

		die;

	}

}

if (chp('LVL') == 11)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('cid') != "")

		{

			$QRY = qry_run("select * from ms_coupon where cid = '".chp('cid')."'");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Coupon Code already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: coupons.php");

				die;

			}else{

				$expiry = chp('fy')."-".chp('fm')."-".chp('fd');

				$INC = qry_run("Insert into ms_coupon (cid,cname,cdetail,pshow,prate,dist_opt,min_val,expiry) Values('".chp('cid')."','".chp('cname')."','".chp('cdetail')."','".ch_chkb('pshow')."',".ch_lvl('prate').",'".chp('dist_opt')."',".ch_lvl('min_val').",'".$expiry."')");

				if (!$INC)

				{

					echo mysqli_error($db_con);

					die;

				}else{

					header("Location: coupons.php");

					die;

				}

			}

		}

	}

	//------- NEW END ------------

	if (chp('C_TYPE') == "EDIT")

	{

		if (chp('cid') != "")

		{

			$expiry = chp('fy')."-".chp('fm')."-".chp('fd');

			$UPD = qry_run("Update ms_coupon Set cid = '".chhtml('cid')."',cname = '".chhtml('cname')."',cdetail = '".chhtml('cdetail')."',pshow = '".ch_chkb('pshow')."',prate = ".ch_lvl('prate').",dist_opt = '".chhtml('dist_opt')."',min_val = ".ch_lvl('min_val').",expiry = '".$expiry."' where mainid = ".ch_lvl('mid')."");

			header("Location: coupons.php");

			die;	

		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (ch_lvl('mid') != "")

		{

			$DEL = qry_run("Delete from ms_coupon where mainid = ".ch_lvl('mid')."");

			header("Location: coupons.php");

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

		$UPD = qry_run("Update ms_coupon Set pshow = '".$P_show."' where mainid = ".ch_lvl('mid')."");

		header("Location: coupons.php");

		die;

	}

}

if (chp('LVL') == 12)

{

	if (chp('C_TYPE') == "NEW")

	{

		if (chp('pname') != "")

		{

			$QRY = qry_run("select * from ms_styles where pid = ".ch_lvl('pid')." AND pname = '".chp('pname')."'");

			if (num_rec($QRY) > 0)

			{

				?>

				<script language="JavaScript">

				alert ("This Heading Name already in OUR DATABASE");

				history.go(-1);

				</script>

				<?php

				//header("Location: more_styles.php?mid=".ch_lvl('main')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

				die;

			}else{

				$rank = 0;

				$RNK = qry_run("select * from ms_styles where pid = ".ch_lvl('pid')." order by mainid DESC");

				if (num_rec($RNK) > 0)

				{

					$rk = fetch_rec($RNK);

					$rank = $rk['ranking'] + 1;

				}else{

					$rank = 1;

				}

				$INC = qry_run("Insert into ms_styles (mid,sec,cat,pid,pname,pdetail,pshow,ranking) Values(".ch_lvl('main').",".ch_lvl('sec').",".ch_lvl('cat').",".ch_lvl('pid').",'".chp('pname')."','".chp('pdetail')."','".ch_chkb('pshow')."',".$rank.")");

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

					$pic1 = ch_lvl('pid')."_".$last_id."_styles_1.";

					$pic2 = ch_lvl('pid')."_".$last_id."_styles_2.";

					$pic3 = ch_lvl('pid')."_".$last_id."_styles_4.";

					$pic4 = ch_lvl('pid')."_".$last_id."_styles_3.";

					if (ch_file('img2') == "Yes")

					{

						$ext = do_file('img2',$pic3,$sub_path);

						if ($ext == "No")

						{

							$img3 = "";

						}else{

							$img3 = $pic3.$ext;

							$Path = "pictures/";

							//************************ AUTO THUMBNAIL SETTING **********************

							$img4 = cr_image($img3,750,'W',$ext,$pic4,$Path);

							$img2 = cr_image($img3,400,'W',$ext,$pic2,$Path);

							$img1 = cr_image($img3,100,'W',$ext,$pic1,$Path);

							unlink("pictures/".$img3);

							$img3 = "";

							//************************ END CREATING THUMBNAIL *************************

						}

					}

					$UPD = qry_run("Update ms_styles Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img4."' where mainid = ".$last_id."");

					//---------------------- UPLOAD END --------------------------------

					header("Location: more_styles.php?mid=".ch_lvl('main')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

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

			$last_id = ch_lvl('styles');

			//------- UPLOAD ----------------------------------------

			$img1 = "";

			$img2 = "";

			$img3 = "";

			$img4 = "";

			$pic1 = ch_lvl('pid')."_".$last_id."_styles_1.";

			$pic2 = ch_lvl('pid')."_".$last_id."_styles_2.";

			$pic3 = ch_lvl('pid')."_".$last_id."_styles_4.";

			$pic4 = ch_lvl('pid')."_".$last_id."_styles_3.";

			if (ch_file('img2') == "Yes")

			{

				$ext = do_file('img2',$pic3,$sub_path);

				if ($ext == "No")

				{

					$img3 = "";

				}else{

					$img3 = $pic3.$ext;

					$Path = "pictures/";

					//************************ AUTO THUMBNAIL SETTING **********************

					$img4 = cr_image($img3,750,'W',$ext,$pic4,$Path);

					$img2 = cr_image($img3,400,'W',$ext,$pic2,$Path);

					$img1 = cr_image($img3,100,'W',$ext,$pic1,$Path);

					unlink("pictures/".$img3);

					$img3 = "";

					$UPD = qry_run("Update ms_styles Set img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img4."' where mainid = ".$last_id."");

					//************************ END CREATING THUMBNAIL *************************

				}

			}

			//------- UPLOAD END --------------------------------------

			$UPD = qry_run("Update ms_styles Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."' where mainid = ".ch_lvl('styles')."");

			header("Location: more_styles.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

			die;	

		}

	}

	//------ EDIT END ------------------------------

	if (chp('C_TYPE') == "DEL")

	{

		if (ch_lvl('pid') != "")

		{

			$QRY = qry_run("Select * from ms_styles where pid = ".ch_lvl('pid')." AND mainid = ".ch_lvl('more')."");

			if (num_rec($QRY) > 0)

			{

				$rp = fetch_rec($QRY);

				if (file_exists("pictures/".$rp['img1'])) 

				{

					unlink("pictures/".$rp['img1']);

				}

				if (file_exists("pictures/".$rp['img2'])) 

				{

					unlink("pictures/".$rp['img2']);

				}

				if (file_exists("pictures/".$rp['img3'])) 

				{

					unlink("pictures/".$rp['img3']);

				}

			}

			$DEL = qry_run("Delete from ms_styles where pid = ".ch_lvl('pid')." AND mainid = ".ch_lvl('styles')."");

			// Re Ranking -----------

			$rank = 1;

			$RNK = qry_run("select * from ms_styles where pid = ".ch_lvl('pid')." order by ranking");

			if (num_rec($RNK) > 0)

			{

				while($rk = fetch_rec($RNK))

				{

					$UPD = qry_run("Update ms_styles Set ranking = ".$rank." where mainid = ".$rk['mainid']."");

					$rank = $rank + 1;

				}

			}//------ END RANKING -----

			header("Location: more_styles.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

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

		$UPD = qry_run("Update ms_styles Set pshow = '".$P_show."' where mainid = ".ch_lvl('styles')."");

		header("Location: more_styles.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

		die;

	}

}

?>