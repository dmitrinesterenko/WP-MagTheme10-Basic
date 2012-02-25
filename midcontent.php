<?php
/*
Template Name: Middle Content
*/
?>
				<div id="midcontent">
					<ul>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Middle Content') ) : ?>
<?php endif; ?>	

					</ul>
				</div>