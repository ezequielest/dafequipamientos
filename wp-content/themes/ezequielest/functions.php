<?php if(!isset($content_width)) $content_width = 784;	

//Load Core; check existing core or load development core
if(defined('WP_CPODEV'))
	$core_path = get_template_directory().'/../cpoframework/core/';
else
	$core_path = get_template_directory().'/core/';
require_once $core_path.'init.php';

$include_path = get_template_directory().'/includes/';

//Main components
require_once($include_path.'setup.php');
require_once($include_path.'metaboxes.php');

//Metadata & variables
require_once($include_path.'metadata/data_general.php');
require_once($include_path.'metadata/data_metaboxes.php');
require_once($include_path.'metadata/data_settings.php');

//Layout & Display components
require_once($include_path.'layout/layout_post.php');
require_once($include_path.'layout/layout_comments.php');

//Custom posts
require_once($include_path.'cposts/cpost_slider.php');
require_once($include_path.'cposts/cpost_features.php');
require_once($include_path.'cposts/cpost_portfolio.php');

//Custom taxonomies
require_once($include_path.'taxonomies/tax_portfolio_categories.php');

function wpb_adding_script() {

 wp_register_script('turn', get_template_directory_uri() . '/js/turn.js', array('jquery'),'1.1', true);

 wp_enqueue_script('turn');
 
 wp_register_script('misjs', get_template_directory_uri() . '/js/misjs.js', array('jquery'),'1.1', true);

 wp_enqueue_script('misjs');

}

add_action( 'wp_enqueue_scripts', 'wpb_adding_script' );