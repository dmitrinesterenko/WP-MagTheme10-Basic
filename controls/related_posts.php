<!-- sentimentalist related posts -->
<style>
	.related_posts .related_post
	{
		width: 130px;
		padding-right:10px;
		float:left;
	}
</style>
<div class="related_posts">
						<h2>Related Posts</h2>
<?php if(function_exists('get_ald_crp')) {
			
			$searches = get_ald_crp(4);
			
			foreach($searches as $search):
				
			?>
				<div class="related_post">

					<div class="thumbnail">
						<a href="<?php echo get_permalink($search->ID); ?>" rel="bookmark" title="<?php echo $search->post_title; ?>">
							<img src="<?php echo get_post_meta($search->ID, post_thumbnail, true); ?>" class="post-thum" alt="<?php echo $search->post_title; ?>" />
						</a>
					</div>
					<!--
					<div class="related_post_title">
						<a href="<?php echo get_permalink($search->ID); ?>" rel="bookmark" title="<?php echo $search->post_title;?>">
							<?php echo $search->post_title; ?>
						</a>
					</div>
					-->
				</div>
			<?php
			endforeach;
	  }
?>
</div>
<div class="clear"></div>