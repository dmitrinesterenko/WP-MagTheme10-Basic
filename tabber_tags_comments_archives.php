				
<!-- other tab functions
							<div class="tabbertab" style="padding:0;">
								<h3>Most Comments</h3>
								<?php /* Nick Momrik's <a href="http://mtdewvirus.com/code/wordpress-plugins/">Most Commented</a> plugin would work really well here. */ ?>
<?php if ( function_exists('mdv_most_commented') ) : ?>
								<ul class="pop"><?php mdv_most_commented(); ?></ul>
<?php endif; ?>
								<div style="clear:both;"></div>
							</div>

<?php if ( 0 ) : ?>
							<div class="tabbertab">
								<h3>Search</h3>
								<form class="siteguide" id="searchform" method="get" action="<?php bloginfo('home'); ?>/" ><input type="text" value="Site Search" onfocus="if (this.value == 'Site Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Site Search';}" size="18" maxlength="50" name="s" id="s" />
								<input name="submit-2" type="submit" id="submit-2" value="go" />
								</form>
							</div>
<?php endif; ?>

							<?php if (function_exists('the_tags') ) : ?>
							<div class="tabbertab">
								<h3>Tags</h3>
								<form class="siteguide" id="tagform" action="">
								<select id="tag_drop" name="tag_drop" onchange="window.location = (document.forms.tagform.tag_drop[document.forms.tagform.tag_drop.selectedIndex].value);">
								<?php drop_tags_getTags(); ?>
								</select>
								</form>
							</div>
							<?php endif; ?>


							<div class="tabbertab">
								<h3>Archives</h3>
								<form class="siteguide" id="monthform" action="">
								<select id="months" name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
								<option value=""><?php echo attribute_escape(__('Monthly Archives')); ?></option>
								<?php wp_get_archives('type=monthly&format=option&show_post_count=0'); ?>
								</select>
								</form>
							</div>

						</div>
					</div>  
					-->
