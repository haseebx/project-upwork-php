
<div class="clear"></div>

<section class="footerSection">
    <div class="top-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 pdc-off">
                     <form action="" method="post" name="frm_search">
                    <div class="sign-up">
                        <center><h3>SIGN UP FOR OUR NEWS</h3> 
                            <h4>LETTER & PORMOTIONS</h4></center>
                  <center>
                    <div class="letter_con">
                    <div class="news-input">
                    <input type="text" name="signup" class="form-control ne" placeholder="Enter Your Email Address" required="">
                    <span class="news-group-btn">
                    <button class="news-btn" type="submit"> Subscribe </button>
                    </span>
                    </div>
                </div>
              </center>
                </div>
                    </form>
                </div>


                <div class="col-md-6 pdc-off">
                    <div class="news-event">
                        <div class="news-heading">
                            <center>                            
                                <h2>NEWS & EVENTS</h2>
                            </center>
                            <div class="news-sliding-up">
                            <marquee direction="up" scrollamount="5" onmouseover="stop()" onmouseout="start()"> 
                            <p>03/March/2019</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>
                            </marquee>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="mid-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                    <a href="<?=$web_url_1?>home"><img src="<?=$web_url_1?>images/logo2.png"></a>
                </div>
               
                </div>
                 <div class="col-md-6">
                     <div class="social-links-top">
                        <div class="right1">
                           <div class="left1">
                                <ul style="margin: 20px 37px;">
                            <li>
                                <a href="<?=$instagram;?>" target="_blank">
                                    <img class="hvr-bounce-in" width="30px;" src="<?=$web_url_1?>images/instagram.png">
                                </a>
                            </li>
                            <li>
                                <a href="<?=$facebook;?>" target="_blank">
                                    <img class="hvr-bounce-in" width="30px;" src="<?=$web_url_1?>images/facebook.png">
                                </a>
                            </li>
                            <li>
                                <a href="<?=$twitter;?>" target="_blank">
                                    <img class="hvr-bounce-in" width="30px;" src="<?=$web_url_1?>images/twitter.png">
                                </a>
                            </li>
                            <li>
                                <a href="<?=$linkedin;?>" target="_blank">
                                    <img class="hvr-bounce-in" width="30px;" src="<?=$web_url_1?>images/linkedin.png">
                                </a>
                            </li>
                        </ul>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>


        <div class="container-fluid">
        <div class="end-footer">
            <div class="row">
                <div class="col-md-2">
                    <div class="end-footer-heading">
                        <h4>INFORMATION</h4>
                    </div>
                    <ul class="list-unstyled footer-text">
                <li><a href="<?=$web_url_1?>">Home</a></li>
                <li><a href="<?=$web_url_1?>/About-us">About Us</a></li>
                <li><a href="<?=$web_url_1?>/Inquiry-basket">Inquiry Basket</a></li>
                <li><a href="<?=$web_url_1?>/Contact-us">Contact Us</a></li>
               <li><a href="<?=$web_url_1?>/terms">Terms &amp; Condition</a></li>
                </ul>
                </div>



                <div class="col-md-2">
                    <div class="end-footer-heading">
                        <h4>CATEGORIES</h4>
                    </div>
                    <ul class="list-unstyled footer-text">
                           <?php
                $query = qry_run("Select * from ms_main where pshow = 'Yes'");
                if (num_rec($query) > 0){
                while($rs = fetch_rec($query)){
                $qryy1 = qry_run("select * from ms_main where mainid='".$rs['mainid']."'");
                $roww1 = fetch_rec($qryy1);
                $mmname1 = $roww1['plink'];
                $qryy2 = qry_run("select * from ms_section where  mainid='".$rs['mainid']."'");
                $roww2 = fetch_rec($qryy2);
                $ssname2 = $roww2['plink'];
                $lnk5555 = $web_url_1.rpd($mmname1)."/".rpd($ssname2);
                ?>
                                                
                        <li>
                            <a href="<?=$lnk5555?>">
                                <?=$rs['pname']?></a>
                        </li>                                                    
                                 <?php }}?>                           
                    </ul>
            </div>



              <div class="col-md-6 col-xs-12">
                    <div class="end-footer-heading">
                        <h4>LOCATION</h4>
                    </div>
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d215397.86882263774!2d74.40231087831886!3d32.48361099782615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391eea5674db6cfd%3A0xa8d03983946d4744!2sSialkot%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1571482428530!5m2!1sen!2s" width="600" height="180" frameborder="0" style=" margin-bottom: 30px; border:0;" allowfullscreen="";></iframe>

                    </div>
                </div>




                <div class="col-md-2">
                    <div class="end-footer-heading">
                        <h4>QUICK CONTACT</h4>
                    </div>
                <ul class="list-unstyled footer-text">
                <li><a href="https://hobei-intl.com//Contact-us"> <span></span>  <?=$web_address;?></a></li>
                <li><a href="https://hobei-intl.com//Contact-us"> <span>Tel:</span>  <?=$web_phone;?></a></li>
                <li><a href="https://hobei-intl.com//Contact-us"><span>Cell:</span>  <?=$web_mobile;?></a></li>
                <li><a href="https://hobei-intl.com//Contact-us"><span>Email:</span>  <?=$web_email;?></a></li>
                </ul>
                </div>
        </div>
                            <a href="https://info.flagcounter.com/HXcS"><img src="https://s05.flagcounter.com/count2/HXcS/bg_FFFFFF/txt_000000/border_CCCCCC/columns_5/maxflags_15/viewers_0/labels_0/pageviews_0/flags_0/percent_0/" alt="Flag Counter" border="0"></a>
    </div>

</div>

</section>


<div class="copy_right_bg"> 
<div class="container-fluid"> 
<div class="row"> 
    <div class="col-md-12">
        <div class="copy_right_text"> <p><?=$copy_right?><?=$design_develop?></p></div>
    </div>
</div>
</div>
</div>
<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
           
            whatsapp: "+923137151616", // WhatsApp number
            call_to_action: "Message us", // Call to action
            
            button_color: "#0f15af", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(92247668, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/92247668" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->