<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="tags">
	<!-- tags -->
	<?php if (!is_page() && function_exists('the_tags') ) : ?>
	<div class="tags">
		<?php the_tags('More: ',' &bull; ',''); ?>
	</div>
	<?php endif; ?>
</div>
<?php endwhile; endif; ?>