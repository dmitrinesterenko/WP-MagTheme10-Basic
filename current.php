<?php
/*
Template Name: Magazine Issue Page
*/
?><?php get_header(); ?>

	<div id="page" class="clearfix">

		<div id="contentleft">

			<div id="content">

			<div class="singlepost">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $author_info=get_the_author_description(); if($author_info != "") { ?>
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


					<div id="subhead">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
					</div>
					<div style="clear:both;"></div>

					<div class="post" id="post-<?php the_ID(); ?>">


<?php if (0) include (TEMPLATEPATH . '/postinfo.php'); ?>

					<div class="entry">

						<?php if (get_post_meta($post->ID, home_feature_photo)) { ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, home_feature_photo, true); ?>" class="feature-photo" alt="feature photo" /></a><?php } ?>

						<?php the_content(); ?>

						<div style="clear:both;"></div>

					</div>

				</div>
				
				<div id="subhead">
					<h3>In This Issue...</h3>
					<div style="clear:both;"></div>
				</div>
<?php endwhile; endif; ?>

<?php 
	$mydatestart = '';
	if (get_post_meta($post->ID, 'issue_start', true)) {
		$mydatestart = get_post_meta($post->ID, 'issue_start', true);
	}
	$mydateend = '';
	if (get_post_meta($post->ID, 'issue_end', true)) {
		$mydateend = get_post_meta($post->ID, 'issue_end', true);
	}
	
//	$myquery = 'cat=-'.$news_cat_id.'&nopaging=true&orderby=date&order=DESC';	// exclude News items from this query
//	if (get_post_meta($post->ID, 'issue_date', true)) {
//		//$myquery = $myquery . '&m=' . get_post_meta($post->ID, 'issue_date', true);
//		$mydate = get_post_meta($post->ID, 'issue_date', true);
//		$myquery = $myquery . '&year=' . substr($mydate, 0, 4) . '&monthnum=' . 1*(substr($mydate, 5, 2)) . '&day=' . 1*(substr($mydate, 8, 2));
//	}
//	query_posts($myquery); 

	$args = array('nopaging'=>'true');
	if (get_post_meta($post->ID, 'issue_date', true)) {
		//$myquery = $myquery . '&m=' . get_post_meta($post->ID, 'issue_date', true);
		$mydate = get_post_meta($post->ID, 'issue_date', true);
		$args = array_merge($args, array('year'=>substr($mydate, 0, 4), 'monthnum'=>(1*(substr($mydate, 5, 2))), 'day'=>(1*(substr($mydate, 8, 2))) ) );
	}	
	$exclude = array_merge(array($news_cat_id),get_term_children($news_cat_id, 'category'));
	$diff = array_diff(get_all_category_ids(), $exclude);
	$my_query = new WP_Query(array_merge(array('category__in'=>$diff), $args)); 
	
?>
<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
<?php 
	if ($mydatestart) {
		if (strcmp(substr($post->post_date, 0, 10), $mydatestart) < 0) continue;
	}
	if ($mydateend) {
		if (strcmp(substr($post->post_date, 0, 10), $mydateend) > 0) continue;
	}
?>
<?php $post_class = ('archive-post-1' == $post_class) ? 'alt-archive-post-1' : 'archive-post-1'; ?>

				<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">

<?php if (get_post_meta($post->ID, post_thumbnail)) { ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, post_thumbnail, true); ?>" class="post-thum" alt="post thumbnail" /></a>
<?php } else { ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/def-thumb.gif" class="post-thum" alt="post thumbnail" /></a>
<?php } ?>

					<div class="float-post-right">
						<h2 class="home-list"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
						<div class="entry">
							<?php the_excerpt(''); ?>
							<?php the_time('F jS, Y') ?> <?php /*the_author_posts_link(); ?> | <?php*/ comments_popup_link('', '| 1 comment', '| % comments'); ?> | <a class="more-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Continued</a>
							<div style="clear:both;"></div>
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>

<?php endwhile; endif; ?>

				<?php comments_template(); ?>

			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>