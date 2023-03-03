<?php 
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
if (chp('LVL') == 1)
{
	if (chp('C_TYPE') == "EDIT")
	{
			$UPD = qry_run("Update ms_webs Set web_name = '".chp('web_name')."',web_title = '".chp('web_title')."',web_url_2 = '".chp('web_url_2')."',web_url = '".chp('web_url')."',web_email = '".chp('web_email')."',phone = '".chp('phone')."',mobile = '".chp('mobile')."',fax = '".chp('fax')."',address = '".chp('address')."',email_to = '".chp('email_to')."',owner_name = '".chp('owner_name')."',copy_right = '".chp('copy_right')."',design_develop = '".chp('design_develop')."' where mainid = ".ch_lvl('mid')."");
			
			if (chp('new_pass') != "")
			{
				$QRY_ad = qry_run("Select * from ms_admin");
				if (num_rec($QRY_ad) > 0)
				{
					$qrad = fetch_rec($QRY_ad);
					if (md5(chp('old_pass')) == $qrad['ppass'])
					{
						$UPD_ad = qry_run("Update ms_admin Set plogin = '".md5('admin')."',ppass = '".md5(chp('new_pass'))."' where mainid = ".ch_lvl('mid')."");
					}else{
						header("Location: $web_url/web_setting.php?OLD=Y");
						die;
					}
				}
			}
			header("Location: $web_url/web_setting.php?UP=Y");
			die;	
	}
}
?>