<?php /*
Template Name: Footer
*/?>

<div class="clearboth"></div>
</div>
<div id="footer">
  <div  class="alignleft">
    <p>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url') ?>">
      <?php bloginfo('name'); ?>
      </a> all rights reserved. </p>
  </div>
  <div  class="alignright righttext">
    <p>Proudly powered by <a href="http://wordpress.org/" title="Semantic Personal Publishing Platform" rel="generator">WordPress</a> | HTML5 WordPress theme by <a href="http://linesh.com/" title="HTML5 WordPress themes" rel="generator">Linesh Jose</a></p>
  </div>
  <div class="clearboth"></div>
  <ul class="lefttext">
    <?php lj_get_custom_nav('MainNavigation',footer);?>
  </ul>
  <?php wp_footer(); ?>
  <div class="clearboth"></div>
</div>
</div>
</body></html>