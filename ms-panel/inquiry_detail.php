<?php  
include "common/param.php"; 
include "common/func.php"; 
include "common/chk_login.php";
include "assets/include/head.php";
include "assets/include/header.php";
?>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <h1 class="page-header">
                <small>Submitted Inquiries</small>
            </h1>
            
            
        	
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-cogs fa-fw"></i> Submitted Inquiries</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <div class="row">
									<?php 
                                    $QRY = qry_run("select * from ms_inquiry where mainid = ".ch_lvl('mid').""); 
                                    if (num_rec($QRY) > 0) 
                                    { 
                                    $rs = fetch_rec($QRY); 
                                    ?>
                                  <div class="col-md-12">
                                   	<ol class="breadcrumb">
                                        	<li>Customer Information</li>
                                  </ol>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="base">
                                            <tr>
                                                <td width="13%" height="30" align="left" valign="middle">Name:</td>
                                                <td width="87%" height="30" align="left" valign="middle"><?=$rs['fname']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Address 1:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['address1']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Address 2:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['address2']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Phone:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['phone']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Mobile:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['mobile']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Fax:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['fax']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">E-mail:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['email']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Country:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['country']?></td>
                                          </tr>
                                        </table>
										<ol class="breadcrumb">
                                        	<li>Inquiry Detail</li>
                                        </ol>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="base">
                                            <tr>
                                                <td width="13%" height="30" align="left" valign="middle">Inquiry ID:</td>
                                                <td width="87%" height="30" align="left" valign="middle"><?=$rs['mainid']+1000?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Inquiry Date:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['pdate']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Payment Type:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['ptype']?></td>
                                          </tr>
                                            <tr>
                                                <td height="30" align="left" valign="middle">Shipping Type:</td>
                                                <td height="30" align="left" valign="middle"><?=$rs['stype']?></td>
                                          </tr>
                                        </table>
                                    <ol class="breadcrumb">
                                        	<li>Product Detail</li>
                                      </ol>
										<?php 
                                        $tlt_qty = 0; 
                                        $tlt_price = 0; 
                                        $QRYp = qry_run("select * from ms_inquiry_detail where mainid = ".$rs['mainid']." order by subid"); 
                                        if (num_rec($QRYp) > 0) 
                                        { 
                                        while($rsp = fetch_rec($QRYp)) 
                                        { 
                                        ?>
                                      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="base">
                                          <tr>
                                              <td width="13%" height="30" align="left" valign="middle">Product Image</td>
                                              <td width="58%" height="30" align="left" valign="middle">Product Information</td>
                                                <td width="29%" align="left" valign="middle">QTY</td>
                                        </tr>
                                          <tr>
                                              <td height="30" align="left"><img src="<?=$web_url_1?>items/products/<?=$rsp['img1']?>" width="100"></td>
                                              <td height="30" align="left" valign="top"><?=$rsp['pname']?><br /><?=$rsp['part']?><br /><?=$rsp['opt']?> </td>
                                                <td align="left" valign="top"><?=$rsp['qty']?></td>
                                        </tr>
										<?php 
                                        $tlt_qty = $tlt_qty + $rsp['qty']; 
                                        } 
                                        ?>
                                          <tr>
                                              <td height="30" align="left" valign="middle">&nbsp;</td>
                                              <td height="30" align="right" valign="middle">Total Quantity&nbsp;:&nbsp;</td>
                                              <td height="30" align="left" valign="middle"><?=$tlt_qty?></td>
                                        </tr>
                                      </table>
                                      <?php
										}
									  ?>
                                    </div>
                                    <?php
									}
									?>
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