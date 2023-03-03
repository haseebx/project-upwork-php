<?php  
include "common/param.php"; 
include "common/func.php"; 
include "common/chk_login.php"; 
set_time_limit(7200); 
function is_on_interval($date1,$date2,$interval) 
{ 
    $dat2=strtotime($date2); 
    $dat3=strtotime('+'.$interval.' second '.$date1); 
    
    if($dat2<=$dat3){ 
        return "OK"; 
    } 
    else 
    { 
        return "No"; 
    } 
} 
$SHOW = "Yes"; 
$Date3 = ""; 
$CHK = qry_run("Select * from ms_compain"); 
if (num_rec($CHK) > 0) 
{ 
    $rsk = fetch_rec($CHK); 
    $date1 = $rsk['ptime']; 
    $date2 = date('Y-m-d H:i:s'); 
    $t_take = $rsk['time_take']; 
    //$Date3 = date('d-m-Y H:i:s',strtotime('+'.$t_take.' second '.$date1)); 
    $Date3 = date('H:i:s',strtotime('+'.$t_take.' second '.$date1)); 
    //echo $date1." ---- ".$date2." ------ ".$Date3; 
    if (is_on_interval($date1,$date2,$t_take) == "OK") 
    { 
        $SHOW = "No"; 
    } 
} 
if ($SHOW == "No") 
{ 
    echo "A Compaign is already in process"; 
    die; 
} 
if (ch('sub_mit') == "Yes" && ch_lvl('letter') > 0 && ch('send_to') != "") 
{ 
    $letter = ch_lvl('letter'); 
    $DEL = qry_run("delete from ms_compain"); 
    if (ch('send_to') == "WHOLE" || ch('send_to') == "RETAIL") 
    { 
            if (ch('send_to') == "WHOLE") 
            { 
                $Group = 1; 
            }else{ 
                $Group = 2; 
            } 
            $QRY = qry_run("select * from ms_members where group_id = ".$Group." order by mainid limit 500"); 
            if (num_rec($QRY) > 0) 
            { 
                $timetake = num_rec($QRY) * 13; 
                $INC = qry_run("Insert into ms_compain (compain,ptime,time_take) Values ('Yes','".date('Y-m-d H:i:s')."',".$timetake.")"); 
                while($rs = fetch_rec($QRY)) 
                { 
                    if ($rs['email'] != "") 
                    { 
                        //-------- Newsletter ------------------------------------- 
                            $QRYs = qry_run("select * from ms_letter where mainid = ".$letter." order by pdate DESC"); 
                            if (num_rec($QRYs) > 0) 
                            { 
                                $rss = fetch_rec($QRYs); 
                                $SUBject = $rss['pname']; 
                                $PDetail = $rss['pdetail']; 
                                if ($SEND_MAIL == "Yes") 
                                { 
                                    $headers  = 'MIME-Version: 1.0' . "\r\n"; 
                                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                                    $headers .= 'From: <'.$email_to.'>' . "\r\n"; 
                                        mail($rs['email'], $SUBject, $PDetail, $headers); 
                                } 
                            } 
                    } 
                    sleep(15); 
                } 
            } 
             
    }else{ 
            if (ch('send_to') == "ALL") 
            { 
                $QRY = qry_run("select * from ms_subscribers order by mainid limit 500"); 
            }else{ 
                $QRY = qry_run("select * from ms_subscribers where group_id = ".ch_lvl('send_to')." order by mainid limit 500"); 
            } 
            if (num_rec($QRY) > 0) 
            { 
                $timetake = num_rec($QRY) * 13; 
                $INC = qry_run("Insert into ms_compain (compain,ptime,time_take) Values ('Yes','".date('Y-m-d H:i:s')."',".$timetake.")"); 
                while($rs = fetch_rec($QRY)) 
                { 
                    if ($rs['pmail'] != "") 
                    { 
                            //-------- Newsletter ------------------------------------- 
                            $QRYs = qry_run("select * from ms_letter where mainid = ".$letter." order by pdate DESC"); 
                            if (num_rec($QRYs) > 0) 
                            { 
                                $rss = fetch_rec($QRYs); 
                                $SUBject = $rss['pname']; 
                                $PDetail = $rss['pdetail']; 
                                if ($SEND_MAIL == "Yes") 
                                { 
                                    $headers  = 'MIME-Version: 1.0' . "\r\n"; 
                                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
                                    $headers .= 'From: <'.$email_to.'>' . "\r\n"; 
                                        mail($rs['pmail'], $SUBject, $PDetail, $headers); 
                                } 
                            } 
                    } 
                    sleep(15); 
                } 
            } 
    } 
} 
?> 
<script language="JavaScript"> 
window.close(); 
</script>