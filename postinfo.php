<?php
/*
Template Name: Postinfo Top and Related Posts
*/
?>

					<div class="postinfo">
						<div class="postinfo2">
							<span class="authorinfo">
							
							<?php 							
								$date_article = strtotime(get_the_date());
								
								$july_first_2010 = strtotime(date('c', mktime(0, 0, 0, 07, 01, 2010)));
								$date_diff = intval($date_article) - intval($july_first_2010);
								
								if($date_diff > 0){ ?>
								
								By <a href="<?php bloginfo('url'); ?>/author/<?php the_author_meta('nickname'); ?>"><?php the_author_meta('first_name');?> <?php the_author_meta('last_name');?></a>
								<?php }else{ ?>
								By <a href="<?php bloginfo('url'); ?>/author/staff">Sentimentalist Staff</a>
								<?php } ?>
							</span>on 
							<span class="date_published"><?php the_time('F j, Y') ?></span>
							<?php if (!is_page()){ ?>
								in <?php the_category(', ') ?>
							<?php } ?>
						</div>
					

						
						
						<div style="clear:both;"></div>

					</div>
					
				