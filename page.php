<?php /*
Template Name: Default page
*/?>
<?php get_header(); ?>
<!-- Title -->
	<h1 class="pagetitle"><?php the_title(); ?></h1>
	<!-- end Title -->
		<!-- post-<?php the_ID(); ?> -->
		<div <?php post_class($pos); ?> id="post-<?php the_ID(); ?>" >
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article>
				
			<div class="content">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<div class="navigation">', 'after' => '</div>', 'next_or_number' => '', 'nextpagelink'     => __('Read More<big>&raquo;</big>'), 'previouspagelink' => __('<big>&laquo;</big>Go Back'))); ?>
			</div>
				
		</article>
		<?php endwhile; else: ?>
		<?php endif; ?>		
		
		</div>
		<!-- /post-<?php the_ID(); ?> -->
<?php get_footer(); ?>