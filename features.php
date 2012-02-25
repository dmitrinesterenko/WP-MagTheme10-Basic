<?php
/*
Template Name: Feature Articles on Home Page
*/
?>
<?php $count = 1 ?>
<?php 
global $feature_count;
$feature_count = 0;
if (!($feature_cat)) {
	$my_query = new WP_Query(array('cat'=>$featured_id,'showposts'=>10)); 
} else {
	// this lets us find all posts that are under the Featured category as filed under another category (including that category's children)
	$my_query = new WP_Query(array('cat'=>$feature_cat,'category__and'=>array($featured_id),'showposts'=>10)); 
}
if (!$my_query->have_posts() && $feature_failsafe != "") {
	$my_query = new WP_Query($feature_failsafe);	
}
if ($my_query->have_posts()) {
?>
		<div id="featured">
			<!-- 
			<?php if ($current_issue_id && $current_issue_page) { ?>
			<div class="coverimage cover<?php echo mt_rand(1,4); ?>" >
				<h2><a href="<?php echo get_page_link($current_issue_id); ?>" title="Current Issue: <?php echo $current_issue_page->post_title ?>"><span>Current Issue</span></a></h2>
			</div>
			<?php } ?>
			-->

			<div id="my-glider">

				<div class="scroller">

					<div class="content">
<?php while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate[$post->ID] = $post->ID; ?>
					
						<div class="section" id="section<?php echo $count; ?>">
							
							
							<?php if (get_post_meta($post->ID, post_image)) { ?>
								
									<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
									
										<img src="<?php echo get_post_meta($post->ID, post_image, true); ?>"  class="feature-photo" 
										alt="feature photo" />
									</a>
								
							<?php } ?>
							<div class="feature-entry" id="post-<?php the_ID(); ?>">
							
							
<?php if (is_home()) { ?>
<?php /*<h3>In This Issue...</h3>
<h3>Feature Article #<?php echo $count; ?></h3> 
 */ ?>
<?php } ?>
								<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
									<?php the_title(); ?>
									</a>
								</h2>

								<?php the_excerpt(); ?>

<?php /*the_author_posts_link(); ?> | <?php the_time('F jS, Y') ?> | */ ?>
<a class="more-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">More</a>

							</div>
							

						</div>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

<?php if (0) { ?>
						<div class="section" id="about">
							<div class="feature-entry">
								<h2>About this Site</h2>
<?php $my_query = new WP_Query('pagename=about'); while ($my_query->have_posts()) : $my_query->the_post(); ?>
								<?php the_excerpt(); ?>
								<div><a class="more-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More</a></div>
								<div style="clear:both;"></div>            
<?php endwhile; ?>							
							</div>
						</div>
<?php } ?>

					</div>

				</div>

				<div class="controls">

					<ul class="clearfix">

						<li class="feat-nums">Feature Articles</li>

<?php $feature_count = $count-1; $count = 1 ?>
<?php while ($count <= $feature_count) : ?>

						<li><a href="#section<?php echo $count; ?>"><?php echo $count; ?></a></li>

<?php $count = $count + 1 ?>
<?php endwhile; ?>

<?php if (0) { ?>
						<li class="feat-about"><a href="#about">About this Site</a></li>
<?php } ?>
					</ul>

				</div>

			</div>
<?php if ($feature_count > 1) { ?>
			<script type="text/javascript" charset="utf-8">
				var my_glider = new Glider('my-glider', {duration:0.5, autoGlide:true, frequency:8});
			</script>
<?php } ?>
			<div style="clear:both;"></div>
		</div>
<?php } ?>

<?php include (TEMPLATEPATH . '/banner640.php'); ?>

