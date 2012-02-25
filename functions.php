<?php

if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Middle Content',));
	register_sidebar(array('name'=>'Sidebar',));
	register_sidebar(array('name'=>'Article Sidebar',));

function drop_tags_getTags() {
	global $wpdb;
	$uri = get_bloginfo('url');
	print("<option value=\"$uri/\">Site Tags</option>\n");
	$tags = $wpdb->get_results("
	SELECT
		t.term_id, t.name, t.slug, x.parent
	FROM
		{$wpdb->prefix}term_taxonomy x
	JOIN
		{$wpdb->prefix}terms t ON x.term_id = t.term_id
	WHERE
		x.taxonomy = 'post_tag'
	ORDER BY
		t.name
	");
		
	foreach($tags as $tag) {
		print("<option value=\"$uri/tag/$tag->slug/\">$tag->name</option>\n");
	}
}

function drop_category_getCategories() {
	global $wpdb;
	$uri = get_bloginfo('url');
	print("<option value=\"$uri/\">Site Categories</option>\n");

	$cats = $wpdb->get_results("
	SELECT
		t.term_id, t.name, t.slug, x.parent
	FROM
		{$wpdb->prefix}term_taxonomy x
	JOIN
		{$wpdb->prefix}terms t ON x.term_id = t.term_id
	WHERE
		x.taxonomy = 'category'
	ORDER BY
		t.name
	");
		
	foreach($cats as $cat) {
		if($cat->parent == 0) {
			print("<option value=\"$uri/category/$cat->slug/\">$cat->name</option>\n");
		} else {
			$parent = $wpdb->get_var("
			SELECT
				t.slug
			FROM
				{$wpdb->prefix}terms t
			WHERE
				t.term_id = $cat->parent
			");
			print("<option value=\"$uri/category/$parent/$cat->slug/\">$cat->name</option>\n");
		}
	}
}
function new_excerpt_length($length) {
	return 20;
}

function new_excerpt_more($post) {
	return '<a href="'. get_permalink($post->ID) . '">' . ' ...Read the Rest' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
add_filter('excerpt_length', 'new_excerpt_length');

?>