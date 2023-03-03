<?php 
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
if (chp('LVL') == 1)
{
	if (chp('C_TYPE') == "EDIT")
	{
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
						header("Location: $web_url/password_setting.php?OLD=Y");
						die;
					}
				}
			}
			header("Location: $web_url/password_setting.php?UP=Y");
			die;
	
	}
}
?>