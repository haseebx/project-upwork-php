<?php
include "../common/param.php";
include "../common/func.php";


if($_REQUEST['act'] == "DelCat")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_main WHERE id=".$val) or die(mysqli_error($db_con));
		$check = mysqli_num_rows($check_rs);
		if ($check > 0)
		{
			$msg="First Delete all Sub categories and items from selected category";
			$status=0;
		}else{
			$CHK = mysqli_query($db_con,"Select * from ms_section where mainid = ".$val) or die(mysqli_error($db_con));
			if (mysqli_num_rows($CHK) > 0)
			{
				header("Location: $web_url/main.php?er=Y");
				die;
			}else{
			
			$QRY = qry_run("Select * from ms_main where mainid=".$val) or die(mysqli_error($db_con));
			if (num_rec($QRY) > 0)
			{
			while($rp = fetch_rec($QRY))
			{
				if (file_exists($cat_path.$rp['img1']))
				{
					unlink($cat_path.$rp['img1']);
				}
				if (file_exists($cat_path.$rp['img2']))
				{
					unlink($cat_path.$rp['img2']);
				}
				
			}
			}
			
			$update = mysqli_query($db_con,"DELETE FROM ms_main WHERE mainid = ".$val) or die(mysqli_error($db_con));
			}				
		}
	}
	header("Location: $web_url/main.php");
	die;
}

if($_REQUEST['act'] == "UpdCRank")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$update = mysqli_query($db_con,"UPDATE ms_main SET ranking = '".$_REQUEST["ranking".$val]."' WHERE mainid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/main.php");
	die;
}
?>