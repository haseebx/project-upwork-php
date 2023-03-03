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
            $QRY = qry_run("select * from ms_mail_group where pname = '".chp('pname')."'"); 
            if (num_rec($QRY) > 0) 
            { 
                ?> 
                <script language="JavaScript"> 
                alert ("This Group already in OUR DATABASE"); 
                history.go(-1); 
                </script> 
                <?php 
                header("Location: sub_group.php"); 
                die; 
            }else{ 
                    $INC = qry_run("Insert into ms_mail_group (pname,pdetail,pshow) Values('".ch('pname')."','".chp('pdetail')."','".ch_chkb('pshow')."')"); 
                    if (!$INC) 
                    { 
                        echo mysqli_error($db_con); 
                        die; 
                    }else{ 
                        $last_id = mysqli_insert_id($db_con); 
                        header("Location: $web_url/sub_group.php"); 
                        die; 
                    } 
            } 
        } 
    } 
    //------- NEW END ------------ 
    if (chp('C_TYPE') == "EDIT") 
    { 
        if (chp('pname') != "") 
        { 
            $UPD = qry_run("Update ms_mail_group Set pname = '".ch('pname')."',pdetail = '".ch('pdetail')."',pshow = '".ch_chkb('pshow')."' where mainid = ".ch_lvl('mid')."");
            header("Location: $web_url/sub_group.php"); 
            die;     
        } 
    } 
    //------ EDIT END ------------------------------ 
    if (chp('C_TYPE') == "DEL") 
    { 
        if (ch_lvl('mid') != "") 
        { 
            $DEL = qry_run("Delete from ms_mail_group where mainid = ".ch_lvl('mid').""); 
             
            header("Location: $web_url/sub_group.php"); 
            die; 
        } 
    } 
     
} 
?>