<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="https://www.facebook.com/2008/fbml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' '); ?> <?php if(wp_title(' ', false)) { echo ' : '; } ?><?php bloginfo('name'); ?><?php if(!wp_title(' ', false)) { echo ': '; bloginfo('description'); } ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style-edits.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="http://mediaplayer.yahoo.com/js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/tabber.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/prototype.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/effects.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/glider.js"></script>
<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover1 = function() {
	var sfEls = document.getElementById("nav").getElementsByTagName("LI");
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover1);
//--><!]]></script>

<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover2 = function() {
	var topnav = document.getElementById("topnav");
	if (topnav) {
		var sfEls = topnav.getElementsByTagName("LI");
		for (var i=0; sfEls&&i<sfEls.length; i++) {
			sfEls[i].onmouseover=function() {
				this.className+=" sfhover";
			}
			sfEls[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
			}
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", sfHover2);
//--><!]]></script>

<script type="text/javascript">	
	function display(id) {
		if (document.getElementById(id).style.display == 'block') {
			document.getElementById(id).style.display = 'none';
		} else {
			document.getElementById(id).style.display = 'block';
		}
			return false;
	}
</script>

<script type="text/javascript">	
	function display(id) {
		if (document.getElementById(id).style.display == 'block') {
			document.getElementById(id).style.display = 'none';
		} else {
			document.getElementById(id).style.display = 'block';
		}
			return false;
	}
</script>
<!-- header script start -->
<?php wp_head(); ?>
<!-- header script end -->
<?php
global $featured_id;
global $current_issue_id;
global $news_cat_id;
global $current_issue_page;
global $shop_page_id;
global $shop_page;
global $banner_share_page;
global $banner_share_page_id;
global $uncategorized_page;
global $uncategorized_id;
global $wfw2010_page;
global $wfw2010_page_id;
global $winter_mix_page;
global $winder_mix_page_id;

$uncategorized_id = get_cat_ID("Uncategorized");
$featured_id = get_cat_ID('Featured');
$current_issue_page = get_page_by_path('current_issue');
$winter_mix_page = get_page_by_path('winter-mix');
$winder_mix_page_id = $winter_mix_page->ID;
$shop_page = get_page_by_path('shop');
$banner_share_page = get_page_by_path('auction-crafts-for-haiti-banner-share');
$banner_share_page_id = $banner_share_page->ID;

$uncategorized_page = get_page_by_path('uncategorized');
$uncategorized_page_id = $uncategorized_page->ID;

$wfw2010_page = get_page_by_path('online_exclusives/wfw2010_all');
$wfw2010_page_id = $wfw2010_page->ID;

$sick_page = get_page_by_path('sick');
$sick_page_id = $sick_page->ID;

$shop_page_id = $shop_page->ID;
$current_issue_id = $current_issue_page->ID;
$news_cat_id = get_cat_ID('News');
$contests_cat_id = get_cat_ID('Contests');
$comma_separator = ",";
$exclude_cat_ids = $featured_id.$comma_separator.$contests_cat_id.$comma_separator.$uncategorized_id;
$exclude_page_ids = $current_issue_id.$comma_separator.$shop_page_id.$comma_separator.$banner_share_page_id.$comma_separator.$wfw2010_page_id.$comma_separator.$winder_mix_page_id .$comma_separator.$sick_page_id;
?>
<!-- exclude cats
<?php echo($exclude_cat_ids); ?>
<?php echo($exclude_page_ids); ?>
-->
</head>

<body>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({
    appId  : '101724923237429',
    status : true, // check login status
    cookie : false, // enable cookies to allow the server to access the session
    xfbml  : true, // parse XFBML
    channelUrl : 'http://www.sentimentalistmag.com/blog/channel.html', // channel.html file
    oauth  : false// enable OAuth 2.0
  });
</script>
<div id="outer">
  <b class="corner">
  <b class="corner1"><b></b></b>
  <b class="corner2"><b></b></b>
  <b class="corner3"></b>
  <b class="corner4"></b>
  <b class="corner5"></b></b>
<div id="wrap" class="clearfix">  
	<div id="header" class="clearfix">
		<div class="sitehead-left">
			
			<?php include 'controls/header_artist_banners.php';?>
		</div>
		<br clear="all" />
		
<?php if (0) { ?>

		<div class="sitehead-right">
			<?php if (0) { ?>
			<p><?php echo date('l, F dS, Y'); ?></p>
			<?php } ?>
			<div id="topnav">
			<?php if (0) { ?>
				<ul>
					<li class="first"><a href="<?php bloginfo('url'); ?>">Home</a></li>
					<?php wp_list_pages('title_li='); ?>
					<li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
				</ul>
			<?php } ?>
			</div>
		</div>
<?php } ?>		
	</div>

	<div id="nav" class="clearfix">


		<ul class="clearfix">
			<li class="page_item"><a href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>
 	
<?php  wp_list_categories('show_option_all&exclude='.$exclude_cat_ids.'&hierarchical=1&title_li=&orderby=order'); ?>
<!--list of categories done right -->	
			<?php wp_list_pages('sort_column=menu_order&exclude='.$exclude_page_ids.'&title_li='); ?>
			<li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
			<li class="searchnav">
				<form class="siteguide" id="searchform" method="get" action="<?php bloginfo('home'); ?>/" >
					<input type="text" value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" size="18" maxlength="50" name="s" id="s" />
					<input name="submit-2" type="submit" id="submit-2" value="Go" />
				</form>		
			</li>	
		</ul>

	
	</div>
	
	<?php 
		if(!is_home()){
			include("controls/leaderboard_ad_720.php");
		}
		?>
	