<?php  
include "common/param.php";
include "common/func.php";
include "assets/include/head.php";
?>
<body>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <div class="top_bg">
            	<h1>Mega Studio Control Panel</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
	<div class="row text-center">
    	<div class="col-md-12">
        	<h1 class="page-header">
            	<small>Change Password Request</small>
            </h1>
        </div>
		<form action="process/change_pass_process.php" method="post"> 
        <div class="col-md-12">
            <div class="row">
            	<div class="col-md-4"></div>
                <div class="col-md-4">
                	<?php if (isset($_REQUEST['id']) && $_REQUEST['id'] == 101){?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        Your Email Not Be Verified
                    </div>
                    <?php }?>
                    <?php if (isset($_REQUEST['id']) && $_REQUEST['id'] == 100){?>
                    <div class="alert alert-success" role="alert">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <span class="sr-only">Success:</span>
                        Your New Password Sent Successfully
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter Your Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <div class="col-md-12">
        	<div class="form-group" style="margin:20px 0;">
                <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;<a href="index.php" class="btn btn-danger">Login Page</a>
            </div>
        </div>
        </form>
    </div>
</div>
<?php include "assets/include/footer.php";?>