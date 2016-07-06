<?php /*
	Template Name: 404
	URI: http://linesh.com/
	Description:  Feature-packed theme with a solid design, built-in widgets and a intuitive theme settings interface... Designed by <a href="http://lineshjose.info/">Linesh Jose</a>.
	Version: 15.05
	Author: Linesh Jose 
	Author URI: http://linesjose.com
	roTags: light, white,two-columns, Flexible-width, right-sidebar, left-sidebar, theme-options, threaded-comments, translation-ready, custom-header	
	http://linesh.com/
	Both the design and code are released under GPL.
	http://www.opensource.org/licenses/gpl-license.php
*/?>
<?php get_header(); ?>

<!-- Content section -->
<div id="content" role="main">
	<!-- Title -->
	<h1>Page Not Found</h1>
	
	
	
	<!-- 404 -->
	<div class="content">
		<article>
		<h4 class="title">Can't find that page</h4>
		<p >I'm sorry but it appears that you found a page that can't be found on www.lineshjose.com. It may have been moved, deleted, or you may have accidently mistyped the URL in the address bar.</p>
		
		<p>Since this isn't the page you were looking for (unless you are a fan of 404 pages then in that case, go nuts) I will see what I can do to help you find the correct page.</p>
		<p>Let me help you find what you came here for:</p>
		
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
			<table cellpadding="0" cellspacing="3">
				<tr>
					<td>Search for it:</td>
					<td>
						<input type="text" class="textbox searchbox" value="" name="s" id="s"  />
						<input type="hidden" id="searchsubmit" value="Search" />
					</td>
					<td><input type="submit" id="searchsubmit" value="Go" class="button searchbutton" /></td>
				</tr>
			</table>
		</form>
	</article>
	</div>
	<!-- /404 -->
</div>
<!-- /Content section -->	
<?php get_sidebar(); ?>
<?php get_footer(); ?>