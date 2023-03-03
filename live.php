<?php



if (isset($_REQUEST["live"]))

{

//list($mid,$sid,$cid,$pid) = split("-",$_REQUEST["live"]);

$Livess = explode("_",$_REQUEST["live"]);

$mid = intval($Livess[0]);

$sid = intval($Livess[1]);

$cid = intval($Livess[2]);

$pid = intval($Livess[3]);

}else{



$mmName = rpd($_REQUEST['mId']);

$ssName = rpd($_REQUEST['sId']);

$ccName = rpd($_REQUEST['cId']);

$ppArt = $_REQUEST['pArt'];



if(isset($mmName)){

$sql801 = qry_run("SELECT * FROM ms_main WHERE plink='$mmName'");

	if(num_rec($sql801)>0){

	$rec801 = fetch_rec($sql801);

	$mmID801 = $rec801['mainid'];

	$mmName801 = $rec801['pname'];

	}else{

	$mmID801 = 0;

	}

}



if(isset($ssName)){

$sql802 = qry_run("SELECT * FROM ms_section WHERE plink='$ssName' AND mainid='$mmID801'")or die(mysql_error());

	if(num_rec($sql802)>0){

	$rec802 = fetch_rec($sql802);

	$ssID802 = $rec802['secid'];

	$ssName802 = $rec802['pname'];

	}else{

	$ssID802 = 0;

	}

}



if(isset($ccName)){

$sql804 = qry_run("SELECT * FROM ms_cat WHERE plink='$ccName' AND secid='$ssID802'")or die(mysql_error());

	if(num_rec($sql804)>0){

	$rec804 = fetch_rec($sql804);

	$ccID804 = $rec804['catid'];

	$ccName804 = $rec804['pname'];

	}else{

	$ccID804 = 0;

	}

}

if(isset($ppArt)){

$sql803 = qry_run("SELECT * FROM ms_prods WHERE part='$ppArt'")or die(mysql_error());

	if(num_rec($sql803)>0){

	$rec803 = fetch_rec($sql803);

	$ppID803 = $rec803['pid'];

	}else{

	$ppID803 = 0;

	}

}









$mid = $mmID801;

$sid = $ssID802;

$cid = $ccID804;

$kid = 0;

$pid = $ppID803;

}

$M_head = "";

$M_phead = "";

$M_keywords = "";

$M_desc = "";

$M_Detail = "";

$M_QRy = qry_run("Select * from ms_main where mainid = ".$mid."");

if (num_rec($M_QRy) > 0)

{

	$M_rs = fetch_rec($M_QRy);

	$M_head = $M_rs['pname'];

	$M_slug = $M_rs['plink'];

	$M_Detail = $M_rs['pdetail'];

	

	

	$phead = $M_rs['phead'];

	

	$M_keywords = $M_rs['keywords'];

	$M_desc = $M_rs['description'];

	$M_img = $M_rs['img1'];

	$menu = $M_rs['img2'];

}



$S_head = "";

$M_QRy = qry_run("Select * from ms_section where secid = ".$sid."");

if (num_rec($M_QRy) > 0)

{

	$M_rs = fetch_rec($M_QRy);

	$S_head = $M_rs['pname'];

	$S_slug = $M_rs['plink'];

	$M_phead = $M_rs['pname'];

	$M_Detail = $M_rs['pdetail'];

	$S_phead = $M_rs['phead'];

	$M_keywords = $M_rs['keywords'];

	$M_desc = $M_rs['description'];

}

$C_head = "";

$C_Detail = "";

$M_QRy = qry_run("Select * from ms_cat where catid = ".$cid."");

if (num_rec($M_QRy) > 0)

{

	$M_rs = fetch_rec($M_QRy);

	$C_head = $M_rs['pname'];

	$C_Detail = $M_rs['pdetail'];

	$C_slug = $M_rs['plink'];



	$M_phead = $M_rs['pname'];

	if ($M_rs['phead'] != "")

	{

		$M_phead = $M_rs['phead'];

	}

	$M_keywords = $M_rs['keywords'];

	$M_desc = $M_rs['description'];

}

$P_head = "";

$P_RANKING = 0;





/*$M_QRy = qry_run("Select * from ms_kat where katid = ".$kid."");

if (num_rec($M_QRy) > 0)

{

	$M_rs = fetch_rec($M_QRy);

	$K_head = $M_rs['pname'];

	$K_Detail = $M_rs['pdetail'];

	$M_phead = $M_rs['pname'];

	if ($M_rs['phead'] != "")

	{

		$M_phead = $M_rs['phead'];

	}

	$M_keywords = $M_rs['keywords'];

	$M_desc = $M_rs['description'];

}

$P_head = "";

$P_RANKING = 0;

*/



if(isset($pid)){

//$P_QRy = qry_run("Select * from ms_prods where mainid = ".$mid." AND secid = ".$sid." AND catid = ".$cid." AND pid = ".$pid."");

$P_QRy = qry_run("Select * from ms_prods where pid = ".$pid."");







if (num_rec($P_QRy) > 0)

{

	$P_rs = fetch_rec($P_QRy);

	$P_head = $P_rs['pname'];

	$P_RANKING = $P_rs['ranking'];

	if ($P_rs['phead'] != "")

	{

		$M_phead = $P_rs['phead'];

	}

	$M_keywords = $P_rs['keywords'];

	$M_desc = $P_rs['description'];

}

}

$B_name = "";

$B_location = "";

$B_detail = "";

$BID = 55555;

if (isset($_REQUEST["bid"]) || ch_session('BRAND_id') > 0)

{

	if (ch_lvl('bid') > 0)

	{

		$BID = intval($_REQUEST["bid"]);

	}else{

		$BID = intval(ch_session('BRAND_id'));

	}



	$QRY_b = qry_run("select * from ms_brands where mainid = ".$BID." AND pshow = 'Yes' order by ranking");

	if (num_rec($QRY_b) > 0)

	{

		$rs_b = fetch_rec($QRY_b);

		$B_name = $rs_b['bname'];

		$B_location = $rs_b['location'];

		$B_detail = $rs_b['bdetail'];

		if ($rs_b['phead'] != "")

		{

			$M_phead = $rs_b['phead'];

		}

		$M_keywords = $rs_b['keywords'];

		$M_desc = $rs_b['description'];

	}

}

?>