<?php  
include "../common/param.php"; 
include "../common/func.php"; 
include "../common/chk_login.php";
if (chp('LVL') == 1) 
{ 
    if (chp('C_TYPE') == "NEW") 
    { 
        if (chp('pname') != "") 
        { 
                $INC = qry_run("Insert into ms_letter (pname,pdetail,pshow,pdate) Values('".chp('pname')."','".chp('pdetail')."','".ch_chkb('pshow')."','".date('Y-m-d')."')");
                if (!$INC) 
                { 
                    echo mysqli_error($db_con); 
                    die; 
                }else{ 
                    $last_id = mysqli_insert_id($db_con); 
                    header("Location: $web_url/newsletter.php"); 
                    die; 
                } 
        } 
    } 
    //------- NEW END ------------ 
    if (chp('C_TYPE') == "EDIT") 
    { 
        if (chp('pname') != "") 
        { 
            $UPD = qry_run("Update ms_letter Set pname = '".chp('pname')."',pdetail = '".chp('pdetail')."',pshow = '".ch_chkb('pshow')."',pdate = '".date('Y-m-d')."' where mainid = ".ch_lvl('mid').""); 
            header("Location: $web_url/newsletter.php"); 
            die;     
        } 
    } 
    //------ EDIT END ------------------------------ 
    if (chp('C_TYPE') == "DEL") 
    { 
        if (ch_lvl('mid') != "") 
        { 
            $DEL = qry_run("Delete from ms_letter where mainid = ".ch_lvl('mid').""); 
             
            header("Location: $web_url/newsletter.php"); 
            die; 
        } 
    } 
     
} 
?>