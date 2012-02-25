<?php get_header(); ?>

	<div id="page" class="clearfix">

		<div id="contentleft">

			<div id="content">

				<div class="archive-post-list-1">

				<div id="subhead">
					<h1>Search Results for '<?php echo wp_specialchars($s, 1); ?>'</h1>
				</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
							<?php the_time('F jS, Y') ?> | <?php the_author_posts_link(); ?> | <?php comments_popup_link('0 comments', '1 comment', '% comments'); ?> | <a class="more-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Continued</a>
							<div style="clear:both;"></div>
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>

<?php endwhile; endif; ?>

<?php include (TEMPLATEPATH . '/bot-nav.php'); ?>

				</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>