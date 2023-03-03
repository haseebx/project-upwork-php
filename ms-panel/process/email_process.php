<?php 
include "param.php";
include "func.php";
include "chk_login.php";
if (chp('LVL') == 1)
{
	if (chp('C_TYPE') == "EDIT")
	{
			$UPD = qry_run("Update ms_webs Set email_type = '".chp('email_type')."',from_email = '".chp('from_email')."',email_user = '".chp('email_user')."',email_pass = '".md5_salt_hash(chp('email_pass'))."',mail_server = '".chp('mail_server')."',port = '".chp('port')."' where mainid = ".ch_lvl('mid')."");
			
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
						header("Location: web_setting.php?OLD=Y");
						die;
					}
				}
			}
			header("Location: email_setting.php?UP=Y");
			die;	
	}
}
?>