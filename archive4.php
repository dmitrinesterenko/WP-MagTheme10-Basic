<?php
/*
Template Name: Archive Option 4
*/
?>

<?php get_header(); ?>

	<div id="page" class="clearfix">

		<div id="contentleft">

			<div id="content">

				<div class="archive-post-list-1">

				<div id="subhead">

<?php /* If this is a category archive */ if (is_category()) { ?>			
					<h1><?php echo single_cat_title(); ?></h1>
		
<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
					<h1>Archive for <?php the_time('F jS, Y'); ?></h1>

<?php /* If this is a daily archive */ } elseif (is_search()) { ?>
					<h1>Search Results for '<?php echo wp_specialchars($s, 1); ?>'</h1>
		
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<h1>Archive for <?php the_time('F, Y'); ?></h1>

<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
					<h1>Archive for <?php the_time('Y'); ?></h1>
		
<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<?php if(isset($_GET['author_name'])) : $author = get_userdata(get_query_var('author_name')); $link = get_author_link(false, $author->ID, $author->user_firstname, $author->user_nicename,$author->user_url,$author->user_description,$author->user_email,$author->display_name); else : $author = get_userdata(get_query_var('author')); $link = get_author_link(false, $author->ID, $author->user_firstname, $author->user_nicename,$author->user_url,$author->user_description, $author->user_email,$author->display_name); endif; ?>

					<h1>Archive for <?php echo $author->display_name; ?></h1>
					<?php /* this is the author photo pulled from gravatar.com */
					$md5 = md5( $email=$author->user_email );
					$default = urlencode( 'http://www.solostream.com/images/nophoto.gif' );
					echo "<img class='auth-archive-page' src='http://www.gravatar.com/avatar.php?gravatar_id=$md5&amp;size=60&amp;default=$default' alt='author photo' />";
					?>
					<p><?php echo $author->user_description; ?></p> 

<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h1>Blog Archives</h1>

<?php /* If this is a tag archive */ } elseif (is_tag()) { ?>
					<h1>All Posts Tagged With: "<?php single_tag_title(); ?>"</h1>

<?php } ?>
					<div style="clear:both;"></div>
				</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $post_class = ('archive-post-1' == $post_class) ? 'alt-archive-post-1' : 'archive-post-1'; ?>

				<div class="<?php echo $post_class; ?>" id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

<?php include (TEMPLATEPATH . '/postinfo.php'); ?>

					<div class="entry clearfix">
						<?php the_content(''); ?>
						<div><a class="more-link" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Continue Reading</a></div>
					</div>

					<div style="clear:both;"></div>

				</div>

<?php endwhile; endif; ?>

				</div>

<?php include (TEMPLATEPATH . '/bot-nav.php'); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>