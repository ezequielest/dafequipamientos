<?php 
//Displays a shortened byline with only the author and categories
function cpotheme_post_author(){
	$author_alt = sprintf(esc_attr__('View all posts by %s', 'cpotheme'), get_the_author());
	$author = sprintf('<a href="%1$s" title="%2$s">%3$s</a>', get_author_posts_url(get_the_author_meta('ID')), $author_alt, get_the_author());
	?><div class="author">
		<span class="icon icon-user"></span>
		<?php echo $author; ?>
	</div><?php
}

//Displays post categories, comma-separated
function cpotheme_post_categories(){
	?><div class="category">
		<span class="icon icon-folder-open"></span>
		<?php echo get_the_category_list(', '); ?>
	</div><?php
}

//Displays post categories, comma-separated
function cpotheme_post_comments(){
	$comments_num = get_comments_number();
	if($comments_num == 0)
		$comments = __('No Comments', 'cpotheme');
	elseif($comments_num == 1)
		$comments = __('One Comment', 'cpotheme');
	else
		$comments = sprintf(__('%1$s Comments', 'cpotheme'), number_format_i18n($comments_num));
	?><div class="comments">
		<span class="icon icon-comments"></span>
		<?php printf('<a href="%1$s">%2$s</a>', get_permalink(get_the_ID()).'#comments', $comments); ?>
	</div><?php
}

//Displays tag list for current post
function cpotheme_post_tags(){
		$tag_list = get_the_tag_list('<ul class="tags"><li class="primary_color_bg">','</li> <li class="primary_color_bg">','</li></ul>');
		if($tag_list):
			echo $tag_list;		
		endif;
}

//Displays a description of the author of the current post
function cpotheme_post_authorbio(){  ?>
	<div id="author-info" class="author-info">
		<div class="author-image">
			<?php echo get_avatar(get_the_author_meta('user_email'), apply_filters('cpotheme_author_bio_avatar_size', 120)); ?>
		</div>
		<div id="author-description" class="author-description">
			<h4 class="author-name"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author(); ?></a></h4>
			<div class="content"><?php the_author_meta('description'); ?></div>
		</div>
	</div> <?php 
	
}

// Adds More Info links to previews
function cpotheme_post_readmore(){
	return '';
}


//Displays Read More link on excerpts with cutoff
add_filter('excerpt_more', 'cpotheme_auto_excerpt_more');
function cpotheme_auto_excerpt_more($more){
	return ' &hellip;'.cpotheme_post_readmore();
}


//Displays Read More link on excerpts
add_filter('get_the_excerpt', 'cpotheme_custom_excerpt_more');
function cpotheme_custom_excerpt_more($output){
	if(has_excerpt() && !is_attachment())
		$output .= cpotheme_post_readmore();
	return $output;
}

// Limits text preview lengths to a certain size
add_filter('excerpt_length', 'cpotheme_post_excerpt_length');
function cpotheme_post_excerpt_length($length){
	return 25;
}