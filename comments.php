	<fieldset id="comments">

	<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
			die ( __('Please do not load this page directly. Thanks!','lj') );
	if ( post_password_required() ) { ?>
	<p class="nocomments">
	  <?php _e('This post is password protected. Enter the password to view comments.','lj'); ?>
	</p>
	</fieldset>
	<?php
		return;
	}
	// Show the comments
	if ( have_comments() ) : ?>
	<legend> <?php comments_number(__('0 Comments','lj'),  __('1 Comment','lj'), '% '.__('Comments','lj').'');?></legend>
	<ol class="commentlist">
	  <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
	</ol>

	<? // Begin Trackbacks ?>
	<?php foreach ($comments as $comment) : ?>
	<?php if ($comment->comment_type == "trackback" || $comment->comment_type == "pingback" || ereg("<pingback />", $comment->comment_content) || ereg("<trackback />", $comment->comment_content)) { ?>
	<?php if (!$runonce) { $runonce = true; ?>

	<h3 ><?php _e('Trackbacks','lj'); ?></h3>
	<ol class="commentlist">
	  <?php } ?>
	  <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>"> <cite>
		<?php comment_author_link() ?>
		</cite> </li>
	  <?php } ?>
	  <?php endforeach; ?>
	  <?php if ($runonce) { ?>
	</ol>
	<?php } ?>
	<? // End Trackbacks ?>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<!-- .navigation -->
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'twentyten' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
				<div class="clearboth"></div>
			</div>
			<!-- .navigation ends -->
			<?php endif; // check for comment navigation ?>
			
	</fieldset>
	
	<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
	</fieldset>
	<?php else : ?>
		<p class="nocomments">
		  <?php _e('Comments are closed.','lj'); ?>
		</p>
		</fieldset>
		
	<?php endif; ?>
	<?php endif; ?>

	
	<!-- add new comment ends ----->	
	<?php if ('open' == $post-> comment_status) : ?>
	<div  id="respond">
	 <?php if ( $user_ID ) : ?>
	  <p class="alignright">
		<?php _e('Logged in as','lj'); ?>
		<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> &bull; <a href=" <?php echo wp_logout_url($redirect); ?>">
		<?php _e('Log out','lj'); ?>
		&raquo;</a></p>
	  <?php endif; ?>
	
	
	<h3 ><?php _e('Leave a Response','lj'); ?></h3>
	

	<div id="cancel-comment-reply">
	  <?php cancel_comment_reply_link(__('<br/>Click here to cancel reply.','lj')); ?> 
	</div>
	
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p>
	  <?php _e('You must be','lj'); ?>
	  <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">
	  <?php _e('logged in','lj'); ?>
	  </a>
	  <?php _e('to post a comment.','lj'); ?>
	   </p>
	  
	  <?php else : ?>
	  
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<table cellpadding="0" cellspacing="0" >
		<tr> <td>
			<?php if (get_option("comment_moderation") == "1") { ?>
			<p>
			<?php _e('Please note: comment moderation is enabled and may delay your comment. There is no need to resubmit your comment.','lj'); ?>
			</p>
			<?php } ?>
	  
	  <?php if (!$user_ID ) : ?>
			<table cellpadding="0" cellspacing="0" >
				<tr>
					<td align="left"><span><?php if ($req) echo "*"; ?></span><label for="author"> Name</label><br /><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1"  class="textbox" required="required" /></td>
					<td><span><?php if ($req) echo "**"; ?></span><label for="email"> Mail</label><br /><input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" class="textbox"  required="required" /></td>
					<td><label for="url">Website</label><br /><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" class="textbox"  /></td>
				</tr>
			</table>
	  <?php endif; ?>
	  <?php comment_id_fields(); ?>
	  </td></tr>
			<td >
			<span><?php if ($req) echo "*"; ?></span><label for="comment">Your Comment</label>
			<textarea name="comment" id="comment" cols="10" rows="10" tabindex="4" required="required" ></textarea>
			<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>"  />
			<input name="submit" type="submit" id="submit" class="button" tabindex="5" value="<?php _e('Submit Comment','lj'); ?>" />
			<input name="Reset" type="Reset" id="submit" tabindex="5" value="Clear"  class="button"/>
				<span>*</span> Required , <span>**</span> will not be published.
					</td>
				</tr>
			</table>
	  <?php do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif; ?>
	</div>
	<?php endif; ?>
