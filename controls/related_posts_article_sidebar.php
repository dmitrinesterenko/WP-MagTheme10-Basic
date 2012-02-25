<!-- sentimentalist related posts -->
<style>
	.related_posts .related_post
	{
		width: 130px;
		padding-right:10px;
		float:left;
	}
	
	ul.pop li{
		height:105px;
		padding: 5px 10px !important;
	}
</style>
<div class="related_posts">
						<h2>Related Posts</h2>
<?php if(function_exists('get_ald_crp')) {
			
			$searches = get_ald_crp(4);
			
			foreach($searches as $search):
				
			?>
				<ul class="pop">
					<li>
						<div class="thumbnail">
							<a href="<?php echo get_permalink($search->ID); ?>" rel="bookmark" title="<?php echo $search->post_title; ?>">
								<?php
									$thumbnail_source = get_post_meta($search->ID, post_thumbnail, true);
									if(strlen($thumbnail_source) == 0){
										$thumbnail_source = '/blog/wp-content/themes/WP-MagTheme10-Basic/images/def-thumb.gif';
									}
								?>
								<img src="<?php echo $thumbnail_source; ?>" class="post-thum" alt="<?php echo $search->post_title; ?>" />
							</a>
						</div>
						
						<div class="post_title">
							<a href="<?php echo get_permalink($search->ID); ?>" rel="bookmark" title="<?php echo $search->post_title;?>">
								<?php echo $search->post_title; ?>
							</a>
						</div>
					</li>
					
				</ul>
			<?php
			endforeach;
	  }
?>
</div>
<div class="clear"></div>