<?php 
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
if (chp('LVL') == 1)
{
	if (chp('C_TYPE') == "EDIT")
	{
			$UPD = qry_run("Update ms_social Set facebook = '".chp('facebook')."',twitter = '".chp('twitter')."',instagram = '".chp('instagram')."',pintrest = '".chp('pintrest')."',linkedin = '".chp('linkedin')."',google = '".chp('google')."',skype = '".chp('skype')."' where mainid = ".ch_lvl('mid')."");
			
			
			header("Location: $web_url/social_setting.php?UP=Y");
			die;	
	}
}
?>