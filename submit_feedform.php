<?php
include "ms-panel/common/param.php";
include "ms-panel/common/func.php";
if ($_REQUEST['pname'] != "" && $_REQUEST["email"] != "" && $_REQUEST["message"] != "")
{
	$MSG = "";
	$MSG = $MSG . "<strong>Feedback Form <?=$web_name;?></strong><br>----------------------------------<br>";
	$MSG = $MSG . "<strong>Name</strong>: ".$_REQUEST["pname"]."<br>";
	$MSG = $MSG . "<strong>Compny</strong>: ".$_REQUEST["compny"]."<br>";
	$MSG = $MSG . "<strong>Cell</strong>: ".$_REQUEST["cell"]."<br>";
	$MSG = $MSG . "<strong>Email</strong>: ".$_REQUEST["email"]."<br>";
	$MSG = $MSG . "<strong>Message</strong>: ".$_REQUEST["message"]."<br>";
	
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	mail($email_to,"Feedback Form",$MSG,$headers);
	mail($_REQUEST["email"],"Feedback Form",$MSG,$headers);
	header("Location: ".$web_url_1."submit-inquiry");
	die;
}else{
	header("Location: ".$web_url_1."submit-inquiry");
}
?>