<?php

//Inserts metabox for the given taxonomy 
if(!function_exists('cpotheme_taxonomy_metabox')):
	function cpotheme_taxonomy_metabox($post){
		cpotheme_taxonomy_meta_form($post, cpotheme_metadata_taxonomies());
		
	}
endif;

//Save metabox taxonomy data
if(!function_exists('cpotheme_taxonomy_save')):
	function cpotheme_taxonomy_save($post){
		cpotheme_taxonomy_meta_save(cpotheme_metadata_taxonomies());
	}
endif;

//Delete metabox taxonomy data
if(!function_exists('cpotheme_taxonomy_delete')):
	function cpotheme_taxonomy_delete (){
		cpotheme_taxonomy_meta_delete(cpotheme_metadata_taxonomies());
	}
endif;


//When a cpo_portfolio_category is deleted we also delete the metadata associated with it.
if(!function_exists('cpotheme_taxonomy_meta_delete')):
	function cpotheme_taxonomy_meta_delete($option_fields){
		$tax_meta = get_option( 'cpotheme_taxonomy_meta' );
		$all_tax_meta_empty = true;
		
		//If there's any metadata associated to the category in database, delete it.
		if ( isset($tax_meta[$_POST['taxonomy']]) || isset($tax_meta[$_POST['taxonomy']][$_POST['tag_ID']]) || is_array( $tax_meta[$_POST['taxonomy']][$_POST['tag_ID']] ) )
			unset( $tax_meta[$_POST['taxonomy']][$_POST['tag_ID']] );

		update_option('cpotheme_taxonomy_meta', $tax_meta);
	}
endif;

//Create the metadata fields for the metadata form.
if(!function_exists('cpotheme_taxonomy_meta_fields')):
	function cpotheme_taxonomy_meta_fields($post, $tax_meta = false, $cpo_metadata){
		if($cpo_metadata == null || sizeof($cpo_metadata) == 0) return;
		
		$output = '';
		$field_prefix='cpotheme_taxonomy_meta_';
		
		//Loop through all the data taxonomies and create the field associated to them.
		foreach($cpo_metadata as $current_meta){
			$field_name = isset($current_meta['id']) ? $current_meta['id'] : '';
			$field_title = isset($current_meta['name']) ? $current_meta['name']: '';
			$field_desc = isset($current_meta['desc']) ? $current_meta['desc'] : '';
			$field_type = isset($current_meta['type']) ? $current_meta['type'] : '';

			$field_value = '';
			
			//If a metadata field is defined in database we fill the field with the value stored.
			if(isset($tax_meta) && !empty( $tax_meta[$field_prefix.$field_type] )) $field_value = $tax_meta[$field_prefix.$field_type];
			
			//Is a field block separator. Print a separate container.
			if($field_type == 'separator'){
				
				$output .= '<div class="cposettings_block" id="'.$field_name.'_block"';
				
				$output .= '>';
				$output .= '<div class="cposettings_separator">';
				$output .= $field_title.'<br/><span class="desc">'.$field_desc.'</span>';
				$output .= '</div>';
				
				
			// Is a field divider
			}elseif($field_type == 'divider'){
				$output .= '<div class="cposettings_divider">';
				$output .= '<h3 class="">'.$field_title.'</h3>';
				$output .= '</div>';
			
			//Is a normal field. Print field containers
			}else{
				$output .= '<div class="item">';
				$output .= '<label for="'.$field_prefix.$field_type.'" class="field_title">'.$field_title.'</label>';
				$output .= '<div class="field_contents">';
			}
			
				
			// Print metaboxes here. Develop different cases for each type of field.
			if($field_type == 'text')
				$output .= cpotheme_form_text($field_prefix.$field_type, $field_value, $current_meta);
				
			elseif($field_type == 'textarea')
				$output .= cpotheme_form_textarea($field_prefix.$field_type, $field_value, $current_meta);
			
			elseif($field_type == 'select')
				$output .= cpotheme_form_select($field_prefix.$field_type, $field_value, $current_meta['option'], $current_meta);
			
			elseif($field_type == 'checkbox')
				$output .= cpotheme_form_checkbox($field_prefix.$field_type, $field_value, $current_meta);
			
			elseif($field_type == 'yesno')
				$output .= cpotheme_form_yesno($field_prefix.$field_type, $field_value, $current_meta);
			
			elseif($field_type == 'color')
				$output .= cpotheme_form_color($field_prefix.$field_type, $field_value, $current_meta);
					
			elseif($field_type == 'imagelist')
				$output .= cpotheme_form_imagelist($field_prefix.$field_type, $field_value, $current_meta['option'], $current_meta);

			elseif($field_type == 'upload') 
				$output .= cpotheme_form_upload($field_prefix.$field_type, $field_value, null, $post);
				
			elseif($field_type == 'date') 
				$output .= cpotheme_form_date($field_prefix.$field_type, $field_value, null);
				
			elseif($field_type == 'font') 
				$output .= cpotheme_form_font($field_prefix.$field_type, $field_value, $current_meta['option'], $current_meta);
				
			
			//Separators
			if($field_type != 'separator' && $field_type != 'divider'){
				$output .= '</div>';
				$output .= '<div class="field_desc">'.$field_desc.'</div>';
				$output .= '</div>';
			}
		}
		
		return $output;
	}
