<?php /*
Template Name: Single post view
*/?>
<?php get_header(); ?>

<!-- Content section -->
<div id="content" role="main">
	<!-- Title -->
	<h1 class="pagetitle"><?php the_title(); ?></h1>
	<!-- end Title -->
		<!-- post-<?php the_ID(); ?> -->
		<div <?php post_class($pos); ?> id="post-<?php the_ID(); ?>" >
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
			<header class="entry-header">
				<ul class="metadata">
					<li class="date"><!-- Post Date--><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>/" ><time datetime="<?php echo get_the_date('c'); ?>" pubdate="<?php echo get_the_date('c'); ?>"><?php echo get_the_date() ; ?></time></a></li>
					<li class="category"><?php the_category(' , ') ?></li>
					<!-- Post Comments-->
					<li class="comment"><?php comments_popup_link('No comments', '1 comment', '% comments', ''); ?></li>
					<?php edit_post_link('Edit this','<!-- Post Edit--><li class="edit">','</li>'); ?> 
				</ul>
			</header>
			
			<div class="content">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<div class="navigation">', 'after' => '</div>', 'next_or_number' => '', 'nextpagelink'     => __('Read More<big>&raquo;</big>'), 'previouspagelink' => __('<big>&laquo;</big>Go Back'))); ?>
			</div>
				
		</article>
		<?php endwhile; else: ?>
		<?php endif; ?>		
		
		<?php comments_template(); ?>
			
		</div>
		<!-- /post-<?php the_ID(); ?> -->
		
</div>
<!-- /Content section -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>