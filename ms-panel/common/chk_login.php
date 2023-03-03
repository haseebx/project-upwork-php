<?php 
if (isset($_SESSION["LINK_LOGIN"])) 
{ 
    if ($_SESSION["LINK_LOGIN"] == "Yes"){ 
     
    }else{ 
        header("location: index.php"); 
    } 
}else{ 
header("location: index.php"); 
} 
?>