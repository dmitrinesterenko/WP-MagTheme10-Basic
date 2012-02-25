<?php $author_info=get_the_author_description(); 
	  if($author_info != "") { ?>
				<div id="subhead">
					<h3>About the Author</h3>
					<?php /* this is the author photo pulled from gravatar.com */
					$md5 = md5( $email=get_the_author_email() );
					$default = urlencode( get_bloginfo('stylesheet_directory') . '/images/nophoto.gif' );
					echo "<img class='auth-single-post' src='http://www.gravatar.com/avatar.php?gravatar_id=$md5&amp;size=75&amp;default=$default' alt='author photo' />";
					?>
					<p><?php the_author_description(); ?></p>
					<p style="padding-top:5px;"><a href="<?php bloginfo('url'); ?>/author/<?php the_author_nickname(); ?>">See All Posts by This Author</a></p> 
					<div style="clear:both;"></div>
				</div>
<?php } ?>