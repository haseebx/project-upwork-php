<?php 
include "../common/param.php";
include "../common/func.php";
$pass = rand(0,99999999);

if (isset($_REQUEST['email']) && $_REQUEST['email'] == "$web_email" )
{
	$UPD_ad = qry_run("Update ms_admin Set ppass = '".md5($pass)."' where mainid = '1'");
	
	$MSG = "";
	$MSG = $MSG . "<strong>Your New Password is</strong> : ".$new_pass."";
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	mail('office@megastudios.com',"Reset Password Request",$MSG,$headers);
	mail($web_email,"Reset Password Request",$MSG,$headers);
	header("Location: ".$web_url."/change_pass.php?id=100");
	die;
}else{
	header("Location: ".$web_url."/change_pass.php?id=101");
	die;
}
?>