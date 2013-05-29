<?php
// Get rid of those pesky HEAD links to prevent bots from sniffing for WP vulnerabilities (place in functions.php)
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

function remove_generator() {
	return '';
}

add_filter('the_generator', 'remove_generator');

// Add support for Page excerpts
add_post_type_support('page', 'excerpt');

/**
 * Generates a quick-and-dirty string for use as an ID/class on the body tag
 *
 * @author William Dodson <http://williamdodson.co/>
 * @note Usage: $slug = generate_body_id($_SERVER['REQUEST_URI']);// set our body ID
 */
function generate_body_id($request_uri, $part = 1) {
  $uri_parts  = explode('/', $request_uri);// generate an array of URI parts
  $page       = !empty($uri_parts[$part]) ? $uri_parts[$part] : 'home';// ternary expression to set the page to the name or a default 
  
  return $page;// return the value
}

/**
 * Adds support for post thumbnails in WP 2.9+
 * Add this to yout theme's functions.php
 */
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

/**
 * Get a given page's ID number based on
 * the page's name
 *
 * @author William Dodson <http://williamdodson.co/>
 */
function get_id_by_page_name($page_name, $post_type = 'page', $output = OBJECT) {
	global $wpdb;
	$post = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type='$post_type'", $page_name ));
	if ($post) {
  	$page = get_post($post, $output);
  	return $page->ID;
	}
	return null;
}

/**
 * Get a given category's ID number based on
 * that category's name
 *
 * @author William Dodson <http://williamdodson.co/>
 */
function get_cat_id_by_name($category_name) {
  $term = get_term_by('name', $category_name, 'category');
  $term_id = $term->term_id;
	return $term_id;
}

/**
 * See if the current page is a sub-page of a given page
 *
 * @author William Dodson <http://williamdodson.co/>
 */
function is_child($parent) {
  global $post;
  return $post->post_parent == $parent;
}

/**
 * This is a modification of image_downsize() function in wp-includes/media.php
 * we will remove all the width and height references, therefore the img tag
 * will not add width and height attributes to the image sent to the editor.
 *
 * @param bool false No height and width references.
 * @param int $id Attachment ID for image.
 * @param array|string $size Optional, default is 'medium'. Size of image, either array or string.
 * @return bool|array False on failure, array on success.
 */

function myprefix_image_downsize( $value = false, $id, $size ) {
	if ( !wp_attachment_is_image($id) )
	return false;
	$img_url = wp_get_attachment_url($id);
	$is_intermediate = false;
	$img_url_basename = wp_basename($img_url);
	// try for a new style intermediate size
	if ( $intermediate = image_get_intermediate_size($id, $size) ) {
		$img_url = str_replace($img_url_basename, $intermediate['file'], $img_url);
		$is_intermediate = true;
	} elseif ( $size == 'thumbnail' ) {
		// Fall back to the old thumbnail
		if ( ($thumb_file = wp_get_attachment_thumb_file($id)) && $info = getimagesize($thumb_file) ) {
		$img_url = str_replace($img_url_basename, wp_basename($thumb_file), $img_url);
		$is_intermediate = true;
		}
	}
	// We have the actual image size, but might need to further constrain it if content_width is narrower
	if ( $img_url) {
		return array( $img_url, 0, 0, $is_intermediate );
	}
	return false;
}
/** 
 * Remove the height and width references from the image_downsize function.
 * We have added a new param, so the priority is 1, as always, and the new
 * params are 3.
 */
add_filter( 'image_downsize', 'myprefix_image_downsize', 1, 3 );
?>