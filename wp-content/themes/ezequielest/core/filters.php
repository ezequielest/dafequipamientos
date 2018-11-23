<?php

// Adds home link to navigation menus
if(!function_exists('cpotheme_nav_menu_args')){
	add_filter('wp_page_menu_args', 'cpotheme_nav_menu_args');
	function cpotheme_nav_menu_args($args){
		$args['show_home'] = true;
		return $args;
	}
}

//Remove tag stripping for menu descriptions
//TODO: Deactivated. Causes page content to be copied onto description
//remove_filter('nav_menu_description', 'strip_tags');
//add_filter('wp_setup_nav_menu_item', 'cpotheme_menu_description_filter');
function cpotheme_menu_description_filter($menu_item) {
	if(isset($menu_item->post_content) && isset($menu_item->description))
		$menu_item->description = apply_filters('nav_menu_description', $menu_item->post_content);
	return $menu_item;
}


//Change content width variable according to current template
add_filter('template_redirect', 'cpotheme_content_width_size');
function cpotheme_content_width_size($size){
	if(is_page_template('template-full.php') || is_page_template('template-blank.php')){
		global $content_width;
		$content_width = 980;
	}
}


//Turn off inline styles for gallery shortcode
add_filter('use_default_gallery_style', '__return_false');

//Turn off styles in Recent Comments widget
if(!function_exists('cpotheme_remove_recent_comments_style')){
	add_action('widgets_init', 'cpotheme_remove_recent_comments_style');
	function cpotheme_remove_recent_comments_style(){
		add_filter('show_recent_comments_widget_style', '__return_false');
	}
}

if(!function_exists('cpotheme_gallery_lightbox')){
	add_filter('wp_get_attachment_link', 'cpotheme_gallery_lightbox', 10, 4);
	function cpotheme_gallery_lightbox($link, $id, $size, $permalink){
		global $post;
		if(!$permalink)
			$link = str_replace('<a href', '<a rel="gallery[default]" href', $link);
		return $link;
	}
}