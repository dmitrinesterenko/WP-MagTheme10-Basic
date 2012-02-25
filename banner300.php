<?php
/*
Template Name: Banner Ad 300x250

*/
?>

<div class="banner300">
<?php 
$bannerinfo = array(
	array(
		'url' => 'mailto:ads@sentimentalistmag.com',
		'image' => 'banner300.jpg',
  ),
	array(
		'url' => 'http://www.lovelessrecords.com/artist_shackeltons.html',
		'image' => 'banner300_shackeltons.gif',
  ),
	array(
		'url' => 'http://www.minemetalart.com/?s=sentimentalistmag.com',
		'image' => 'mine_metal_art_promo.jpg',
  ),
        array(
		'url' => 'http://www.scottirvine.net/?s=sentimentalistmag.com',
		'image' => 'scott_irvine_promo.jpg',
  ),
  	array(
		'url' => 'http://cmj.com/marathon/',
		'image' => 'marathonad_300x250.jpg',
  ),

);    		
// weight the Sentm "Advertise here" banner less, by adding more references to valid banners
$livebanners = array(0, 2, 2, 3);
$b = $bannerinfo[$livebanners[mt_rand(1,count($livebanners))-1]];
?>
	<a target="_blank" href="<?php echo $b['url']; ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/<?php echo $b['image']; ?>" alt="" /></a>
</div> 
