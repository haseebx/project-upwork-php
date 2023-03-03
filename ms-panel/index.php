<?php  
include "common/param.php"; 
include "common/func.php"; 
$er = "N"; 
if (chp('sub_mit') == "Y") 
{ 
    if (chp('txtlogin') != "" && chp('txtpass') != "") 
    { 
        $QRY = qry_run("Select * from ms_admin where plogin = '".md5(chps('txtlogin'))."' AND ppass = '".md5(chps('txtpass'))."' AND pshow = 'Yes'");
        if (num_rec($QRY) > 0) 
        { 
            $rs = fetch_rec($QRY); 
            if ($rs['ppass'] == md5(chp('txtpass'))) 
            { 
                if ($rs['plogin'] == md5(chp('txtlogin'))) 
                { 
                    $_SESSION["LINK_LOGIN"] = "Yes"; 
                    $_SESSION["LINK_LOGINID"] = md5(chp('txtlogin')); 
                    $_SESSION["LINK_USER"] = $rs['pname']; 
                    $INC = qry_run("Insert into ms_logs (loginid,ipaddress) Values ('".md5(chp('txtlogin'))."','".$_SERVER['REMOTE_ADDR']."')");
                    header("Location: home.php"); 
                    die; 
                }else{ 
                    $er = "Y"; 
                } 
            }else{ 
                $er = "Y"; 
            } 
        }else{ 
            $er = "Y"; 
        } 
    }else{ 
        $er = "Y"; 
    } 
} 
?>
<!DOCTYPE html>
<html lang="en">
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$web_title?></title>
<!-- Bootstrap CSS style -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<!-- Website CSS style -->
<link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!-- Website Font style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<!-- Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
           <div class="panel-title text-center">
                <h1 class="title">Mega Studio Control Panel</h1>
                <hr />
            </div>
        </div> 
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="#">
            <input type="hidden" name="sub_mit" value="Y">
            	
                <div class="form-group">
                    <div class="cols-sm-10 text-center">
                    	<img src="assets/images/logo.png" class="img-circle">
                    </div>
                </div>
                
                <div class="form-group">
                    <?php if ($er == "Y"){?>
                    <div class="cols-sm-10"><font color="#FF0000">Invalid Username/Password OR Key.</font></div>
                    <?php }?>
                </div>
                
                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="txtlogin" id="txtlogin"  placeholder="Enter your Username"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="txtpass" id="txtpass"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

				
                <div class="form-group ">
                    <button type="submit" class="btn btn-danger btn-lg btn-block login-button">Log in</button>
                </div>
                <div class="login-register">
                    <a href="change_pass.php">Forgotten Password</a> 
                 </div>
            </form>
        </div>
        
        <div class="panel-heading">
           <div class="panel-title text-center">
                <p style="font-size:12px; padding:15px 0;">&copy; Copyright 1997 - <?php echo date("Y");?>, Mega Studio. All rights reserved.</p>
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>