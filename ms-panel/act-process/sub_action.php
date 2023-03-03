<?php
include "../common/param.php";
include "../common/func.php";

if($_REQUEST['act'] == "DelCat")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_section WHERE id=".$val) or die(mysqli_error($db_con));
		$check = mysqli_num_rows($check_rs);
		if ($check > 0)
		{
			$msg="First Delete all Sub categories and items from selected category";
			$status=0;
		}else{
			
			$CHK = qry_run("Select * from ms_prods where secid=".$val) or die(mysqli_error($db_con));
			if (num_rec($CHK) > 0)
			{
			header("Location: secions.php?er=Y&mid=".$_REQUEST['mid']);
			die;
			}else{
				
				$QRY = qry_run("Select * from ms_section where secid = ".$val) or die(mysqli_error($db_con));
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
			
			$update = mysqli_query($db_con,"DELETE FROM ms_section WHERE secid = ".$val) or die(mysqli_error($db_con));
			}
		}				
	}
	header("Location: $web_url/secions.php?mid=".$_REQUEST['mid']);
	die;
}

if($_REQUEST['act'] == "UpdCRank")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$update = mysqli_query($db_con,"UPDATE ms_section SET ranking = '".$_REQUEST["ranking".$val]."' WHERE secid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/secions.php?mid=".$_REQUEST['mid']);
	die;
}
?>