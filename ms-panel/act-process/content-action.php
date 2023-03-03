<?php
include "../common/param.php";
include "../common/func.php";


if($_REQUEST['act'] == "DelCat")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	{
		
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_contents WHERE id=".$val) or die(mysqli_error($db_con));
		$check = mysqli_num_rows($check_rs);
		if ($check > 0)
		{
			$msg="";
			$status=0;
		}else{
			$QRY = qry_run("Select * from ms_contents where mainid=".$val) or die(mysqli_error($db_con));
			if (num_rec($QRY) > 0)
			{
				while($rp = fetch_rec($QRY))
				{
					if (file_exists($pages_path.$rp['img1']))
					{
						unlink($pages_path.$rp['img1']);
					}
				}
			}
			$update=mysqli_query($db_con,"DELETE FROM ms_contents WHERE mainid=".$val) or die(mysqli_error($db_con));
			
		}				
		
	}
	header("Location: $web_url/content.php");
	die;
}

if($_REQUEST['act'] == "UpdCRank")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$update = mysqli_query($db_con,"UPDATE ms_contents SET ranking = '".$_REQUEST["ranking".$val]."' WHERE mainid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/content.php");
	die;
}
?>