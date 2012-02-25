<!-- Start Tabber -->  
<div id="tab-box"> 
	<div class="tabber">
		<div class="tabbertab" style="padding:0;">
			 <h3>Popular</h3>
			<?php 
			/* Sentimentalis modified Alex King's <a href="http://alexking.org/blog/2007/10/02/popularity-contest-13b2">Popularity Contest</a> plugin would work really well here. */ ?>
<?php if ( function_exists('akpc_most_popular_in_last_days') ) : ?>
			<ul class="pop"><?php 
akpc_most_popular_in_last_days($limit=5, $before='<li>', $after='</li>', $days=10 ); ?></ul>
<?php endif; ?>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>