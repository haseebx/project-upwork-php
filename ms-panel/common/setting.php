<?php
$QRY = qry_run("select * from ms_menu");
if (num_rec($QRY) > 0)
{
$rs = fetch_rec($QRY);

$LVL = $rs['LVL'];
$Categories = $rs['Categories'];
$Feature = $rs['Feature'];
$Special = $rs['Special'];
$Hot = $rs['Hot'];
$Options = $rs['Options'];
$Pages = $rs['Pages'];
$salt = "SELECT*FROMWCM";
$News = $rs['News'];
$Inquiries = $rs['Inquiries'];
$Newsletter = $rs['Newsletter'];
$banner = $rs['banner'];
$Logos = $rs['Logos'];
$Factory = $rs['Factory'];

$SEND_MAIL = "Yes";
$PER_PAGE = 12;
}
?>