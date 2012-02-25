<?php
/*
Template Name: Banner Ad 468x60
*/
?>

<!--
<div class="banner468">
<?php 
$bannerinfo = array(
	array(
		'url' => 'http://www.tearntan.com',
		'image' => 'banner468_tearntan.jpg',
  ),
	array(
		'url' => 'http://www.sursumcorda.com/tulipomania',
		'image' => 'banner468_tulipomania.gif',
  ),
	array(
		'url' => 'http://www.slumberlandrecords.com/catalog/show/90?utm_source=sent&utm_medium=banner&utm_campaign=ktp',
		'image' => 'banner468_sarandon.gif',
  ),
	array(
		'url' => 'http://www.slumberlandrecords.com/catalog/show/91?utm_source=sent&utm_medium=banner&utm_campaign=lis',
		'image' => 'banner468_lodger.gif',
  ),
     array(
		'url' => 'http://cmj.com/marathon/',
		'image' => 'marathonad_555x100.jpg',
  ),

);    		
$livebanners = array(0, 0); 
$b = $bannerinfo[$livebanners[mt_rand(1,count($livebanners))-1]];
?>
	<a target="_blank" href="<?php echo $b['url']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/<?php echo $b['image']; ?>" alt="" /></a>
</div> 
-->