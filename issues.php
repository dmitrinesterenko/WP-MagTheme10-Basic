<?php
/*
Template Name: Back Issues Page Template
*/
?>
<?php get_header(); ?>

	<div id="page" class="clearfix">

		<div id="contentleft">

			<div id="content">

<?php if (0) include (TEMPLATEPATH . '/banner160.php'); ?>	


<?php if (0) { ?>
			<div class="singlepost">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div id="subhead">
					<h1 class="pagetitle"><?php the_title(); ?></h1>
				</div>

				<div class="post" id="post-<?php the_ID(); ?>">

					<div class="entry">
						<?php the_content(); ?>
						<div style="clear:both;"></div>
					</div>

				</div>

			</div>
			
<?php endwhile; endif; ?>
<?php } ?>			
			<div class="home-post-list-2 clearfix" id="widelist">

<?php include (TEMPLATEPATH . '/banner468.php'); ?>	

					<h3 class="home-post-list"><?php the_title(); ?></h3>	

<?php if ( !function_exists('list_subpages_with_content') || !list_subpages_with_content("home-post-1", "alt-home-post-1") ) : ?>
<?php endif; ?>	
			
			</div>
			
<?php include (TEMPLATEPATH . '/midcontent.php'); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>