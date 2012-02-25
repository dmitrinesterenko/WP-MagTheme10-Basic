<div id="tags">
	<!-- tags -->
	<?php if (!is_page() && function_exists('the_tags') ) : ?>
	<div class="tags">
		<?php the_tags('Tags: ',' &bull; ',''); ?>
	</div>
	<?php endif; ?>
</div>