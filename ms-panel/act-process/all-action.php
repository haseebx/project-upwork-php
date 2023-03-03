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
			$msg = "First Delete all Sub categories and items from selected category";
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
			$update = mysqli_query($db_con,"DELETE FROM ms_prods WHERE pid=".$val) or die(mysqli_error($db_con));
			
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
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "UpdCRank")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$update = mysqli_query($db_con,"UPDATE ms_prods SET ranking = '".$_REQUEST["ranking"]."' WHERE mainid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "Active")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$UPD = mysqli_query($db_con,"Update ms_prods Set pshow = 'Yes' where pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "Unactive")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$UPD = mysqli_query($db_con,"Update ms_prods Set pshow = 'No' where pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "Featured")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$UPD = mysqli_query($db_con,"Update ms_prods Set feature = 'Yes' where pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "Special")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$UPD = mysqli_query($db_con,"Update ms_prods Set special = 'Yes' where pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "New")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$UPD = mysqli_query($db_con,"Update ms_prods Set new = 'Yes' where pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "UnFeatured")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$UPD = mysqli_query($db_con,"Update ms_prods Set feature = 'No' where pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "UnSpecial")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$UPD = mysqli_query($db_con,"Update ms_prods Set special = 'No' where pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}

if($_REQUEST['act'] == "UnNew")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	//echo $val;
	//die;
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		$UPD = mysqli_query($db_con,"Update ms_prods Set new = 'No' where pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/all-products.php");
	die;
}
?>