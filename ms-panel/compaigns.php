<?php  
include "common/param.php"; 
include "common/func.php"; 
include "common/chk_login.php";
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
include "assets/include/head.php";
include "assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
                <small>New Newsletter Campaign</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> New Newsletter Campaign</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
                                	
									<div class="panel-body">
                                        <div id="morris-area-chart">
                                            <div class="row">
												<?php 
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
                                                ?> 
                                                <?php if ($SHOW == "Yes"){?>
                                                <form name="frm_compaign" method="post" action="send_letter_bulk.php" target="_blank"> 
                                                <input type="hidden" name="sub_mit" value="Yes">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Send Newsletter To</label>
                                                        <select name="send_to" class="form-control" id="send_to"> 
                                                            <option value="">- Select -</option> 
                                                            <option value="ALL">Send to All Subscribers</option> 
                                                            <!--<option value="WHOLE">Send to All Wholeseller</option> 
                                                            <option value="RETAIL">Send to All Retailer</option>--> 
                                                            <?php 
                                                            $QRYg = qry_run("select COUNT(mainid) as mainid,group_id,group_name from ms_subscribers group by group_id order by group_id"); 
                                                            if (num_rec($QRYg) > 0) 
                                                            { 
                                                            while($rsg = fetch_rec($QRYg)) 
                                                            { 
                                                            ?> 
                                                            <option value="<?=$rsg['group_id']?>"> Subscriber  
                                                            -  
                                                            <?=$rsg['group_name']?> 
                                                            (<strong>  
                                                            <?=$rsg['mainid']?> 
                                                            </strong>) </option> 
                                                            <?php 
                                                            } 
                                                            } 
                                                            ?> 
                                                        </select>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Select a Newsletter</label>
                                                    	<select name="letter" class="form-control" id="letter"> 
                                                            <option value="">- Select a Newsletter -</option> 
                                                            <?php 
                                                            $QRY = qry_run("select * from ms_letter order by mainid"); 
                                                            if (num_rec($QRY) > 0) 
                                                            { 
                                                            while($rs = fetch_rec($QRY)) 
                                                            { 
                                                            ?> 
                                                            <option value="<?=$rs['mainid']?>">  
                                                            <?=$rs['pname']?> 
                                                            </option> 
                                                            <?php 
                                                            } 
                                                            } 
                                                            ?>
                                                        </select>
                                                </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Send Newsletter</button>
                                                </div>
                                                </div>
                                                </form>
                                                <?php }?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
</div>
<?php include "assets/include/footer.php";?>