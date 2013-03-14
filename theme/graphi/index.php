<?php /*
	Template Name:Index
	URI: http://lineshjose.com/
	Description: This is a Free WordPress theme built-in widgets and a intuitive theme settings interface... Designed by <a href="http://lineshjose.com/">Linesh Jose</a>. Both the design and code are  released under a <a href="http://creativecommons.org/licenses/by/3.0//">Creative Commons Attribution 3.0 Unported</a> License.
	Version: 11.08
	Author: Linesh Jose 
	Author URI: http://lineshjose.com
	Tags: light, white,Three-columns,  flexible-width, right-sidebar, left-sidebar,  threaded-comments, translation-ready,white, widgets
*/?>
<?php 
	get_header();
	$i=1; 
?>

	
	
<!-- Content section -->
<div id="content" role="main">

	<!-- Title -->
	<h1  class="noborder">
		<?php if (is_category()): ?><?php single_cat_title(); ?> 
		<?php elseif (is_day()): ?>Archive for "<?php the_time('F jS, Y'); ?>"
		<?php elseif (is_month()): ?>Archive for "<?php the_time('F, Y'); ?>"
		<?php elseif (is_year()): ?>Archive for "<?php the_time('Y'); ?>"
		<?php elseif (is_tag()): ?>Archive for "<?php single_tag_title(); ?> "
		<?php elseif (is_search()): ?>Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;
		<?php elseif (is_author()): 
			if(get_query_var('author_name')) :
			$curauth = get_userdatabylogin(get_query_var('author_name'));
			else :
			$curauth = get_userdata(get_query_var('author'));
			endif;
			echo $curauth->display_name; ?>'s  Archives  <?php echo get_the_author() ;?>
		<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])): ?>Blog Archives
		<?php elseif (is_home()): ?>Latest Posts
		<?php else: ?>Page not found.
		<?php endif; ?></h1>
	<!-- end Title -->
	
<?php if (have_posts()) {?>

		<!-- Posts lists -->
		<ul class="posts">
		<?php   while (have_posts()) : the_post();
		
		if($i==2) 
		{ 
			$line=''; 
			$break='<div class="clear"></div>'; 
			$pos='end';
			$i=1; 
		} 
		else 
		{
			$line='<div class="line"></div>';
			$break='';
			$pos='';
			$i=$i+1; 
		} ?>
		
		<?php echo $line;?>
		<!-- post-<?php the_ID(); ?> -->
			<li  <?php post_class($pos); ?> id="post-<?php the_ID(); ?>" >
				<article>
					<header class="entry-header">
						<div class="date"><?php echo get_the_date() ; ?></div>
						
						<div class="clear"></div>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark"  title="Read '<?php the_title(); ?>'"><?php the_title(); ?></a></h2>
					</header>
					<div class="entry-content">
						<div class="thumb">
						<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail(get_the_ID()))) {?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo $title ?>">
						<?php the_post_thumbnail('blog-thumbnail', array('title' => $title,'alt' => $title, 'class' => 'thumb_img'));?>
					</a>
					<?php } else {?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo $title ?>">
						<img src="<?php echo get_stylesheet_directory_uri();?>/images/default_thumb.jpg" alt="<?php echo $title ?>" title="<?php echo $title ?>" width="100"   class="thumb_img" />					</a>
					<?php } ?>
						</div>
						<div class="excerpt"><?php the_excerpt(); ?></div>
					</div>
				</article>
			</li>
			<!-- /post-<?php the_ID(); ?> -->
		<?php echo $break ;?>
		<?php endwhile; // end of one post ?>
		<div class="clear"></div>
		</ul>
			
		<div class="clear"></div>

		<!-- Navigation starts -->
		<div class="navigation">
			<?php lj_pagination();?>
			<div class="clear"></div>
		</div>
		<!-- Navigation ends -->

<?php }  else {?>

	<article id="post-0" class="post no-results not-found">
		<header class="entry-header">
			<h4 class="entry-title"><?php _e( 'Nothing Found', 'lj' ); ?></h4>
		</header><!-- .entry-header -->
		<div class="content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'lj' ); ?></p>
		</div><!-- .entry-content -->
	</article>
<?php }?>

</div>	
<!-- /Content section -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>