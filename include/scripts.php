<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=$web_url_1?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$web_url_1?>lightbox/simple-lightbox.js"></script>
<!-- Form JS -->

<script src="<?=$web_url_1?>include/chk_frm.js"></script>
<script src="<?=$web_url_1?>js/incrementing.js"></script>
<script src="<?=$web_url_1?>js/scripts.js"></script>
<!-- Hover Script -->
<script src="<?=$web_url_1?>js/mgset.js"></script>
<script>


</script>

<script>
$(document).ready(function() {
         $window = $(window);
    $(window).scroll(function(){

        if($window.scrollTop() > 100)
            $("#menufix").addClass("active");
        else    
            $("#menufix").removeClass("active");
            
        if($window.scrollTop() > 300)
            $("#menufix").addClass("active_more");
        else    
            $("#menufix").removeClass("active_more");
    });


});
</script>
<!-- Search Form -->
<script type="text/javascript">
  function testAnim(x) {
    $('.modal-content').removeClass().addClass(x + ' modal-content animated');
  };

  $(document).ready(function(){
    $('.js--triggerAnimation').click(function(e){
      e.preventDefault();
      var anim = $('.js--animations').val();
      testAnim(anim);
    });

    $('.js--animations').change(function(){
      var anim = $(this).val();
      testAnim(anim);
    });
  });
</script>

<script type="text/javascript">
$(function() {
	//console.log( "ready!" );
	$('.toggleSearch').click(function(e){
	  e.preventDefault();
	  $('#searchp').slideToggle(500);
	});
});
</script>
  
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>


</body>
</html>