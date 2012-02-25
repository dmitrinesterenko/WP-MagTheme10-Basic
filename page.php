<?php get_header(); ?>

	<div id="page" class="clearfix">

		<div id="contentleft">

			<div id="content">

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

<?php get_sidebar(); ?>

<?php get_footer(); ?>