<?php

//Create portfolio meta fields
function cpotheme_metadata_slides(){

	$cpotheme_data = array();
		
	$cpotheme_data[] = array(
	'name' => 'slide_position',
	'std'  => '',
	'label' => __('Caption Position', 'cpotheme'),
	'desc' => __('Specifies where the caption should be located within the slide.', 'cpotheme'),
	'type' => 'select',
	'option' => cpotheme_metadata_slideposition());
	
	return $cpotheme_data;
}

//Create portfolio meta fields
function cpotheme_metadata_portfolio(){

	$cpotheme_data = array();
		
	$cpotheme_data[] = array(
	'name' => 'portfolio_featured',
	'std'  => '',
	'label' => __('Featured Item?', 'cpotheme'),
	'desc' => __('Specifies whether this portfolio item appears in the homepage.', 'cpotheme'),
	'type' => 'yesno');
		
	return $cpotheme_data;
}