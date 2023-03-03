<?php
include"ms-panel/common/func.php";
include"ms-panel/common/param.php";
include"live.php";

?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta 
     name='viewport' 
     content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' 
/>
<title>Submit Newsletter | <?=$web_title?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Bootstrap CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/main.css" rel="stylesheet">
<!-- Website Font style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<!-- Font Awesome CSS -->
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>

<body>
<?php include"include/header.php";?>

<div class="pag-main">
<div class="container-fluid">
	<div class="">
    	<?php /*?><?php include"include/left.php";?><?php */?>
        <div class="col-md-12 prds-inner-bg">
		<div class="heading"> Submit Letter</div>
            	<div class="in-div">
				<div class="brds_text">
            	
<ul class="breadcrumb">
                        <li><a href="<?=$web_url_1?>home">Home </a></li>
                        <li> Submit Letter &nbsp;</li>
                       
                        
                      </ul>
                </div>
              
        	</div>

    	
      
        	<div class="content_head">Submit Newsletter</div>
            <?php if (chf('err') == "y"){?>
            <div class="content_text">
            <font color="#FF0000">This Email&nbsp;already exist in our database</font>
            </div>
            <?php }?>
            <?php if (chf('err') == "n"){?>
            <div class="content_text">
            <font color="#009900">Thank you for subscribing with us</font>
            </div>
            <?php }?>
            <?php if (chf('err') == "e"){?>
            <div class="content_text">
            <font color="#FF0000">Please enter valid email address</font>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php
include"include/footer.php";
include"include/scripts.php";
?>
