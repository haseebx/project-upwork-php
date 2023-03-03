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
                Dashboard <small><?=$web_name?></small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
            
        	<div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-picture-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<?php
									$result = mysqli_query($db_con,"SELECT count(*) as total from ms_main");
									$data = mysqli_fetch_assoc($result);
								?>
                                <div class="huge"><?php echo $data['total'];?></div>
                                <div>CATEGORIES</div>
                            </div>
                        </div>
                    </div>
                    <a href="main.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-picture-o fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<?php
									$result = mysqli_query($db_con,"SELECT count(*) as total from ms_prods");
									$data = mysqli_fetch_assoc($result);
								?>
                                <div class="huge"><?php echo $data['total'];?></div>
                                <div>PRODUCTS</div>
                            </div>
                        </div>
                    </div>
                    <a href="all-products.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<?php
									$result = mysqli_query($db_con,"SELECT count(*) as total from ms_subscribers");
									$data1 = mysqli_fetch_assoc($result);
								?>
                                <div class="huge"><?php echo $data1['total'];?></div>
                                <div>SUBSCRIBER</div>
                            </div>
                        </div>
                    </div>
                    <a href="subscriber.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                            	<?php
									$result = mysqli_query($db_con,"SELECT count(*) as total from ms_inquiry");
									$data2 = mysqli_fetch_assoc($result);
								?>
                                <div class="huge"><?php echo $data2['total'];?></div>
                                <div>INQUIRIES</div>
                            </div>
                        </div>
                    </div>
                    <a href="inquiries.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            
            
            
            
        </div>
            
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Website Details</h3>
                        </div>
                        <div class="panel-body">
                            <div id="morris-area-chart">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th><?=$web_name?></th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Owner Name</th>
                                            <td><?=$owner_name?></td>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Cell Number</th>
                                            <td><?=$web_mobile?></td>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Website URL</th>
                                            <td><?=$web_url?></td>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Login IP</th>
                                            <td><?=$_SERVER['REMOTE_ADDR']?></td>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date & Time</th>
                                            <td><?php echo date('D dS F, Y');?> - <?php echo date('H:i A');?></td>
                                            <th>&nbsp;</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td><?=$web_address?></td>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
        </div>
    </div>
</div>
<?php include "assets/include/footer.php";?>