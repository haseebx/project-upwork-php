<?php
include "../common/param.php";
include "../common/func.php";

if($_REQUEST['act'] == "DelCat")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_cat WHERE id=".$val) or die(mysqli_error($db_con));
		$check = mysqli_num_rows($check_rs);
		if ($check > 0)
		{
			$msg="First Delete all Sub categories and items from selected category";
			$status=0;
		}else{
			
			$CHK = qry_run("Select * from ms_prods where catid=".$val) or die(mysqli_error($db_con));
			if (num_rec($CHK) > 0)
			{
				$mid=$_REQUEST['mid'];
			header("Location: $web_url/subsection.php?er=Y&mid=$mid&sec=".$_REQUEST['sec']);
			die;
			}else{
				
				$QRY = qry_run("Select * from ms_cat where catid = ".$val) or die(mysqli_error($db_con));
				if (num_rec($QRY) > 0)
				{
				while($rp = fetch_rec($QRY))
				{
				if (file_exists($sub_cat_path.$rp['img1']))
				{
				unlink($sub_cat_path.$rp['img1']);
				}
				if (file_exists($sub_cat_path.$rp['img2']))
				{
				unlink($sub_cat_path.$rp['img2']);
				}
				
				}
				}
			
			$update = mysqli_query($db_con,"DELETE FROM ms_cat WHERE catid = ".$val) or die(mysqli_error($db_con));
			}
		}				
	}$mid=$_REQUEST['mid'];
	header("Location: $web_url/subsection.php?mid=$mid&sec=".$_REQUEST['sec']);
	die;
}

if($_REQUEST['act'] == "UpdCRank")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$update = mysqli_query($db_con,"UPDATE ms_cat SET ranking = '".$_REQUEST["ranking".$val]."' WHERE catid=".$val) or die(mysqli_error($db_con));
	}$mid=$_REQUEST['mid'];
	header("Location: $web_url/subsection.php?mid=$mid&sec=".$_REQUEST['sec']);
	die;
}
?>