<?php /*  
	Function Name: Graphi
	URI: http://linesh.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://linesh.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 15.05
	Author: Linesh Jose 
	Author URI: http://linesh.com/
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready,white, widgets
*/


	include(TEMPLATEPATH.'/admin/admin.php');
	
	function custom_login_logo()
	{
		echo '
		<style type="text/css">
		h1 a { background:url('.get_bloginfo('template_directory').'/images/lineshjose_logo_text.png) center bottom no-repeat !important; }
		</style>';
	}
	add_action('login_head', 'custom_login_logo');
	
	/* Localization Initialize ********************************************/
		load_theme_textdomain('lj');
		if (function_exists('automatic_feed_links')) automatic_feed_links();
	//------------------------------------------------------------------------->
	
	
	// This theme uses post thumbnails ---------------------------------------->
		if (function_exists('add_theme_support'))// added in 2.9
		{ 
			add_theme_support( 'menus' );
			set_post_thumbnail_size( 150, 150, false );
			add_theme_support( 'post-thumbnails');
			add_image_size('blog-thumbnail', 100, 100, false); // blog post thumbnail size, box resize mode
			add_image_size('sidebar-thumbnail', 40, 40,false); // sidebar blog thumbnail size, box resize mode
		}
	//------------------------------------------------------------------------->

	// This for exclude page from search result ------------------------------->
		function Exclude_Pages($query) 
		{
			if ($query->is_search) {
			$query->set('post_type', 'post');
			}
			return $query;
		}
		add_filter('pre_get_posts','Exclude_Pages');
	//------------------------------------------------------------------------->

		
	// Create Custom Naviation Menus ------------------------------------------------->
		if (function_exists('register_nav_menus'))
		{
			function register_my_menus() {
				register_nav_menus(
					array(
					'MainNavigation' => __( 'Main Navigation','lj' ),
					'FooterNavigation' => __( 'Footer Navigation','lj' )
					)
				);
			}
			add_action( 'init', 'register_my_menus' );
		}

	//------------------------------------------------------------------------->
	
	// Display Custom Naviation Menus ------------------------------------------------->
		function lj_get_custom_nav($menu_name='',$place='')
		{
		
			// Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
			// This code based on wp_nav_menu's code to get Menu ID from menu slug
			$locations = get_nav_menu_locations() ;
			
			
			if(is_single() || is_home() || is_archive() || is_category()) {$class='current_page_item';} else {$class='';}
			echo  '<li class="'.$class.'"><a href="' . get_bloginfo('url'). '">Home</a></li>';
			if ($locations[ $menu_name ]  ) 
			{
				$menu_args =array( 
							'container' => '',
							'items_wrap' => '%3$s',
							'menu' =>$locations[ $menu_name ]  
							);
				wp_nav_menu($menu_args);
				
				
			} 
			else 
			{
				if($place=='footer'){ wp_list_pages('title_li=&depth=1');}
				 else {	wp_list_pages('title_li=');}
			}
		}
	//------------------------------------------------------------------------->

	
	
	// Print the <title> tag based on what is being viewed.-------------------->
		function lj_title()
		{
			global $page, $paged;
			wp_title( '-', true, 'right' );
			bloginfo( 'name' );// Add the blog name.
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " - $site_description";
				
			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
			echo ' - ' . sprintf( __( 'Page %s', 'lj' ), max( $paged, $page ) );
		}
	//------------------------------------------------------------------------->
		
	
	// Print the <description> tag based on what is being viewed.-------------->
		function lj_description() 
		{
			if (is_single() || is_page() )
						{
							if ( have_posts() ) { while ( have_posts() ) {the_post(); 
							the_excerpt_rss();
							}}
						}
					else
						{
							 lj_title().' ' ;
						}
						
		}
	//------------------------------------------------------------------------->
		
	
	// Print the robot text  based on what is being viewed. ------------------->
		function lj_robotx() {
			if(is_search()) 
			{ echo "noindex, nofollow"; }  
			else { echo "index,follow" ;} 
		}

	//------------------------------------------------------------------------->

	

	// Widgets ---------------------------------------------------------------->
		if ( function_exists('register_sidebar') )
		{
			 register_sidebar(array(
				'name' => 'Graphi Sidebar',
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widgettitle">',
				'after_title' => '</h3>',
			));
		}
	//------------------------------------------------------------------------->
	
	
	
	// This theme uses post excerpt_length ------------------------------------>
		function new_excerpt_length($length) {	return 30;	}
		function new_excerpt_more($more) {return '...'; }
		
		add_filter('excerpt_more', 'new_excerpt_more');
		add_filter('excerpt_length', 'new_excerpt_length');
	//------------------------------------------------------------------------->
	
	
	


	// Pagination -----------------------------------------------------------
		function lj_pagination($range = 15) 

		{

			global $paged, $wp_query;
			if ( !$max_page ) { $max_page = $wp_query->max_num_pages;}
			if($max_page > 1){
				if(!$paged){$paged = 1;}
				previous_posts_link('&laquo; Previous');
				if($max_page > $range){
					if($paged < $range){
						for($i = 1; $i <= ($range + 1); $i++)
						{
							if($i==$paged) {echo '<span class="current" >'.$i.'</span>';}
							else {echo '<a href="'.get_pagenum_link($i).'" class="button" >'.$i.'</a>';}
						}
					} elseif($paged >= ($max_page - ceil(($range/2)))){
						for($i = $max_page - $range; $i <= $max_page; $i++)
						{
							if($i==$paged) {echo '<span class="current" >'.$i.'</span>';}
							else {echo '<a href="'.get_pagenum_link($i).'" class="button" >'.$i.'</a>';}
						}
					} elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
						for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++)
						{
							if($i==$paged) {echo '<span class="current" >'.$i.'</span>';}
							else {echo '<a href="'.get_pagenum_link($i).'" class="button" >'.$i.'</a>';}
						}
					}
				} else {
					for($i = 1; $i <= $max_page; $i++)
					{
						if($i==$paged) {echo '<span class="current" >'.$i.'</span>';}
						else {echo '<a href="'.get_pagenum_link($i).'" class="button" >'.$i.'</a>';}
					}
				}
			
			next_posts_link('Next &raquo;');
			}
		}
	//-----------------------------------------------------------------------




	//Callback functions for comment output
	function mytheme_comment($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
	   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <table cellpadding="0" cellspacing="0" id="comment-<?php comment_ID(); ?>">
			<tr>
				<td class="avt">
					<?php if(get_comment_author_url()){?><a href="<?php echo get_comment_author_url();?>"><?php echo get_avatar( $comment, 32 ); ?></a><?php } 
							else { echo get_avatar( $comment, 32 );} ?>
				</td>
				<td >
				<div class="info">
				<?php printf(__('<cite class="fn">%s</cite>','lj'), get_comment_author_link()) ?>
				<small class="date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"> <?php printf(__('%1$s &bull; %2$s'), get_comment_date(),  get_comment_time()) ?></a></small>
				<?php if ( $comment->comment_approved == '0' ) : ?>(<span><em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em></span>)<?php endif; ?> 			
				<span> <?php edit_comment_link( __( 'Edit this', 'twentyten' ), ' ' );?> </span>
				<span class="reply">&nbsp;<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
				</div>
			<?php comment_text() ?>
				</td>
				</tr>
			</table>
			<!-- #comment-##  -->
	<?php
			}
			
			
	// add a microid to all the comments
	function comment_add_microid($classes) {
		$c_email=get_comment_author_email();
		$c_url=get_comment_author_url();
		if (!empty($c_email) && !empty($c_url)) {
			$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
			$classes[] = $microid;
		}
		return $classes;	
	}
	add_filter('comment_class','comment_add_microid');
?>