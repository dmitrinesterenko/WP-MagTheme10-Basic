<?php
/*
Template Name: Sidebar Right (the wide one)
*/
?>

			</div>

		</div>

		<div id="contentright">

			<div id="sidebar">

				<ul>
					<?php 
					//$myobject = $wp_query->get_queried_object();
					if ($myobject->post_name != "about") { // if not on About page ?>
					
					
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
						
						<?php endif; ?>	
					
					<?php } else { ?>
					
								<?php get_links_list('id'); ?>
					<?php  } ?>					
				</ul>

			</div>

		</div>