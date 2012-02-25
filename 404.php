<?php get_header(); ?>

	<div id="page" class="clearfix">

		<div id="contentleft">

			<div id="content">

			<div class="singlepost">

				<div id="subhead">
					<h1 class="pagetitle">Sorry. 404 Page Not Found</h1>
				</div>
			
				<div class="post">
			
					<div class="entry" style="padding-top:0;">

 						<p>I'm sorry, but the post or page you're looking for could not be found. It could be because of our recent re-design. Here are a couple of options that might help you:</p>

						<ul>
							<li>Use the search box in the right sidebar.</li>
							<li>Try scrolling through the monthly archives to the right.</li>
							<li>Try scrolling through the categories at the top of the page.</li>
							<li>As a last resort, you can focus all your mental energy on what it is you're looking for, and it might magically appear on your screen (not likely though).</li>
						</ul> 

						<p><strong>You can also take a look through my most recent posts. Perhaps you'll find what you're looking for there.</strong></p>

						<ul>
							<?php query_posts('showposts=20'); ?>
							<?php while (have_posts()) : the_post(); ?>
							<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></li>
<?php endwhile; ?>
						</ul>

					</div>

				</div>

			</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>