endif;

// Create the form to insert the metadata in the category list.
if(!function_exists('cpotheme_taxonomy_meta_form')):
	function cpotheme_taxonomy_meta_form($post, $cpo_metadata = null){
		$tax_meta = get_option( 'cpotheme_taxonomy_meta' );
		$output = '';

		//Check if there's metadata associated in the database to the tag_ID and taxonomy given.
		if ( isset( $tax_meta[$post->taxonomy][$post->term_id] ) )
				$tax_meta = $tax_meta[$post->taxonomy][$post->term_id];
		
				
		//Call the field creator with the needed data.
		$output .= cpotheme_taxonomy_meta_fields($post, $tax_meta, $cpo_metadata);
		
		

		echo $output;
		
	}
endif;


// Check and save metadata to a given tag_ID and taxonomy
if(!function_exists('cpotheme_taxonomy_meta_save')):
	function cpotheme_taxonomy_meta_save($option_fields){
		$tax_meta = get_option( 'cpotheme_taxonomy_meta' );
		$all_tax_meta_empty = true;
		
		//Check if there's metadata associated in the database to the tag_ID and taxonomy given.
		if ( !isset($tax_meta[$_POST['taxonomy']]) || !isset($tax_meta[$_POST['taxonomy']][$_POST['tag_ID']]) || !is_array( $tax_meta[$_POST['taxonomy']][$_POST['tag_ID']] ) )
				$tax_meta[$_POST['taxonomy']][$_POST['tag_ID']] = array();
		
		//Loop through all the types of metadata input fields and check if they're filled. If so, we add them to the variable to save to the database.
		foreach ( array( 'text', 'textarea', 'select', 'checkbox', 'yesno', 'color', 'imagelist', 'upload', 'date', 'font' ) as $key ) {
				
				if ( isset( $_POST['cpotheme_taxonomy_meta_' . $key] ) && !empty( $_POST['cpotheme_taxonomy_meta_' . $key] ) ) {
					$val = trim( $_POST['cpotheme_taxonomy_meta_' . $key] );

					$tax_meta[$_POST['taxonomy']][$_POST['tag_ID']]['cpotheme_taxonomy_meta_'.$key] = $val;
					$all_tax_meta_empty = false;
				} else {
					//If it's not set the field we delete it from the database.
					if ( isset( $tax_meta[$_POST['taxonomy']][$_POST['tag_ID']]['cpotheme_taxonomy_meta_' . $key] ) )
						unset( $tax_meta[$_POST['taxonomy']][$_POST['tag_ID']]['cpotheme_taxonomy_meta_' . $key] );
				}
		}
		// We check if there is no metadata associated to the given taxonomy and tag_ID, if so we delete it from the database.
		if($all_tax_meta_empty) {
			unset( $tax_meta[$_POST['taxonomy']][$_POST['tag_ID']] );
		}
		
		// Save metadata to the database and redirect user.
		update_option('cpotheme_taxonomy_meta', $tax_meta);
		
		header('Location: edit-tags.php?taxonomy='.$_GET['taxonomy']."&post_type=cpo_portfolio&message=ok");

	}
endif;

// Retrieve metadata field $key from the associated $tag_ID
if(!function_exists('cpotheme_tax_meta')):
	function cpotheme_tax_meta($tag_id, $key){
		$tax_meta = get_option('cpotheme_taxonomy_meta');
		
		foreach($tax_meta as $current_tax_meta){
			if(isset($current_tax_meta[$tag_id][$key]))
				return $current_tax_meta[$tag_id][$key];
		}
		
	}
endif;