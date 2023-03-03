<?php  

include "common/param.php"; 

include "common/chk_login.php"; 

include "common/func.php"; 

if (chp('sub_mit') == "Yes") 

{ 

    if (ch_lvl('LVL') == 1) 

    { 

        $er = ""; 

        $main = ch('main'); 

        $new_rank = $_REQUEST['ranking'.$main]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_main where mainid = ".$main."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_main where ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['mainid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_main where ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_main Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_main Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_main where ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_main Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_main Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_main order by ranking"); 

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_main Set ranking = ".$nrank." where mainid = ".$Fs['mainid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: main.php"); 

        die; 

    }//--------------- Level 1 END ~~~~~~~************** 

    if (ch_lvl('LVL') == 2) 

    { 

        $er = ""; 

        $sec = ch('sec'); 

        $main = ch('main'); 

        $new_rank = $_REQUEST['ranking'.$sec]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_section where secid = ".$sec."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_section where mainid = ".$main." AND ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['secid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_section where mainid = ".$main." AND ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_section Set ranking = ".$newrank." where mainid = ".$Fs['mainid']." AND secid = ".$Fs['secid']."");

                        } 

                        $UPD = qry_run("Update ms_section Set ranking = ".$new_rank." where secid = ".$sec."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_section where mainid = ".$main." AND ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_section Set ranking = ".$newrank." where secid = ".$Fs['secid']."");

                        } 

                        $UPD = qry_run("Update ms_section Set ranking = ".$new_rank." where secid = ".$sec."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_section where mainid = ".$main." order by ranking");

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_section Set ranking = ".$nrank." where secid = ".$Fs['secid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: secions.php?mid=".$main); 

        die; 

    }//--------------- Level 2 END ~~~~~~~************** 

    if (ch_lvl('LVL') == 3) 

    { 

        $er = ""; 

        $sec = ch('sec'); 

        $main = ch('main'); 

        $cat = ch('cat'); 

        $new_rank = $_REQUEST['ranking'.$cat]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_cat where catid = ".$cat.""); 

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_cat where mainid = ".$main." AND secid = ".$sec." AND ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['catid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_cat where mainid = ".$main." AND secid = ".$sec." AND ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_cat Set ranking = ".$newrank." where catid = ".$Fs['catid']."");

                        } 

                        $UPD = qry_run("Update ms_cat Set ranking = ".$new_rank." where catid = ".$cat."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_cat where mainid = ".$main." AND secid = ".$sec." AND ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_cat Set ranking = ".$newrank." where catid = ".$Fs['catid']."");

                        } 

                        $UPD = qry_run("Update ms_cat Set ranking = ".$new_rank." where catid = ".$cat."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_cat where mainid = ".$main." AND secid = ".$sec." order by ranking");

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_cat Set ranking = ".$nrank." where catid = ".$Fs['catid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: category.php?mid=".$main."&sec=".$sec); 

        die; 

    }//--------------- Level 3 END ~~~~~~~************** 

    if (ch_lvl('LVL') == 4) 

    { 

        $er = ""; 

        $sec = ch('sec'); 

        $main = ch('main'); 

        $cat = ch('cat'); 

        $pid = ch('pid'); 

        $new_rank = $_REQUEST['ranking'.$pid]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_prods where pid = ".$pid.""); 

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_prods where mainid = ".$main." AND secid = ".$sec." AND catid = ".$cat." AND ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['pid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_prods where mainid = ".$main." AND secid = ".$sec." AND catid = ".$cat." AND ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_prods Set ranking = ".$newrank." where pid = ".$Fs['pid']."");

                        } 

                        $UPD = qry_run("Update ms_prods Set ranking = ".$new_rank." where pid = ".$pid."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_prods where mainid = ".$main." AND secid = ".$sec." AND catid = ".$cat." AND ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_prods Set ranking = ".$newrank." where pid = ".$Fs['pid']."");

                        } 

                        $UPD = qry_run("Update ms_prods Set ranking = ".$new_rank." where pid = ".$pid."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_prods where mainid = ".$main." AND secid = ".$sec." AND catid = ".$cat." order by ranking");

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_prods Set ranking = ".$nrank." where pid = ".$Fs['pid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: prods.php?mid=".$main."&sec=".$sec."&cat=".$cat); 

        die; 

    }//--------------- Level 4 END ~~~~~~~************** 

    if (ch_lvl('LVL') == 7) 

    { 

        $er = ""; 

        $main = ch('main'); 

        $new_rank = $_REQUEST['ranking'.$main]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_options where mainid = ".$main."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_options where ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['mainid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_options where ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_options Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_options Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_options where ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_options Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_options Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_options order by ranking"); 

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_options Set ranking = ".$nrank." where mainid = ".$Fs['mainid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: p_options.php"); 

        die; 

    }//--------------- PRODUCT OPTION END ~~~~~~~************** 

    if (ch_lvl('LVL') == 8) 

    { 

        $er = ""; 

        $main = ch('main'); 

        $new_rank = $_REQUEST['ranking'.$main]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_sub_opt where subid = ".$main."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_sub_opt where mainid = ".ch_lvl('mid')." AND ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['subid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_sub_opt where mainid = ".ch_lvl('mid')." AND ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_sub_opt Set ranking = ".$newrank." where subid = ".$Fs['subid']."");

                        } 

                        $UPD = qry_run("Update ms_sub_opt Set ranking = ".$new_rank." where subid = ".$main."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_sub_opt where mainid = ".ch_lvl('mid')." AND ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_sub_opt Set ranking = ".$newrank." where subid = ".$Fs['subid']."");

                        } 

                        $UPD = qry_run("Update ms_sub_opt Set ranking = ".$new_rank." where subid = ".$main."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_sub_opt where mainid = ".ch_lvl('mid')." order by ranking");

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_sub_opt Set ranking = ".$nrank." where subid = ".$Fs['subid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: sub_opt.php?mid=".ch_lvl('mid')); 

        die; 

    }//--------------- PRODUCT SUB OPTION END ~~~~~~~************** 

    //---------- More Products Ranking 

    if (ch_lvl('LVL') == 9) 

    { 

        $er = ""; 

        $main = ch('more'); 

        $new_rank = $_REQUEST['ranking'.$main]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_more where mainid = ".$main."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_more where pid = ".ch_lvl('pid')." AND ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['mainid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_more where pid = ".ch_lvl('pid')." AND ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_more Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_more Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_more where pid = ".ch_lvl('pid')." AND ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_more Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_more Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_more where pid = ".ch_lvl('pid')." order by ranking");

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_more Set ranking = ".$nrank." where mainid = ".$Fs['mainid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: more_prods.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

        die; 

    }//--------------- MORE PRODUCTS END ~~~~~~~************** 

    if (ch_lvl('LVL') == 10) 

    { 

        $er = ""; 

        $main = ch('main'); 

        $new_rank = $_REQUEST['ranking'.$main]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_brands where mainid = ".$main."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_brands where ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['mainid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_brands where ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_brands Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_brands Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_brands where ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_brands Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_brands Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_brands order by ranking"); 

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_brands Set ranking = ".$nrank." where mainid = ".$Fs['mainid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: brands.php"); 

        die; 

    } 

    if (ch_lvl('LVL') == 11) 

    { 

        $er = ""; 

        $main = ch('main'); 

        $new_rank = $_REQUEST['ranking'.$main]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_contents where mainid = ".$main."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_contents where ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['mainid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_contents where ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_contents Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_contents Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_contents where ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_contents Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_brands Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_contents order by ranking"); 

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_contents Set ranking = ".$nrank." where mainid = ".$Fs['mainid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: content.php"); 

        die; 

    } 

}

    if (ch_lvl('LVL') == 12) 

    { 

        $er = ""; 

        $main = ch('styles'); 

        $new_rank = $_REQUEST['ranking'.$main]; 

        if ($new_rank > 0) 

        { 

                $old_rank = 0; 

                $MAIN = qry_run("Select * from ms_styles where mainid = ".$main."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $old_rank = $Rs['ranking']; 

                } 

                $MAIN = qry_run("Select * from ms_styles where pid = ".ch_lvl('pid')." AND ranking = ".$new_rank."");

                $num = num_rec($MAIN); 

                if ($num > 0) 

                { 

                    $Rs = fetch_rec($MAIN); 

                    $sub = $Rs['mainid']; 

                } 

                if ($old_rank > $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_styles where pid = ".ch_lvl('pid')." AND ranking BETWEEN ".$new_rank." AND ".$old_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] + 1; 

                            $UPD = qry_run("Update ms_styles Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_styles Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

                if ($old_rank < $new_rank) 

                { 

                    $RANK = qry_run("Select * from ms_styles where pid = ".ch_lvl('pid')." AND ranking BETWEEN ".$old_rank." AND ".$new_rank." order by ranking");

                    $NUM = num_rec($RANK); 

                    if ($NUM > 0) 

                    { 

                        while($Fs = fetch_rec($RANK)) 

                        { 

                            $newrank = $Fs['ranking'] - 1; 

                            $UPD = qry_run("Update ms_styles Set ranking = ".$newrank." where mainid = ".$Fs['mainid']."");

                        } 

                        $UPD = qry_run("Update ms_styles Set ranking = ".$new_rank." where mainid = ".$main."");

                    } 

                } 

            //-------- RE Rank ---------------- 

            $RANK = qry_run("Select * from ms_styles where pid = ".ch_lvl('pid')." order by ranking");

            $NUM = num_rec($RANK); 

            if ($NUM > 0) 

            { 

                $nrank = 1; 

                while($Fs = fetch_rec($RANK)) 

                { 

                    $UPD = qry_run("Update ms_styles Set ranking = ".$nrank." where mainid = ".$Fs['mainid']."");

                    $nrank = $nrank + 1; 

                } 

            } 

            //-------- END --------------------- 

        } 

        header("Location: more_styles.php?mid=".ch_lvl('mid')."&sec=".ch_lvl('sec')."&cat=".ch_lvl('cat')."&pid=".ch_lvl('pid'));

        die; 

    }//--------------- MORE PRODUCTS END ~~~~~~~**************  

header("Location: main.php"); 

die; 

?>