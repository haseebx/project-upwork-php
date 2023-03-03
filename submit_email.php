<?php 
include "ms-panel/common/func.php";
include "ms-panel/common/param.php";
if (chf('signup') != "")
{
	if (check_email_address(ch('signup')))
	{
		$QRY = qry_run("Select * from ms_subscribers where pmail = '".chf('signup')."'");
		if (num_rec($QRY) > 0)
		{
			header("Location: ".$web_url_1."submit-newsletter?err=y");
			die;
		}else{
			$INC = qry_run("Insert into ms_subscribers (pname,pmail) values ('".ch('pname')."','".chf('signup')."')");
			$MSG = "";
			$MSG = $MSG . "<strong>Email</strong>: ".$_REQUEST["signup"]."<br>";
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			mail($email_to,"Newsletter ",$MSG,$headers);
			header("Location: ".$web_url_1."submit-newsletter?err=n");
			die;
		}
	}else{
		header("Location: ".$web_url_1."submit-newsletter?err=e");
		die;
	}
}
?>