	<?php /*
	Template Name: Sidebar
	*/?>
	
	
	<!-- Sidebar -->
	<div id="sidebar">
	<div class="connection">
				<ul>
						<li><a href="http://facebook.com/<?php echo get_option('lj_facebook');?>" class="facebook" title="Facebook" target="_blank">
						<img src="<?php bloginfo('template_url'); ?>/images/transper.gif" class="facebook"  alt="Facebook" title="Facebook"/> </a></li>
						
						<li><a href="http://twitter.com/<?php echo get_option('lj_twitter');?>"  class="twitter" title="Twitter"  target="_blank">
						<img src="<?php bloginfo('template_url'); ?>/images/transper.gif" class="twitter"  alt="Twitter" title="Twitter"/> </a></li>
						
						<li><a href="http://plus.google.com/<?php echo get_option('lj_google_plus');?>"  class="google_plus"title="Google Plus" target="_blank">
						<img src="<?php bloginfo('template_url'); ?>/images/transper.gif" class="google_plus"  alt="google plus" title="Google Plus"/></a></li>
						
						<li><a href="<?php bloginfo_rss( 'rss2_url' ); ?>"  class="rss" title="Syndicate this site using RSS 2.0" target="_blank">
						<img src="<?php bloginfo('template_url'); ?>/images/transper.gif" class="rss"  alt="RSS Subscribe" title="RSS Subscribe"/></a></li>
					</ul>
				</div>
		
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if (!dynamic_sidebar("Graphi Sidebar") ) : ?>

		<div class="widget">
		<?php _e('<h3>Archives</h3>'); ?>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
		</div>

	<?php endif; ?>
		<div class="widget">
		<h3>Feeds</h3>
		<ul >		
		<li><a href="<?php bloginfo_rss( 'rss2_url' ); ?>" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS 2.0</abbr></a></li>
		<li><a href="<?php bloginfo_rss( 'atom_url' ); ?>" title="Syndicate this site using atom">Entries <abbr title="Really Simple Syndication">Atom</abbr></a></li>
		<li><a href="<?php bloginfo_rss( 'comments_rss2_url' ); ?>" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS 2.0</abbr></a></li>
		</ul>
		</div>

	</div>
	
	<!-- Sidebar  ends-->	