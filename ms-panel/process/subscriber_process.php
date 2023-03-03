<?php 
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php";
if (chp('LVL') == 1)
{
	if (chp('C_TYPE') == "NEW")
	{
		if (chp('email') != "")
		{
			$QRY = qry_run("select * from ms_subscribers where pmail = '".chp('email')."'");
			if (num_rec($QRY) > 0)
			{
				?>
				<script language="JavaScript">
				alert ("This Subscriber already in OUR DATABASE");
				history.go(-1);
				</script>
				<?php
				header("Location: subscriber.php?".ch_session('RTN_STRs'));
				die;
			}else{
					$group = explode("^",chp('group'));
					$INC = qry_run("Insert into ms_subscribers (pname,pmail,pshow,group_id,group_name) Values('".ch('pname')."','".chp('email')."','".ch_chkb('pshow')."',".$group[0].",'".$group[1]."')");
					if (!$INC)
					{
						echo mysqli_error($db_con);
						die;
					}else{
						$last_id = mysqli_insert_id($db_con);
						header("Location: $web_url/subscriber.php?".ch_session('RTN_STRs'));
						die;
					}
			}
		}
	}
	//------- NEW END ------------
	if (chp('C_TYPE') == "EDIT")
	{
		if (chp('email') != "")
		{
			$group = explode("^",chp('group'));
			$UPD = qry_run("Update ms_subscribers Set pname = '".ch('pname')."',pmail = '".ch('email')."',group_id=".$group[0].",group_name='".$group[1]."',pshow = '".ch_chkb('pshow')."' where mainid = ".ch_lvl('mid')."");
			header("Location: $web_url/subscriber.php?".ch_session('RTN_STRs'));
			die;	
		}
	}
	//------ EDIT END ------------------------------
	if (chp('C_TYPE') == "DEL")
	{
		if (ch_lvl('mid') != "")
		{
			$DEL = qry_run("Delete from ms_subscribers where mainid = ".ch_lvl('mid')."");
			
			header("Location: $web_url/subscriber.php?".ch_session('RTN_STRs'));
			die;
		}
	}
	
}
?>