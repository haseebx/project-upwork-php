<?php
error_reporting(E_ALL & ~E_NOTICE);

$db = new Settings;
$db_con= mysqli_connect($db->DATABASE['host'], $db->DATABASE['username'], $db->DATABASE['password'], $db->DATABASE['database']) or die ('Err connection:'.mysqli_connect_errno() );


function rps($string) {
    $string = str_replace("-", " ", $string);
    return $string;
}
function rpd($string) {
    $string = str_replace(" ", "-", $string);
    return $string;
}

function qry_run($qry){	

    global $db_con;
	
	$QrY = mysqli_query($db_con, $qry);
	if ($QrY)
	{
		return $QrY;
	}else{
		echo mysqli_error($db_con);
		die;
	}
}
function num_rec($qry){	
	return mysqli_num_rows($qry);
}
function ch_chkb($val){	if (isset($_REQUEST[$val]))	{		return $_REQUEST[$val];	}else{		return "No";	}}
function fetch_rec($qry){	
	return mysqli_fetch_array($qry);
}
function fetch_val($qry){
    global $db_con;
  if(strpos(strtoupper($qry), 'LIMIT') === false) {
    $qry .= " LIMIT 1";
  }
  $query = mysqli_query($db_con, $qry);
  $row = mysqli_fetch_array($query);
  return $row[0];
}
function esc_string($str)
{
	return md5("Mega_".$str."_Studio");
}
function ch_lvla($val)
{	
	global $db_con;
		if (is_numeric($val))
		{
			return mysqli_real_escape_string($db_con,intval($val));
		}else{
			return 0;
		}
}
function ch_lvl($val)
{	
	global $db_con;
	
	if (isset($_REQUEST[$val]))	
	{		
		if (is_numeric($_REQUEST[$val]))
		{
			return mysqli_real_escape_string($db_con,$_REQUEST[$val]);
		}else{
			return 0;
		}
	}else{		
		return 0;	
	}
}
function ch_page($val){
	global $db_con;
	if (isset($_REQUEST[$val]))	{		if (is_numeric($_REQUEST[$val]))		{			
		$array = array('update','select','delete','ms_users','ms_main','ms_prods','ms_admin','union');
		$pvalue = mysqli_real_escape_string($db_con,$_REQUEST[$val]);
		return str_ireplace($array,"",$pvalue);		
}else{			return 1;		}	}else{		return 1;	}}
function ch_p($val)
{	
	global $db_con;
	if (isset($_REQUEST[$val]))	
	{		
		$array = array('http','update','select','delete','ms_users','ms_main','ms_prods','ms_admin','union');
		$pvalue = mysqli_real_escape_string($db_con,$_REQUEST[$val]);
		return str_ireplace($array,"",$pvalue);	
	}else{		
		return "";	
	}
}
function ch_a($val)
{	
	global $db_con;
		$pvalue = mysqli_real_escape_string($db_con,$val);
		return $pvalue;	
}
function chf($val)
{	
	global $db_con;
	
	if (isset($_REQUEST[$val]))	
	{		
		$array = array('update','select','delete','ms_users','ms_main','ms_prods','ms_admin','union');
		$pvalue = mysqli_real_escape_string($db_con,$_REQUEST[$val]);
		return str_ireplace($array,"",$pvalue);	
	}else{		
		return "";	
	}
}
function ch_f_int($val)
{	
	global $db_con;
	
	if (isset($_REQUEST[$val]))	
	{		
		if (is_numeric($_REQUEST[$val]))
		{
			return mysqli_real_escape_string($db_con,intval($_REQUEST[$val]));
		}else{
			return 0;
		}
	}else{		
		return 0;	
	}
}
function go_dps()
{
	$dps = "";
	$VLD = qry_run("Select * from ms_webs");
	if (num_rec($VLD) > 0)
	{
		$vl = fetch_rec($VLD);
		$dps = $vl['idps'];
	}
	return $dps;
}
function ch_session($val)
{	
	if (isset($_SESSION[$val]))	
	{		
		return $_SESSION[$val];	
	}else{		
		return "";	
	}
}
function val_session($val)
{	
	if (isset($_SESSION[$val]))	
	{		
		return $_SESSION[$val];	
	}else{		
		return 0;	
	}
}
function chk()
{
	return substr(md5($_SERVER['HTTP_HOST']), 0, 20);
}
function ch_input($val)
{	
	if (isset($_REQUEST[$val]))	
	{		
		return $_REQUEST[$val];	
	}else{		
		return "";	
	}
}
function ch($val)
{	
	if (isset($_REQUEST[$val]))	
	{		
		return $_REQUEST[$val];	
	}else{		
		return "";	
	}
}
function chps($val)
{	
	global $db_con;
	if (isset($_REQUEST[$val]))	

	{		

		return mysqli_real_escape_string($db_con,$_REQUEST[$val]);	

	}else{		

		return "";	

	}

}

