<?php
/*
Template Name: TV-Film-Culture Category Page
*/
?>


<?php get_header(); ?>
<?php
$column1 = 30;	// all TV/Film/Culture items
$column2 = 37;	// Reviews
$column3 = 38;	// Columns - optional (it queries to see if there are any)
?>
	<div id="page" class="clearfix">

		<div id="contentleft">

<?php if ($paged < 2) { // Do stuff specific to first page?>
<?php $feature_cat = $column1; 
$feature_failsafe = 'cat='.$column1.'&showposts=1';
?>
<?php include (TEMPLATEPATH . '/features.php'); ?>

			<div id="content">

				<div class="home-post-list-1 clearfix">

					<h3 class="home-post-list">Recent Articles</h3>			
<?php $count = 1;
//$my_query = new WP_Query('cat='.$column1.',-'.$column2.',-'.$column3.'&showposts=10'); 
$c_include = array_merge(array($column1),get_term_children($column1, 'category'));
$c_exclude = array_merge(array($column2),get_term_children($column2, 'category'));
$c_include = array_diff($c_include, $c_exclude);
$c_exclude = array_merge(array($column3),get_term_children($column3, 'category'));
$c_include = array_diff($c_include, $c_exclude);
$my_query = new WP_Query(array('category__in'=>$c_include,'showposts'=>20));
if ($my_query->have_posts()) : while ($count <= 5 && $my_query->have_posts()) : $my_query->the_post();
if (in_category($column2) || in_category($column3)) continue;	// don't show if cross-posted! see comment in index.php
if( $post->ID == $do_not_duplicate[$post->ID] ) continue; 
$do_not_duplicate[$post->ID] = $post->ID;
?>
<?php $post_class = ('home-post-1' == $post_class) ? 'alt-home-post-1' : 'home-post-1'; ?>

					<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">

						<div class="entry clearfix">


							<h2 class="home-list"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
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

<?php $has_columns = 0; 
$my_cquery = new WP_Query('cat='.$column3.'&showposts=5'); 
if ($my_cquery->have_posts()) : while ($my_cquery->have_posts()) : $my_cquery->the_post();
	if( $post->ID == $do_not_duplicate[$post->ID] ) continue; 
	$has_columns = 1;
endwhile; endif;
?>
				<div class="home-post-list-1 <?php echo ($has_columns) ? "narrowlist" : "home-post-list-1b"; ?> clearfix">

					<h3 class="home-post-list"><a href="<?php echo get_category_link($column2); ?>">Reviews</a></h3>			

<?php 
$count = 1;
$post_class = 'home-post-1';
$my_query = new WP_Query('cat='.$column2.'&showposts=10'); 
if ($my_query->have_posts()) : while ($count <= 5 && $my_query->have_posts()) : $my_query->the_post();
if( $post->ID == $do_not_duplicate[$post->ID] ) continue; 
$do_not_duplicate[$post->ID] = $post->ID;

?>
<?php $post_class = ('home-post-1' == $post_class) ? 'alt-home-post-1' : 'home-post-1'; ?>

					<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">

						<div class="entry clearfix">

							<h2 class="home-list"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<?php include 'controls/post_list_image.php';?>
							<?php if (!$has_columns) the_excerpt(); ?>
						</div>

						<div class="bottom"><?php the_time('j M Y') ?></div>
						<div class="bottom"><?php comments_popup_link('', '1 comment', '% comments'); ?></div>

					</div>

<?php $count = $count + 1; ?>
<?php endwhile; endif; ?>

					<div style="clear:both;"></div>

					<div class="navigation clearfix"><a href="<?php echo get_category_link($column2); ?>">All Reviews</a></div>

				</div>

<?php if ($has_columns) { ?>
				<div class="home-post-list-1 clearfix narrowlist">

					<h3 class="home-post-list"><a href="<?php echo get_category_link($column3); ?>">Columns</a></h3>			

<?php 
$count = 1;
$post_class = 'alt-home-post-1';
$my_query = new WP_Query('cat='.$column3.'&showposts=10'); ?>
<?php if ($my_query->have_posts()) : while ($count <= 5 && $my_query->have_posts()) : $my_query->the_post();
if( $post->ID == $do_not_duplicate[$post->ID] ) continue; 
$do_not_duplicate[$post->ID] = $post->ID;
?>
<?php $post_class = ('home-post-1' == $post_class) ? 'alt-home-post-1' : 'home-post-1'; ?>

					<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">

						<div class="entry clearfix">

<?php if (get_post_meta($post->ID, post_thumbnail)) { ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, post_thumbnail, true); ?>" class="post-thum" alt="post thumbnail" /></a>
<?php } else { ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/def-thumb.gif" class="post-thum" alt="post thumbnail" /></a>
<?php } ?>

							<h2 class="home-list"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

						</div>

						<div class="bottom"><?php the_time('j M Y') ?></div>
						<div class="bottom"><?php comments_popup_link('', '1 comment', '% comments'); ?></div>

					</div>
<?php $count = $count + 1; ?>
<?php endwhile; endif; ?>

					<div style="clear:both;"></div>

					<div class="navigation clearfix"><a href="<?php echo get_category_link($column3); ?>">All Columns</a></div>

				</div>
<?php } ?>				
				
<?php } else { // Do stuff specific to non-first page ?>

			<div id="content">

				<div class="home-post-list-2 clearfix">

<?php include (TEMPLATEPATH . '/banner468.php'); ?>					

					<h3 class="home-post-list">Other Recent Articles</h3>			

<?php if (have_posts()) : while (have_posts()) : the_post();
if( $post->ID == $do_not_duplicate[$post->ID] ) continue; ?>
<?php $post_class = ('home-post-1' == $post_class) ? 'alt-home-post-1' : 'home-post-1'; ?>

					<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">

						<div class="entry clearfix">

<?php if (get_post_meta($post->ID, post_thumbnail)) { ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php echo get_post_meta($post->ID, post_thumbnail, true); ?>" class="post-thum" alt="post thumbnail" /></a>
<?php } else { ?>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/def-thumb.gif" class="post-thum" alt="post thumbnail" /></a>
<?php } ?>

							<h2 class="home-list"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

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