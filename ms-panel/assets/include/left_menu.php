<div class="col-lg-3 col-md-3 col-sm-3">
        	<div class="left_menu_bg">
            	<div id="masterdiv">
                    <ul class="list-unstyled left_menu">
                        <li><a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a></li>
                        <div class="menutitle" onClick="SwitchMenu('sub100');" style="cursor:pointer">
                            <li><a href="#"><i class="fa fa-fw fa-image"></i> Catalog <b class="caret"></b></a></li>
                            <span class="submenu" id="sub100">
                                <li class="left_sub_menu"><a href="main.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Manage Categories</a></li>
                                <li class="left_sub_menu"><a href="all-products.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Manage Products</a></li>
                                <li class="left_sub_menu"><a href="p_options.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Manage Attributes</a></li>
                            </span>
                        </div>
                        <div class="menutitle" onClick="SwitchMenu('sub1');" style="cursor:pointer">
                            <li><a href="#"><i class="fa fa-fw fa-tags"></i> Manage Featured <b class="caret"></b></a></li>
                            <span class="submenu" id="sub1">
                                <?php if ($Feature == "Yes"){ ?>
                                <li class="left_sub_menu"><a href="feature.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Feature Products</a></li>
                                <?php }?>
                                <?php if ($Special == "Yes"){ ?>
                                <li class="left_sub_menu"><a href="special.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Special Products</a></li>
                                <?php }?>
                                <?php if ($Hot == "Yes"){ ?>
                                <li class="left_sub_menu"><a href="new.php"><i class="fa fa-fw fa-arrow-circle-right"></i> What's New</a></li>
                                <?php }?>
                            </span>
                        </div>
                        <li><a href="content.php"><i class="fa fa-fw fa-pagelines"></i> Pages</a></li>
                        <li><a href="pdf.php"><i class="fa fa-fw fa-file-pdf-o"></i> PDF Catalogue</a></li>
                        <li><a href="news.php"><i class="fa fa-fw fa-calendar-o"></i> News & Events</a></li>
                        <li><a href="inquiries.php"><i class="fa fa-fw fa-cart-arrow-down"></i> Submitted Inquiries</a></li>
                        <div class="menutitle" onClick="SwitchMenu('sub2');" style="cursor:pointer">
                        	<li><a href="#"><i class="fa fa-fw fa-envelope-o"></i> Newsletter <b class="caret"></b></a></li>
                            <span class="submenu" id="sub2">
                            	<li class="left_sub_menu"><a href="subscriber.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Subscriber List</a></li>
                            	<li class="left_sub_menu"><a href="compaigns.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Send Newsletter</a></li>
                        		<li class="left_sub_menu"><a href="newsletter.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Add New Newsletter</a></li>
                            </span>
                        </div>
                        <li><a href="banners.php"><i class="fa fa-fw fa-th-large"></i> Promotional Banners</a></li>
                        <li><a href="pictures.php?main=2"><i class="fa fa-fw fa-industry"></i> Gallery</a></li>
                        <div class="menutitle" onClick="SwitchMenu('sub3');" style="cursor:pointer">
                        	<li><a href="#"><i class="fa fa-fw fa-cogs"></i> Setting <b class="caret"></b></a></li>
                            <span class="submenu" id="sub3">
                            	<li class="left_sub_menu"><a href="web_setting.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Site Setting</a></li>
                            	<li class="left_sub_menu"><a href="social_setting.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Social Network Setting</a></li>
                                <li class="left_sub_menu"><a href="password_setting.php"><i class="fa fa-fw fa-arrow-circle-right"></i> Password Setting</a></li>
                            </span>
                        </div>
                        
                        <li><a href="logout.php"><i class="fa fa-fw fa-dedent"></i> Logout</a></li>
                    </ul>
            	</div>
            </div>
        </div>