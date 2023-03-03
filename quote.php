<?php
include"ms-panel/common/func.php";
include"ms-panel/common/param.php";
include"live.php";
$SET = qry_run("select * from ms_webs");
$rs = fetch_rec($SET);
if($rs['website'] == "Yes"){
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inquiry | <?=$web_title?></title>
<meta name="keywords" content="<?=$keywords_common?>">
<meta name="description" content="<?=$description_common?>">
<meta 
     name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
/>
<?php include"_head.php";?>

<body>
<?php include"include/header.php";?>

<div class="pag-main">
<div class="container-fluid">
	<div class="row">
    	<?php /*?><?php include"include/left.php";?><?php */?>
        <div class="col-md-12 prds-inner-bg">
		<div class="col-md-12 col-sm-12 col-xs-12 heading">Inquiry Basket</div>
            	<div class="in-div">
				<div class="brds_text">
            	
<ul class="breadcrumb">
                        <li><a href="<?=$web_url_1?>home"> Home </a></li>
                        <li>Inquiry Basket &nbsp;</li>
                       
                        
                      </ul>
                </div>
              
        	<div class="content_head"></div></div>
        	<div class="content_head">Send Inquiry</div>
                <div class="row">
                <form name="frm_quote" id="frm_quote" method="post" action="<?=$web_url_1?>submit_quote.php">
                <input type="hidden" name="sub_mit" id="sub_mit" value="Yes">
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Name</label>
                <input type="text" class="form-control" name="fname" placeholder="Enter Your Name" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Address 1</label>
                <input type="text" class="form-control" name="address1" placeholder="Enter Your Address 1" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Address 2</label>
                <input type="text" class="form-control" name="address2" placeholder="Enter Your Address 2" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Enter Your Phone" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Mobile</label>
                <input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Fax</label>
                <input type="text" class="form-control" name="fax" placeholder="Enter Your Fax" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter Your Email" required>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Country</label>
                <select name="country" id="country" class="form-control">
                <option value="">Select Country</option>
                <?php
                $qryc = qry_run("Select * from ms_country where pshow = 'Yes' order by country");
                if (num_rec($qryc) > 0)
                {
                $p = 1;
                while($rsc = fetch_rec($qryc))
                {
                ?>
                <option value="<?=$rsc['country']?>"> <?=$rsc['country']?></option>
                <?php
                }
                }
                ?>
                </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Payment Type</label>
                <select name="ptype" class="form-control" id="ptype">
                <option value="-">~ Select ~</option>
                <option value="FOB">FOB</option>
                <option value="C&amp;F">C&amp;F</option>
                <option value="CIF">CIF</option>
                </select>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <label for="exampleInputEmail1" >Shipping Type</label>
                <select name="stype" class="form-control" id="stype">
                <option value="-">~ Select ~</option>
                <option value="BY SEA">BY SEA</option>
                <option value="BY AIR">BY AIR</option>
                <option value="DHL">DHL</option>
                </select>
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                <label for="exampleInputEmail1" >Message</label>
                <textarea name="message" cols="5" rows="5" class="form-control" placeholder="Enter Your Message" style="height:80px;"></textarea>
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfFxQsUAAAAADaxQjJJM82ucsbgsoBNvt4aW3nv"></div>
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                <button class="butn-hvr" type="submit" ><i class="glyphicon glyphicon-ok"></i> Send Inquiry</button>
                </div>
                </div>
                </form>
                </div>
        </div>
    </div>
</div>
</div>
<?php
include"include/footer.php";
include"include/scripts.php";
?>
<?php
}else{
	header("Location: close.php");
	die;
}
?>