function chp($val)
{	

	if (isset($_REQUEST[$val]))	

	{		

		return $_REQUEST[$val];	

	}else{		

		return "";	

	}

}

function chk_dps()

{

	$chk = chk();

	$dps = go_dps();

	$Opn = "Yes";

	if ($dps != "")

	{

	$opt = explode(",",$dps);

	$tlt_rec =  count($opt);

		if ($tlt_rec > 0)

		{

			for ($i=1; $i<=$tlt_rec; $i++)

			{

				if ($opt[$i-1] == $chk)

				{

					$Opn = "Yes";

				}

			}

		}

	}

	if ($Opn == "No")

	{

		die;

	}

}

function stp($val)
{	

	return stripslashes($val);	

}

function chhtml($val)

{	

	if (isset($_REQUEST[$val]))	

	{		

		return htmlspecialchars($_REQUEST[$val],ENT_QUOTES);	

	}else{		

		return "";	

	}

}

function ch_file($val)

{	

	if (isset($_FILES[$val]))	

	{		

	$file = $_FILES[$val]['name'];		

		if ($file != "")		

		{		

			return "Yes";		

		}else{		

			return "";		

		}	

	}else{		

		return "";	

	}

}

chk_dps();

function banner($ids)

{

	$QRY = qry_run("select * from ms_banners where mainid = ".$ids."");

	if (num_rec($QRY) > 0)

	{

		$rs = fetch_rec($QRY);

		$result = "";

		if ($rs['plink'] == "")

		{

			$result = '<img src="admin/pictures/'.$rs["img1"].'">';

		}else{

			$result = '<a href="'.$rs["plink"].'" title="'.$rs["pname"].'"><img src="admin/pictures/'.$rs["img1"].'" border=0></a>';

		}

		echo $result;

		//die;

		//return $result;

	}else{

		return "";

	}

}

function up_file($img,$filep)

{	

	$file = $_FILES[$img]['name'];	

	if ($file != ""){	

		if(move_uploaded_file($_FILES[$img]['tmp_name'],$filep));	

	}	

}

	

function do_file($img,$filen,$filep)

{	

	$file = $_FILES[$img]['name'];	

	if ($file != ""){		

	$path_parts = pathinfo($file);		

	$ext=strtolower($path_parts['extension']);		

	$filename_path=$filep."".$filen."".$ext;		

	$simg = $filen."".$ext;		

		if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif" || $ext == "psd" || $ext == "cdr" || $ext == "ai" || $ext == "swf" || $ext == "pdf" || $ext == "eps" || $ext == "txt")

		{

			up_file($img,$filename_path);		

			$ext = strtolower($ext);

			return $ext;

		}else{

			return "No";

		}	

	}

}

chk_dps();

