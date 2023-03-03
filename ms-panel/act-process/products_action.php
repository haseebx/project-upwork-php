<?php
include "../common/param.php";
include "../common/func.php";

if($_REQUEST['act'] == "DelCat")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$check = mysqli_num_rows($check_rs);
		if ($check > 0)
		{
			$msg="First Delete all Sub categories and items from selected category";
			$status=0;
		}else{
			$QRY = qry_run("Select * from ms_prods where pid=".$val) or die(mysqli_error($db_con));
			if (num_rec($QRY) > 0)
			{
			while($rp = fetch_rec($QRY))
			{
				if (file_exists($prd_path.$rp['img1']))
				{
					unlink($prd_path.$rp['img1']);
				}
				if (file_exists($prd_path.$rp['img2']))
				{
					unlink($prd_path.$rp['img2']);
				}
				if (file_exists($prd_path.$rp['img3']))
				{
					unlink($prd_path.$rp['img3']);
				}
			}
			}
			$update=mysqli_query($db_con,"DELETE FROM ms_prods WHERE pid=".$val) or die(mysqli_error($db_con));
		}				
		if ($update)
		{
			$msg = "Category Deleted Successfuly";
			$status = 1;
		}else{
			$msg = "First Delete all Sub categories and items from selected category";
			$status = 0;	
		}
	}
	header("Location: $web_url/prods.php?mid=".$_REQUEST['mid']."&sec=".$_REQUEST['sec']."&cat=".$_REQUEST['cat']);
	die;
}

if($_REQUEST['act'] == "UpdCRank")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$update = mysqli_query($db_con,"UPDATE ms_prods SET ranking = '".$_REQUEST["ranking".$val]."' WHERE pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/prods.php?mid=".$_REQUEST['mid']."&sec=".$_REQUEST['sec']."&cat=".$_REQUEST['cat']);
	die;
}
if($_REQUEST['act'] == "MoveCopy")
{	

$mid = $_REQUEST['mid'];
$sec = $_REQUEST['sec'];
$cat = $_REQUEST['cat'];
	header("Location: $web_url/process/move_prods.php?mid=$mid&sec=$sec&cat=$cat&pid=".$_REQUEST['pid']);
	die;
}
?>