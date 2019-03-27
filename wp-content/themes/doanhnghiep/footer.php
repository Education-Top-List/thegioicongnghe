

<footer class="footer">
	<div class="container">
	       <?php 
    $my_postid = 440;//This is page id or post id
    $content_post = get_post($my_postid);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    echo $content;
    ?>
	</div>
</footer>
<div class="scrolltop">
  <i class="fa fa-angle-up" aria-hidden="true"></i> 
</div>
<?php wp_footer(); ?>


 <script>      
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1953938748210615',
          xfbml      : true,
          version    : 'v2.6'
        });
      };

      (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));      
   </script>

   <?php get_template_part('order_fixedf'); ?>
<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>


</body>
</html>