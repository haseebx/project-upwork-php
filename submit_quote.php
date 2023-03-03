<?php 
include "ms-panel/common/param.php";
include "ms-panel/common/func.php";
include "live.php";
if (chf('sub_mit') == "Yes")
{
		if (chf('email') != "" && chf('fname') != "" && chf('phone') != "")
		{
				//$pdate = date('d-m-Y')." P: ".$_SERVER['REMOTE_ADDR'];
				$pdate = date('d-m-Y');
				$_SESSION["security_code"] = "";
				$INC = qry_run("Insert into ms_inquiry (fname,address1,address2,phone,mobile,fax,email,country,ptype,stype,message,pdate) Values ('".chf('fname')."','".chf('address1')."','".chf('address2')."','".chf('phone')."','".chf('mobile')."','".chf('fax')."','".chf('email')."','".chf('country')."','".chf('ptype')."','".chf('stype')."','".chf('message')."','".$pdate."')");
				if ($INC)
				{
				 $last_id = mysqli_insert_id($db_con); 
					$CRT = qry_run("Select * from ms_cart where sid = '".$sessionid."' order by mainid");
					if (num_rec($CRT) > 0)
					{
						while($rct = fetch_rec($CRT))
						{
							$INC_Detail = qry_run("Insert into ms_inquiry_detail (mainid,pname,part,pdetail,opt,prate,pid,qty,img1) Values (".$last_id.",'".$rct['pname']."','".$rct['pcode']."','".addslashes($rct['pdetail'])."','".$rct['opt']."',".$rct['prate'].",'".$rct['pid']."',".$rct['qty'].",'".$rct['img1']."')");
						}
					}
					$TXT = "";
$TXT = '<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>HOBEI INTERNATIONAL</title>
<style>
.base{
	font-family:arial;
	font-size:12px;
	font-weight:normal;
	color:#000000;
	text-decoration:none;
}
</style>
</head>
<body>
<table width="600" border="0" cellpadding="4" cellspacing="0" class="base">
  <tr>
    <td>Name:</td>
    <td>'.chf('fname').'</td>
  </tr>
  <tr>
    <td>Address 1:</td>
    <td>'.chf('address1').'</td>
  </tr>
  <tr>
    <td>Address 2:</td>
    <td>'.chf('address2').'</td>
  </tr>
  <tr>
    <td>Phone:</td>
    <td>'.chf('phone').'</td>
  </tr>
  <tr>
    <td>Mobile:</td>
    <td>'.chf('mobile').'</td>
  </tr>
  <tr>
    <td>Fax:</td>
    <td>'.chf('fax').'</td>
  </tr>
  <tr>
    <td>E-mail:</td>
    <td>'.chf('email').'</td>
  </tr>
  <tr>
    <td>Country:</td>
    <td>'.chf('country').'</td>
  </tr>
  <tr>
    <td>Payment Type:</td>
    <td>'.chf('ptype').'</td>
  </tr>
  <tr>
    <td>Shipping Type:</td>
    <td>'.chf('stype').'</td>
  </tr>
  <tr>
    <td>Message&nbsp;/ 
    Comments:</td>
    <td>'.chf('message').'</td>
  </tr>
  <tr>
    <td width="162">&nbsp;</td>
    <td width="422">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="4" cellspacing="0" class="base">
      <tr>
        <td width="20%" style="border-bottom:solid 1px #CCC;"><strong>Image</strong></td>
        <td width="64%" style="border-bottom:solid 1px #CCC;"><strong>Product Detail </strong></td>
        <td width="16%" style="border-bottom:solid 1px #CCC;"><strong>Quantity</strong></td>
      </tr>';
	  
	  $CRT = qry_run("Select * from ms_cart where sid = '".$sessionid."' order by mainid");
	if (num_rec($CRT) > 0)
	{
		while($rct = fetch_rec($CRT))
		{
$TXT = $TXT . '<tr>
        <td><img src="'.$web_url_1.'items/products/'.$rct['img1'].'" width="100"></td>
        <td>'.$rct['pname'].'<br>'.$rct['pcode'].'<br>'.$rct['opt'].'</td>
        <td>'.$rct['qty'].'</td>
      </tr>';
	  	}
	}
	  
$TXT = $TXT . '    </table></td>
  </tr>
</table>
</body>
</html>';
					$DEL_CART = qry_run("Delete from ms_cart where sid = '".$sessionid."'");
					//$txt = "You have received an Inquiry for price quote.....";
					//if ($SEND_MAIL == "Yes")
					//{
						$subject = "Inquiry ID: $last_id ($web_name)";
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
						$headers .= 'From: <'.chf('email').'>' . "\r\n";
						mail($email_to, $subject, $TXT, $headers);
						mail($_REQUEST["email"], $subject, $TXT, $headers);
					//}
					header("Location: ".$web_url_1."submit-inquiry");
					die;
				}else{
					echo mysql_error();
					die;
				}
		}else{
			header("Location: ".$web_url_1."quote-request");
			die;
		}
}
?>