<?php
/*
Template Name: Postinfo Top and Related Posts
*/
?>
<?php if (1) { ?>
					<div class="postinfo">
						<div class="postinfo2">
							
							<?php 
							$date_article = strtotime(date('c', mktime(0, 0, 0, the_date('m', '', '', false),the_date('d', '', '', false), the_date('Y', '', '', false))));
							$july_first_2010 = strtotime(date('c', mktime(0, 0, 0, 7, 1, 2010)));
							$date_diff = intval($date_article) - intval($july_first_2010);

							echo "<!-- diff $date_diff  date_article $date_article july first $july_first_2010 original article post date " . mktime(0, 0, 0, the_date('d', '', ''),the_date('m', '', ''), the_date('Y', '', '')) . " original date " . the_date() . "-->";
							if($date_diff > 0){ ?>
							
							By: <a href="<?php bloginfo('url'); ?>/author/<?php the_author_nickname(); ?>"><?php the_author_firstname();?> <?php the_author_lastname();?></a>
							<?php }else{ ?>
							By <a href="<?php bloginfo('url'); ?>/author/staff">Sentimentalist Staff</a>
							<?php } ?>
							on <?php the_time('F j, Y') ?>
							<?php if (!is_page()){ ?>
								in <?php the_category(' &bull; ') ?>
							<?php } ?>
						</div>
					

						
						
						<div style="clear:both;"></div>

					</div>
					
<?php } ?>					