function query_rank($lvl,$sub)
{	
global $db_con;

	$rank_q = mysqli_query($db_con,"Select * from ms_main where subid = ".$sub." order by ranking");	

	if ($rank_q){		

	$num_rs = num_rec($rank_q);		

		if ($num_rs > 0)		

		{			

		$rank = 0;			

			while ($rs = mysqli_fetch_array($rank_q))			

			{				

				$rank = $rs['ranking'];			

			}			

			return $rank + 1;		

		}else{			

		return 1;		

		}	

	}

}

class shahzad {		

	function setqry($val){		

		return $val;	

	}		

	function getqry($val){		
		global $db_con;
		
		return mysqli_query($db_con,$val);	

	}	 	

	function num_rec($val){		

		return mysqli_num_rows($val);	

	}

}
$Table_Set_r = "<tr>";
$Table_Set_d = "<td";
class Settings {	
var $DATABASE = array(	'database' => 'hobeiintl_Int8KjtnLrMtnK', 'username' => 'hobeiintl_HkLrkMNrlNRR23', 'password' => 'k)l9[oCU-s)u', 'host' => 'localhost' );
var $TABLES = array( 	'users' => 'ms_admin','products' => 'ms_products' ); 	
}
function shdate($date)

{

	if ($date != "")

	{

		$pieces = explode("-", $date);

		return $pieces[2]."-".$pieces[1]."-".$pieces[0];

	}else{

		return "";

	}

}


function check_email_address($email) {

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
	      return false;
   }
   
    else{
	   return true;
   }


}
function wholesale($ppids)

{

	$wholesale = 0;

	$QRYp = qry_run("select * from ms_prods where pid = ".$ppids."");

	if (num_rec($QRYp) > 0)

	{

		$rsp = fetch_rec($QRYp);

		if (ch_session('M_Login') == "Yes" && ch_session('M_Login_group_id') == "1")

		{

			if ($rsp['whole_sale_rate'] > 0)

			{

				$wholesale = $rsp['whole_sale_rate'];

			}else{

				$wholesale = $rsp['prate'];

			}

		}else{

			$wholesale = $rsp['prate'];

		}

	}

	return $wholesale;

}

function group_dist($custid,$prate)

{

	$Groupid = 0;

	$QRYm = qry_run("Select * from ms_members where mainid = ".$custid."");

	if (num_rec($QRYm) > 0)

	{

		$rsm = fetch_rec($QRYm);

		$Groupid = $rsm['group_id'];

	}

	$Dist_rate = 0;

	$QRYg = qry_run("select * from ms_group where mainid = ".$Groupid."");

	if (num_rec($QRYg) > 0)

	{

		$rsg = fetch_rec($QRYg);

		if ($rsg['dist_opt'] == "Percentage Discount")

		{

			$Dist_rate = $rsg['dist_rate'];

		}

	}

	if ($Dist_rate > 0 && $prate > 0)

	{

		$P_RATEe = $prate - ($prate * $Dist_rate) / 100;

	}else{

		$P_RATEe = $prate;

	}

	return $P_RATEe;

}


function imagecreatefromfile($image_path) {

	list($width, $height, $image_type) = getimagesize($image_path);

	switch ($image_type)

	{

	  case IMAGETYPE_GIF: return imagecreatefromgif($image_path); break;

	  case IMAGETYPE_JPEG: return imagecreatefromjpeg($image_path); break;

	  case IMAGETYPE_PNG: return imagecreatefrompng($image_path); break;

	  default: return ''; break;

	}

}

function cr_image($img,$SIZE,$size_type,$ext,$new,$path)

{

	$file = $path.$img;

	list($width, $height) = getimagesize($file);

	$thumb_size = $SIZE;

	if ($width >= $height)

	{

		if ($width > $thumb_size)

		{

			$modwidth = $thumb_size;

		}else{

			$modwidth = $width;

			$thumb_size = $width;

		}

		$modheight = floor( $height * ( $thumb_size / $width ) );

	}

	if ($height > $width)

	{

		if ($height > $thumb_size)

		{

			$modheight = $thumb_size;

		}else{

			$modheight = $height;

			$thumb_size = $height;

		}

		$modwidth = floor( $width * ( $thumb_size / $height ) );

		

	}

	 $tn = imagecreatetruecolor($modwidth, $modheight);

	 $image = imagecreatefromjpeg($file); 

	 imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height);

	 imagejpeg($tn, $path.$new.$ext, 100); 

	 return $new.$ext;

}

