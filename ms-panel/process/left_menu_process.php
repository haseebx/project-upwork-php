<?php 
include "param.php";
include "func.php";
include "chk_login.php";

$UPD = qry_run("Update ms_menu Set LVL = '".chp('LVL')."',Categories = '".chp('Categories')."',Feature = '".chp('Feature')."',Special = '".chp('Special')."',Hot = '".chp('Hot')."',Options = '".chp('Options')."',Pages = '".chp('Pages')."',News = '".chp('News')."',Inquiries = '".chp('Inquiries')."',Newsletter = '".chp('Newsletter')."',banner = '".chp('banner')."',Logos = '".chp('Logos')."',Factory = '".chp('Factory')."'");
header("Location: menu_setting.php?UP=Y");
die;

?>