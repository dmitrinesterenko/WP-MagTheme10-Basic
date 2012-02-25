<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>
<?php if ($comments) : ?>
    <a href="#respond" title="<?php _e("Leave a comment"); ?>">&nbsp;</a>
	<ol class="commentlist clearfix">
	<?php foreach ($comments as $comment) : ?>
		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<?php 
			if ( !empty( $comment->comment_author_email ) ) {
				$md5 = md5( $comment->comment_author_email );
				$default = urlencode( get_bloginfo('stylesheet_directory') . '/images/nophoto.gif' );
				echo "<img class='comment-grav' src='http://www.gravatar.com/avatar.php?gravatar_id=$md5&amp;size=48&amp;default=$default&amp;rating=PG' alt='' />";
			}
			?>
			<p class="commentmetadata"><cite><?php comment_type(); ?> by <?php comment_author_link() ?></cite> on <a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j F Y') ?></a>:</p>

			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>			
			<?php comment_text() ?>
			<div style="clear:both;"></div>
		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<style>
	.fbFeedbackContent .mainCommentForm{
		border:0px;	
	}
</style>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=101724923237429";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="2" data-width="648"></div>

<div id="classic_comments" style="display:none; visibility:hidden">
    <h3 id="respond">Post a Response</h3>
    <p id="respondsub">This is a <a href="http://www.gravatar.com/">gravatar</a>-friendly blog, enter your e-mail address to use your gravatar.</p>
    
    
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
    <?php else : ?>
    
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    
    <?php if ( $user_ID ) : ?>
    
    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
    
    <?php else : ?>
    
    <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
    <label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
    
    <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
    <label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>
    
    <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
    <label for="url"><small>Website</small></label></p>
    
    <?php endif; ?>
    
    <?php /* <p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p> */ ?>
    
    <p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>
    
    <input name="submit" class="button" type="submit" id="submit" tabindex="5" value="Submit Comment" />
    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    
    <?php do_action('comment_form', $post->ID); ?>
    
    </form>
</div>    

<?php endif; ?>

<?php endif; ?>