<?php  
include "param.php"; 
include "func.php"; 
include "chk_login.php"; 
if (chp('LVL') == 1) 
{ 
    //-------- DEL ------------------------------------------ 
    if (chp('C_TYPE') == "DEL") 
    { 
        if (ch_lvl('mid') != "") 
        { 
            $DEL = qry_run("Delete from ms_inquiry where mainid = ".ch_lvl('mid').""); 
            $DEL = qry_run("Delete from ms_inquiry_detail where mainid = ".ch_lvl('mid').""); 
            header("Location: inquiries.php"); 
            die; 
        } 
    } 
    //---- DEL END ------------------------------------------ 
} 
?>