<div class="top_bar"> 
<div class="container-fluid ">
    	<div class="row">
                <div class="col-md-6  col-xs-12">
                    <div class="social-links-top">
                        <ul style="float: left;">
                            <li>
                                <a href="<?=$instagram;?>" target="_blank">
                                    <div class="insta hvr-bounce-in"><img src="<?=$web_url_1?>images/instagram.png"></div>
                                </a>
                            </li>
                            <li>
                                <a href="<?=$facebook;?>" target="_blank">
                                    <div class="facebook hvr-bounce-in"><img src="<?=$web_url_1?>images/facebook.png"></div>
                                </a>
                            </li>
                            <li>
                                <a href="<?=$twitter;?>" target="_blank">
                                    <div class="twitter hvr-bounce-in"><img src="<?=$web_url_1?>images/twitter.png"></div>
                                </a>
                            </li>
                            <li>
                                <a href="<?=$linkedin;?>" target="_blank">
                                    <div class="linkedin hvr-bounce-in"><img src="<?=$web_url_1?>images/linkedin.png"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
    <div class="topright">
    <ul>
        <li><i class="fa fa-phone"></i> &nbsp; <a href="<?=$web_url_1?>contact-us"><?=$web_mobile?></a></li>
        <li><i class="fa fa-envelope"></i>&nbsp; <a href="<?=$web_url_1?>contact-us"><?=$web_email?></a></li>
        </ul>
    </div>
    </div>
</div>
</div>
</div>
<div class="top_bg" data-spy="affix" data-offset-top="19">
	<div class="container-fluid pd-off">
    	<div class="row pd-off">
       
        	<div class="col-md-2 col-sm-6 col-xs-12 pd-off">
            	<div class="logo">
                	<a href="<?=$web_url_1?>home"><img src="<?=$web_url_1?>items/gallery/<?=$logo?>" class="img-responsive" alt="<?=$web_title?>"></a>
                </div>
          	</div>

    			 
    			<div class="col-md-10 col-sm-6 col-xs-12">
    		
    				
                <div class="nav_bar">
                    <nav role="navigation" class="navbar-default " style="background:none;">
                        <div class="navbar-header">
                        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a href="#" style="font:normal 14px Arial; color:#000;" class="navbar-brand visible-xs">Menu</a>
                        </div>
                        
                        <div id="navbarCollapse" class="collapse navbar-collapse">
                        
                        <ul class="nav navbar-nav usmenu" id="navigation">
                    <li><a href="<?=$web_url_1?>">Home</a></li>
                <li><a href="<?=$web_url_1?>/About-us">About Us</a></li>

                            <?php
                            $QRY = qry_run("select * from ms_main where pshow = 'Yes' order by ranking limit 6");
                            if (num_rec($QRY) > 0)
                            {
                            while($rs = fetch_rec($QRY))
                            {
                            ?>
                            <li class="dropdown">
                                <a href="<?=$rs['plink']?>" class="hvr-bounce-to-top affix-a dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?=$rs['pname']?> 
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $QRYs = qry_run("select * from ms_section where pshow = 'Yes' AND mainid = ".$rs['mainid']." order by ranking limit 15");
                                    if (num_rec($QRYs) > 0)
                                    {
                                    while($rss = fetch_rec($QRYs))
                                    {
                                    ?>
                                    
                                    <li >
                                        
                                       
                                       <a href="<?=$web_url_1?><?=rpd($rs['plink'])?>/<?=rpd($rss['plink'])?>"><?=$rss['pname']?></a>
                                        <?php
                                        $QRYc = qry_run("select * from ms_cat where pshow = 'Yes' AND mainid = ".$rs['mainid']." AND secid = ".$rss['secid']." order by ranking");
                                        if (num_rec($QRYc) > 0)
                                        {
                                        while($rsp = fetch_rec($QRYc))
                                        {
                                        ?>
                                     
                                        <?php
                                        }
                                        }
                                        ?>
                                    </li>
                                    <?php
                                    }
                                    }
                                    ?>

                                </ul>
                            </li>
                            <?php
                            }
                            }
                            ?>
                               <li><a href="<?=$web_url_1?>/Contact-us">Contact Us</a></li>

                        </ul>
                        
                        </div>
                    </nav>
                </div>

                
		
            
         
        </div>
    </div>
</div>

<div class="main-menu-area navbar-inverse" >
    <div class="container-fluid">
    	<div class="row">
     
       
        	
            </div>
            
            	
            
         
        </div>
    </div>
          
    </div>
</div>
