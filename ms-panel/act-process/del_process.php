<?php  
include "../common/param.php";
include "../common/func.php";
include "../common/chk_login.php"; 
if (chp('LVL') == 1) 
{ 
    if (chp('pid') != "") 
    { 
        $UPD = qry_run("Update ms_prods Set feature = 'No' where pid = ".ch_lvl('pid').""); 
             
        $RANK = qry_run("Select * from ms_prods where feature = 'Yes' order by feature_ranking"); 
        $NUM = num_rec($RANK); 
        if ($NUM > 0) 
        { 
            $nrank = 1; 
            while($Fs = fetch_rec($RANK)) 
            { 
                $UPD = qry_run("Update ms_prods Set feature_ranking = ".$nrank." where pid = ".$Fs['pid'].""); 
                $nrank = $nrank + 1; 
            } 
        } 
    }     
    header("Location: feature.php"); 
    die; 
} 
if (chp('LVL') == 2) 
{ 
    if (chp('pid') != "") 
    { 
        $UPD = qry_run("Update ms_prods Set new = 'No' where pid = ".ch_lvl('pid').""); 
             
        $RANK = qry_run("Select * from ms_prods where new = 'Yes' order by new_ranking"); 
        $NUM = num_rec($RANK); 
        if ($NUM > 0) 
        { 
            $nrank = 1; 
            while($Fs = fetch_rec($RANK)) 
            { 
                $UPD = qry_run("Update ms_prods Set new_ranking = ".$nrank." where pid = ".$Fs['pid'].""); 
                $nrank = $nrank + 1; 
            } 
        } 
    }     
    header("Location: new.php"); 
    die; 
} 
if (chp('LVL') == 3) 
{ 
    if (chp('pid') != "") 
    { 
        $UPD = qry_run("Update ms_prods Set special = 'No' where pid = ".ch_lvl('pid').""); 
             
        $RANK = qry_run("Select * from ms_prods where special = 'Yes' order by spl_ranking"); 
        $NUM = num_rec($RANK); 
        if ($NUM > 0) 
        { 
            $nrank = 1; 
            while($Fs = fetch_rec($RANK)) 
            { 
                $UPD = qry_run("Update ms_prods Set spl_ranking = ".$nrank." where pid = ".$Fs['pid'].""); 
                $nrank = $nrank + 1; 
            } 
        } 
    }     
    header("Location: special.php"); 
    die; 
} 
?>