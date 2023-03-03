<?php
include"ms-panel/common/func.php";
include"ms-panel/common/param.php";
include"live.php";
$SET = qry_run("select * from wc_webs");
$rs = fetch_rec($SET);
if($rs['website'] == "Yes"){
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
<title>Submit Inquiry | <?=$web_title?></title>
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
<?php include"include/sub_banner.php";?>
<div class="brds">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="brds_text">
                	<a href="index.php">Home</a>&nbsp;&nbsp;&nbsp;>&nbsp;&nbsp;&nbsp;Submit Inquiry
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
    	<?php include"include/left.php";?>
        <div class="col-md-9">
        	<div class="content_head">Submit Inquiry</div>
            <?php
            $pageid = 4;
            $p_detail = "";
            $query = qry_run("Select * from wc_contents where mainid = ".$pageid."");
            if (num_rec($query) > 0){
            $rs = fetch_rec($query);
            $p_detail = $rs['pdetail'];
            }
            ?>
            <div class="content_text text-center"><?=$p_detail?></div>
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