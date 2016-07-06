<?php /*
	Template Name:Header
	URI: http://linesh.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://linesh.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 15.05
	Author: Linesh Jose 
	Author URI: http://linesh.com/
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready,white, widgets
*/?>
<!DOCTYPE html>
<!--[if IE 6]>
	<html id="ie6" <?php language_attributes(); ?>>
	<![endif]-->
<!--[if IE 7]>
	<html id="ie7" <?php language_attributes(); ?>>
	<![endif]-->
<!--[if IE 8]>
	<html id="ie8" <?php language_attributes(); ?>>
	<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head profile="http://gmpg.org/xfn/11">
<title>
<?php lj_title();	?>
</title>
<meta name="description" content="<?php lj_description(); ?>" />
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="robots" content="<?php lj_robotx();?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="Creator" content="Linesh Jose( http://www.lineshjose.com)" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<?php 
	// support for comment threading 
	if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script('comment-reply'); 
		
	// Dynamic wp headers 
	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<div id="header">
  <div id="container">
    <header id="branding" role="banner">
    <div class="logo">
      <hgroup>
        <?php if( get_option('lj_logo') && get_option('lj_logo_header') == "yes" )  { ?>
        <a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('lj_logo'); ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
        <?php } else if(get_option('lj_logo_header') == "default"  ||  !get_option('lj_logo_header') ){ ?>
        <a href="<?php bloginfo('url'); ?>/"><img src="<?php echo  get_stylesheet_directory_uri();?>/images/logo.png" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
        <?php } else if(get_option('lj_logo_header')=="no") { ?>
        <div class="title"><a href="<?php bloginfo('url'); ?>/">
          <?php bloginfo('name'); ?>
          </a></div>
        <?php } ?>
      </hgroup>
    </div>
    
    <!-- Start top_right -->
    <div class="top_right search alignright"> 
      <!--  Search box-->
      <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
        <input type="text" class="textbox searchbox"  name="s" id="s" placeholder="Serach" required />
        <input type="hidden" id="searchsubmit" value="Search" />
      </form>
      <!--  Search box--> 
    </div>
    <!-- end top_right -->
    <div class="clear"></div>
    
    <!--  Main menu -->
    <div class="menu">
      <nav id="access" role="navigation">
        <ul id="qm0" class="qmmc">
          <?php lj_get_custom_nav('MainNavigation');?>
          <li class="qmclear"></li>
          <script type="text/javascript">qm_create(0,false,0,500,false,false,false,false,false);</script>
          <div class="clear"></div>
        </ul>
      </nav>
    </div>
    <!--  /Main menu -->
    <div class="clear"></div>
  </div>
  <header>
</div>
<!-- end header -->

<div id="container">
<!-- Main Page -->
<div id="page">
