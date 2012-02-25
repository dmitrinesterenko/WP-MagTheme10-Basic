<?php get_header(); ?>
	<div id="page" class="clearfix">

		<div id="contentleft">

<?php if ( $paged < 2 && is_home()) { // Do stuff specific to first page?>
				
	<?php include (TEMPLATEPATH . '/features.php'); ?>
	
				<div id="content">
	
					<div class="home-post-list-1 clearfix">
	
						<h3 class="home-post-list">Recent Articles</h3>			
	<?php $count = 1 ?>
	<?php 
	/* NOTE:
	The reason why we aren't doing this:
		//query_posts("cat=-".$news_cat_id.'&showposts=15');	// exclude anything under 'News'
		//if (have_posts()) : while ($count <= 5 && have_posts()) : the_post();
	is because the way WP's "cat=-6" items work is that (instead of doing an exception or outer join on the 
	taxonomy tables) they do something simliar to "AND POST ID NOT IN (61,62,63..)" (where 61,62,63 are all 
	posts in category 6). This is fine until you get a LOT of posts in category 6. then for some reason WP or
	MySQL starts ignoring the Order By Date, and things get all out of whack. So we reimplemented any calls to
	cat=2,3,-6 into the following logic: find all categories and subcategories under 2 and 3, and then
	remove 6 (and its children) from that array, and find those. Unfortunately this still leaves crossposted
	items in the results (a post in category 2 AND 6). So we have to filter those out afterwards.
	
	It actually isn't a problem on this page, but is a problem on the Music (category-29) and Culture (category-30)
	pages, that include the main category tree but exclude reviews. It's really a problem on the Culture page 
	for an article like a theater review (which would be filed under Theater and Reviews!). 
	*/
	
	// display any non-news articles
	$c_exclude = array_merge(array($news_cat_id),get_term_children($news_cat_id, 'category'));
	$c_include = array_diff(get_all_category_ids(), $c_exclude);
	$my_query = new WP_Query(array('category__in'=>$c_include,'showposts'=>16)); 
	// show 6 items if 4 were featured (10 total). note that we don't have this logic on the Music/Culture pages,
	// since /category/music/page/2/ includes reviews. (and likewise for Culture.)
	if ($my_query->have_posts()) : while ($count <= (16-$feature_count+1) && $my_query->have_posts()) : $my_query->the_post();
	if( $post->ID == $do_not_duplicate[$post->ID] ) continue; 
	$do_not_duplicate[$post->ID] = $post->ID;
	?>
	<?php $post_class = ('home-post-1' == $post_class) ? 'alt-home-post-1' : 'home-post-1'; ?>
	
						<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">
	
							<div class="entry clearfix">
							<h2 class="home-list"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	
	<?php include 'controls/post_slug.php'; ?>
	<?php include 'controls/post_list_image.php';?>
						
								<?php the_excerpt(); ?>
	
							</div>
	
							<div class="bottom"><?php the_time('j M Y') ?> <?php if (0) { the_author_posts_link(); ?> <?php } comments_popup_link('', '| 1 comment', '| % comments'); ?> | <a class="more-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">More</a></div>
	
						</div>
	<?php $count = $count + 1; ?>
	<?php endwhile; endif; ?>
	
						<div style="clear:both;"></div>
	
	<?php include (TEMPLATEPATH . '/bot-nav.php'); ?>
	
					</div>
	
	
					<div class="home-post-list-1 home-post-list-1b clearfix">
	
						<h3 class="home-post-list">Recent News</h3>			
	
	<?php 
	$post_class = 'home-post-1';
	$my_query = new WP_Query('cat='.$news_cat_id.'&showposts=10'); // only include 'News' items
	if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
	if( $post->ID == $do_not_duplicate[$post->ID] ) continue; 
	$do_not_duplicate[$post->ID] = $post->ID;
	?>
	<?php $post_class = ('home-post-1' == $post_class) ? 'alt-home-post-1' : 'home-post-1'; ?>
	
						<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">
	
							<div class="entry clearfix">
							<h2 class="home-list"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	
	<?php include 'controls/post_slug.php'; ?>
	<?php include 'controls/post_list_image.php';?>
						<?php the_excerpt(); ?>
	
							</div>
	
							<div class="bottom"><?php the_time('j M Y') ?> <?php if (0) { the_author_posts_link(); ?> <?php } comments_popup_link('', '| 1 comment', '| % comments'); ?> | <a class="more-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">More</a></div>
	
						</div>
	
	<?php endwhile; endif; ?>
	
						<div style="clear:both;"></div>
	
						<div class="navigation clearfix"><a href="<?php echo get_category_link($news_cat_id) ?>">All News</a></div>
	
					</div>

<?php } else { // Do stuff specific to non-first page ?>

			<div id="content">

				<div class="home-post-list-2 clearfix">

<?php include (TEMPLATEPATH . '/banner468.php'); ?>					

					<h3 class="home-post-list">Recent Articles
						<?php if (is_category()) {
							global $wp_query;
							echo " in " . get_the_category_by_ID($wp_query->get_queried_object_id());
						} ?> 
						</h3>			

<?php 
if (is_home()) {
	$c_exclude = array_merge(array($news_cat_id),get_term_children($news_cat_id, 'category'));
	$c_include = array_diff(get_all_category_ids(), $c_exclude);
	query_posts(array('category__in'=>$c_include,'showposts'=>10,'paged'=>$paged)); 
}
if (have_posts()) : while (have_posts()) : the_post();
if( $post->ID == $do_not_duplicate[$post->ID] ) continue; ?>
<?php $post_class = ('home-post-1' == $post_class) ? 'alt-home-post-1' : 'home-post-1'; ?>

					<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">

						<div class="entry clearfix">
<!--
<?php if (get_post_meta($post->ID, post_thumbnail)) { ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, post_thumbnail, true); ?>" class="post-thum" alt="post thumbnail" /></a>
<?php } else { ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/def-thumb.gif" class="post-thum" alt="post thumbnail" /></a>
<?php } ?>
-->
							<h2 class="home-list"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php include 'controls/post_list_image.php';?>
							<?php the_excerpt(); ?>

						</div>

						<div class="bottom"><?php the_time('j M Y') ?> <?php if (0) { the_author_posts_link(); ?> <?php } comments_popup_link('', '| 1 comment', '| % comments'); ?> | <a class="more-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">More</a></div>

					</div>

<?php endwhile; endif; ?>

					<div style="clear:both;"></div>

<?php include (TEMPLATEPATH . '/bot-nav.php'); ?>

				</div>

<?php include (TEMPLATEPATH . '/midcontent.php'); ?>

<?php } ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>