<?php 
include "ms-panel/common/param.php";
include "ms-panel/common/func.php";
include "live.php";
if (chf('sub_mit') == "Yes")
{$cont = $_REQUEST['cont'];$cont1 = $cont; 
	if (ch_f_int('qty') > 0)
	{
		$Opt_val_1 = "";
		$Opt_val_2 = "";
		$Opt_1 = "";
		if (ch('opt1') != "")
		{
			$OPT = qry_run("Select * from ms_prod_opt where sid = ".ch_f_int('opt1')."");
			if (num_rec($OPT) > 0)
			{
				$rsp = fetch_rec($OPT);
				$Opt_val_1 = $rsp['pname'];
			}
		}
		if (ch('opt2') != "")
		{
			$OPT = qry_run("Select * from ms_prod_opt where sid = ".ch_f_int('opt2')."");
			if (num_rec($OPT) > 0)
			{
				$rsp = fetch_rec($OPT);
				$Opt_val_2 = $rsp['pname'];
			}
		}
		if ($Opt_val_1 != "")
		{
			if ($Opt_val_2 != "")
			{
				$Opt_1 = $Opt_val_1.",".$Opt_val_2;
			}else{
				$Opt_1 = $Opt_val_1;
			}
		}else{
			if ($Opt_val_2 != "")
			{
				$Opt_1 = $Opt_val_2;
			}else{
				$Opt_1 = "";
			}
		}
		$SRC = qry_run("Select * from ms_cart where pid = ".$pid." AND sid = '".$sessionid."'");
		if (num_rec($SRC) > 0)
		{
			$UPD = qry_run("Update ms_cart Set qty = ".ch_f_int('qty').",opt = '".$Opt_1."' where pid = ".$pid." AND sid = '".$sessionid."'");
			if (!$UPD)
			{
				echo mysql_error();
				die;
			}
		}else{
			$PROD = qry_run("Select * from ms_prods where pid = ".$pid."");
			if (num_rec($PROD) > 0)
			{
				$prd = fetch_rec($PROD);
					$QRY = qry_run("Insert into ms_cart (pid,sid,live,pname,opt,pdetail,sdetail,prate,pcode,qty,img1,contlink) VALUES (".$pid.",'".$sessionid."','".chf('live')."','".$prd['pname']."','".$Opt_1."','".$prd['pdetail']."','".$prd['sdetail']."',".$prd['prate'].",'".$prd['part']."','".ch_f_int('qty')."','".$prd['img1']."','".$cont1."')");
					if (!$QRY)
					{
						echo mysql_error();
						die;
					}
			}
		}
	}else{
		header("Location: products.php?live=".chf('live'));
		die;
	}
}
header("Location: ".$web_url_1."inquiry-basket");
die;
?>