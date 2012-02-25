
<?php if (get_post_meta($post->ID, post_image)) { ?>
	<?php if(strpos(get_post_meta($post->ID, post_image, true), "youtube.com") !== false ){ ?>
				
				
			<div class="post_image">
				<object width="300" height="174">
				<param name="movie" value="<?php echo get_post_meta($post->ID, post_image, true); ?>"></param>
				<param name="allowFullScreen" value="true"></param>
				<param name="allowscriptaccess" value="always"></param>
				<param name="wmode" value="transparent"></param>
				<embed src="<?php echo get_post_meta($post->ID, post_image, true); ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="300" height="174"></embed>
				</object>
				
			</div>
		
	<?php } else if(strpos(get_post_meta($post->ID, post_image, true), "vimeo.com") !== false ){ ?>
			<div class="post_image">
				<iframe src="<?php echo get_post_meta($post->ID, post_image, true);?>" width="300" height="174" frameborder="0"></iframe>
				
			</div>
	<?php }else{ ?>
				
				<div class="post_image">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
						<img src="<?php echo get_post_meta($post->ID, post_image, true); ?>" width="300px" class="post-image" alt="post image" />
					</a>
				</div>
											
	<?php } ?>  				
<?php } else if (get_post_meta($post->ID, post_thumbnail)) { ?>
				<div class="thumbnail">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
						<img src="<?php echo get_post_meta($post->ID, post_thumbnail, true); ?>" class="post-thum" alt="post thumbnail" />
					</a>
				</div>							
<?php } else { ?>
<!--
				<div class="thumbnail">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/images/def-thumb.gif" class="post-thum" alt="post thumbnail" />
					</a>
				</div>
				-->							
<?php } ?>