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
            $QRY = qry_run("select * from ms_news where pname = '".chp('pname')."'"); 
            if (num_rec($QRY) > 0) 
            { 
                ?> 
                <script language="JavaScript"> 
                alert ("This News already in OUR DATABASE"); 
                history.go(-1); 
                </script> 
                <?php 
                header("Location: news.php"); 
                die; 
            }else{ 
                 
                $INC = qry_run("Insert into ms_news (pname,pdetail,pshow,phead,keywords,description,pdate,sdetail,alt_text) Values('".ch('pname')."','".ch('pdetail')."','".ch_chkb('pshow')."','".chp('phead')."','".chp('keywords')."','".chp('description')."','".time()."','".chp('sdetail')."','".chp('alt_text')."')"); 
                if (!$INC) 
                { 
                    echo mysqli_error($db_con); 
                    die; 
                }else{ 
                    $last_id = mysqli_insert_id($db_con); 
                    //------- UPLOAD ---------------------------------------- 
                    $img1 = ""; 
                    $pic1 = $last_id."-news."; 
                    if (ch_file('img1') == "Yes") 
                    { 
                        $ext = do_file('img1',$pic1,$sub_path); 
                        if ($ext == "No") 
                        { 
                            $img1 = ""; 
                        }else{ 
                            $img1 = $pic1.$ext; 
                        } 
                    } 
                     
                    $UPD = qry_run("Update ms_news Set img1 = '".$img1."' where mainid = ".$last_id.""); 
                    //---------------------- UPLOAD END -------------------------------- 
                    header("Location: $web_url/news.php"); 
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
            //------- UPLOAD ---------------------------------------- 
            $last_id = ch_lvl('mid'); 
            $img1 = ""; 
            $pic1 = $last_id."_news."; 
            if (ch_file('img1') == "Yes") 
            { 
                $ext = do_file('img1',$pic1,$sub_path); 
                if ($ext == "No") 
                { 
                    $img1 = ""; 
                }else{ 
                    $img1 = $pic1.$ext; 
                } 
            }else{ 
                $img1 = chp('imgs1'); 
            } 
             
            //------- UPLOAD END -------------------------------------- 
            $UPD = qry_run("Update ms_news Set pname = '".ch('pname')."',pdetail = '".ch('pdetail')."',pshow = '".ch_chkb('pshow')."',phead = '".chhtml('phead')."',keywords = '".chhtml('keywords')."',description = '".chhtml('description')."',img1 = '".$img1."',pdate = '".time()."',sdetail = '".chp('sdetail')."',alt_text = '".chp('alt_text')."' where mainid = ".ch_lvl('mid').""); 
            header("Location: $web_url/news.php"); 
            die;     
        } 
    } 
    //------ EDIT END ------------------------------ 
    if (chp('C_TYPE') == "DEL") 
    { 
        if (ch_lvl('mid') != "") 
        { 
            $DEL = qry_run("Delete from ms_news where mainid = ".ch_lvl('mid').""); 
             
            header("Location: $web_url/news.php"); 
            die; 
        } 
    } 
     
} 
?>