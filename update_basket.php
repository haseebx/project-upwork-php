<?php 
include "ms-panel/common/param.php";
include "ms-panel/common/func.php";
if (chf('sub_mit') == "Yes")
{
	if (ch_f_int('mmid') > 0)
	{
		$QRYt = qry_run("Select * from ms_prods where pid = ".ch_f_int('pmid')."");
		if (num_rec($QRYt) > 0)
		{
			$rss = fetch_rec($QRYt);
			//if ($rss['stock'] >= ch_f_int('qty') && ch_f_int('qty') >= $rss['moq'])
			//{	
				$UPD = qry_run("Update ms_cart Set qty = ".ch_f_int('qty')." where mainid = ".ch_f_int('mmid')."");
			//}
		}
	}
}
	header("Location: ".$web_url_1."inquiry-basket");
die;
?>