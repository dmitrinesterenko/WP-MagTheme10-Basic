<?php get_header(); ?>

	<div id="page" class="clearfix">
		<div id="contentleft">
			<div id="content">					
			<div class="singlepost">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


				<?php if(0){ include "controls/author_info_singlepost.php"; }?>
				<div class="post" id="post-<?php the_ID(); ?>">	
					<div class="post_title">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
						<?php the_title(); ?></a></h1>
					</div>
						<div class="entry">
	
							<?php if (get_post_meta($post->ID, home_feature_photo)) { ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">
								<img src="<?php echo get_post_meta($post->ID, home_feature_photo, true); ?>" class="feature-photo" alt="feature photo" /></a>
							<?php } ?>
	
							<?php the_content(); ?>
						

							<!-- /single post -->
							<div style="clear:both;"></div>
						</div>
				</div>

<?php /* Dmitri 09-11-2010 don't show this for now let's keep it clean include (TEMPLATEPATH . '/controls/leaderboard_ad_720_article.php'); */?>

				<?php comments_template(); ?>
                
                <?php /*include "controls/facebook_comments.php";*/ ?>

<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
		<div id="contentright">
			<div id="sidebar">
				<ul>
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Article Sidebar') ) : ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>

<?php get_footer(); ?>