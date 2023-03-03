<?php
include "../common/param.php";
include "../common/func.php";


if($_REQUEST['act'] == "DelCat")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	{
		
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_inquiry WHERE id=".$val) or die(mysqli_error($db_con));
		$check = mysqli_num_rows($check_rs);
		if ($check > 0)
		{
			$msg="";
			$status=0;
		}else{
			$QRY = qry_run("Select * from ms_inquiry where mainid=".$val) or die(mysqli_error($db_con));
			if (num_rec($QRY) > 0)
			{
				while($rp = fetch_rec($QRY))
				{
					if (file_exists("../pictures/".$rp['img1']))
					{
						unlink("../pictures/".$rp['img1']);
					}
				}
			}
			$update=mysqli_query($db_con,"DELETE FROM ms_inquiry WHERE mainid=".$val) or die(mysqli_error($db_con));
			
		}				
		
	}
	header("Location: $web_url/inquiries.php");
	die;
}

?>