<body>
<div class="container-fluid">
	<div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12">
            <div class="top_bg">
            	<h1>Mega Studio Control Panel</h1>
            </div>
            <div class="nav_bg">
            	
                <nav role="navigation" class="navbar-default" style="background:none;">
                    <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                	<div id="navbarCollapse" class="collapse navbar-collapse">
                    
                        <ul class="nav navbar-nav usmenu" id="navigation">
                            <li><a href="<?=$web_url?>/home.php">Dashboard</a></li>
                            <li class="dropdown">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catalog <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                	<li><a href="<?=$web_url?>/main.php">Manage Categories</a></li>
                                    <li><a href="<?=$web_url?>/all-products.php">Manage Products</a></li>
                                    <li><a href="<?=$web_url?>/p_options.php">Manage Attributes</a></li>
                                    <li><a href="<?=$web_url?>/feature.php">Feature Products</a></li>
                                    <li><a href="<?=$web_url?>/special.php">Special Products</a></li>
                                    <li><a href="<?=$web_url?>/new.php">What's New</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=$web_url?>/pdf.php">PDF Catalogue</a></li>
                            <li><a href="<?=$web_url?>/gallerys.php">Gallery/Banners</a></li>
                            <li><a href="<?=$web_url?>/content.php">Pages</a></li>
                            <li><a href="<?=$web_url?>/news.php">News & Events</a></li>
                            <li><a href="<?=$web_url?>/inquiries.php">Submitted Inquiries</a></li>
                            <li class="dropdown">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Newsletter <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                	<li><a href="<?=$web_url?>/subscriber.php">Subscriber List</a></li>
                                    <li><a href="<?=$web_url?>/compaigns.php">Send Newsletter</a></li>
                                    <li><a href="<?=$web_url?>/newsletter.php">Add New Newsletter</a></li>
                                </ul>
                            </li>
                          
                            <li class="dropdown">
                            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Setting <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                	<li><a href="<?=$web_url?>/web_setting.php">Website Setting</a></li>
                                	<li><a href="<?=$web_url?>/email_setting.php">Email Setting</a></li>
                                    <li><a href="<?=$web_url?>/social_setting.php">Social Network Setting</a></li>
                                    <li><a href="<?=$web_url?>/password_setting.php">Password Setting</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=$web_url?>/logout.php">Logout</a></li>
                        </ul>
                    
                    </div>
                </nav>
                
            </div>
        </div>
    </div>
</div>