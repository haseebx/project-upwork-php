<?php  

include "common/param.php";

include "common/func.php";

include "common/chk_login.php";





if (chp('C_TYPE') == "EDIT")



	{



		if (chp('pname') != "")



		{



			//------- UPLOAD ----------------------------------------



			$last_id = ch_lvl('mid');



			$img1 = "";



			$pic1 = $last_id."_pic_1.";



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



			$img2 = "";



			$pic2 = $last_id."_pic_2.";



			if (ch_file('img2') == "Yes")



			{



				$ext = do_file('img2',$pic2,$sub_path);



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



			$pic3 = $last_id."_pic_3.";



			if (ch_file('img3') == "Yes")



			{



				$ext = do_file('img3',$pic3,$sub_path);



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



			$pic4 = $last_id."_pic_4.";



			if (ch_file('img4') == "Yes")



			{



				$ext = do_file('img4',$pic4,$sub_path);



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



			$UPD = qry_run("Update ms_main Set pname = '".chhtml('pname')."',pdetail = '".chhtml('pdetail')."',pshow = '".ch_chkb('pshow')."',plink = '".chhtml('plink')."',ptitle = '".chhtml('ptitle')."',pmeta = '".chhtml('pmeta')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',img1 = '".$img1."',img2 = '".$img2."',img3 = '".$img3."',img4 = '".$img4."' where mainid = ".ch_lvl('mid')."");



			header("Location: main.php");



			die;	



		}



	}



?>