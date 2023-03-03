<?php  
include "common/param.php"; 
$_SESSION["LINK_LOGIN"] = ""; 
$_SESSION["LINK_LOGINID"] = ""; 
$_SESSION["LINK_USER"] = ""; 
header("Location: index.php"); 
die; 
?>