<?php
include "../common/param.php";
include "../common/func.php";

if($_REQUEST['act'] == "DelCat")
{
	while(list($key,$val) = each($_REQUEST["Chk"]))
	{
		$check_rs = mysqli_query($db_con,"SELECT * FROM ms_prods WHERE id=".$val) or die(mysqli_error($db_con));
		
		$UPD = mysqli_query($db_con,"Update ms_prods Set new = 'No' where pid=".$val) or die(mysqli_error($db_con));
		//$update = mysqli_query($db_con,"DELETE FROM ms_prods WHERE pid=".$val) or die(mysqli_error($db_con));
	}
	header("Location: $web_url/new.php");
	die;
}
?>