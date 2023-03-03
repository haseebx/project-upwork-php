<?php 
include "ms-panel/common/param.php";
include "ms-panel/common/func.php";
if (chf('cid') != "")
{
	$DEL = qry_run("Delete from ms_cart where mainid = ".intval(ch_f_int('cid'))."");
}
header("Location: ".$web_url_1."inquiry-basket");
die;
?>