$solution = new shahzad;

$QRY_web = qry_run("Select * from ms_webs");

if (num_rec($QRY_web) > 0)

{

	$qrs = fetch_rec($QRY_web);
	$web_title = $qrs['web_title'];
	$web_name = $qrs['web_name'];
	$web_mobile = $qrs['mobile'];
	$web_address = $qrs['address'];
	$web_url = $qrs['web_url'];
	$web_url_1 = $qrs['web_url_2'];
	$web_email = $qrs['web_email'];
	$email_to = $qrs['email_to'];
	$tlt_hits = $qrs['tlt_hits'];
	$tlt_page_views = $qrs['tlt_page_views'];
	$tlt_unique_hits = $qrs['tlt_unique_hits'];
	$owner_name = $qrs['owner_name'];
	$auto_thumb = $qrs['auto_thumb'];
	$thumb_size = $qrs['thumb_size'];
	$thumb_type = $qrs['thumb_type'];
	$PAY_EMAIL = $qrs['paypal_email'];
	$WEB_ON = $qrs['paypal'];
	$copy_right = $qrs['copy_right'];
	$design_develop = $qrs['design_develop'];
	
}


$QRY_social = qry_run("Select * from ms_social");

if (num_rec($QRY_social) > 0)

{

	$social = fetch_rec($QRY_social);
	$facebook = $social['facebook'];
	$twitter = $social['twitter'];
	$instagram = $social['instagram'];
	$pintrest = $social['pintrest'];
	$linkedin = $social['linkedin'];
	$google = $social['google'];
	$skype = $social['skype'];
	
	
}

$QRY = qry_run("select * from ms_pictures where pshow = 'Yes' AND mainid = '1' AND subid = '2'  order by ranking");
if (num_rec($QRY) > 0)
{
	$qrss = fetch_rec($QRY);
$logo = $qrss['img1'];
}


function md5_salt_hash($string){
	global $salt;
	$iv = mcrypt_create_iv(
		mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
		MCRYPT_DEV_URANDOM
	);

	$encrypted = base64_encode(
		$iv .
		mcrypt_encrypt(
			MCRYPT_RIJNDAEL_128,
			hash('sha256', $salt, true),
			$string,
			MCRYPT_MODE_CBC,
			$iv
		)
	);
	return $encrypted;
}

$sub_path = "../../items/gallery/";

$file_path = "up_files/";

$cat_path = "../../items/category/";
$sub_cat_path = "../../items/subcategory/";
$prd_path = "../../items/products/";
$pages_path = "../../items/pages/";
$gallery_path = "../../items/gallery/";
$banner_path = "../../items/banners/";
$catalog_path = "../../items/catalogs/";
$social_path = "../../items/social/";

include("setting.php");

$keywords_common = "HOBEI INTERNATIONAL";
$description_common = "HOBEI INTERNATIONAL";
function md5_usalt_uhash($string){
	global $salt;

	$data = base64_decode($string);
	$iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));
	
	$decrypted = rtrim(
		mcrypt_decrypt(
			MCRYPT_RIJNDAEL_128,
			hash('sha256', $salt, true),
			substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
			MCRYPT_MODE_CBC,
			$iv
		),
		"\0"
	);
	
	return $decrypted;
}

function generate_slug($string){
	$bl = array(" ", "(", ")", "?", ".", "-", "[", "]", "&", "'", "|",",","+","*","/",":","!",'"','-');

		$slug=strtolower(trim($string));
		$slug=str_replace($bl,"-","$slug");

		return $slug;
}
?>