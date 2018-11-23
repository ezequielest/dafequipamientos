<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>    
        <link rel="icon" type="image/png" href="http://www.dafequipamientos.com/wp-content/ico2.png" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />   
 
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="outer" id="top">
	
		<div class="wrapper wrapper-fixed">
			<div id="topbar" class="topbar">
				<div class="container">
					<div id="topmenu" class="topmenu">
						<?php wp_nav_menu(array('menu_class' => 'menu-top', 'theme_location' => 'top_menu', 'depth' => 1, 'fallback_cb' => null)); ?>
					</div>
					
					<div class="clear"></div>
				</div>
			</div>
			<div id="header" class="header">
				<div class="container">
					<?php cpotheme_logo(200, 50); ?>
					<?php cpotheme_menu(); ?>					
					<div class='clear'></div>
				</div>
			</div>
			<div class="small-border primary-color-bg"></div>
			<?php if(cpotheme_get_option('slider_always') == 1 || is_home() || is_front_page()){ ?>			
			<?php $slider_posts = new WP_Query('post_type=cpo_slide&posts_per_page=-1&order=ASC&orderby=menu_order'); ?>
			<?php if($slider_posts->post_count > 0): $slide_count = 0; ?>
			<div id="slider" class="slider">
				<ul class="slider-slides">
					<?php while($slider_posts->have_posts()): $slider_posts->the_post(); ?>
					<?php $slide_count++; ?>
					<?php $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array(1500, 7000), false, ''); ?>
					<?php if(get_post_meta(get_the_ID(), 'slide_position', true) == 'right') $slide_position = ' slide-right'; else  $slide_position = ''; ?>
					<li id="slide-<?php echo $slide_count; ?>" class="slide<?php echo $slide_position; ?>" style="background:url(<?php echo $image_url[0]; ?>) no-repeat center;">
						<div class="container">
							<div class="slide-textbox">
									<h2 class="slide-title"><?php the_title(); ?></h2>
									<div class="slide-content"><?php the_content(); ?></div>
							</div>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
				<?php if($slider_posts->post_count > 1): ?>
				<div class="slider-prev"></div>
				<div class="slider-next"></div>
				<div class="slider-pages"></div>
				<?php endif; ?>
			</div>  
			<?php endif; ?>					
			<?php } ?>
			
				
			<?php if(is_home() || is_front_page()){ ?>
			
			<?php if(cpotheme_get_option('home_tagline') != ''): ?>
			<div class="small-border primary-color-bg"></div>
			<div class="tagline">
				<div class="tagline-item">
					<div class="container">
						<?php echo do_shortcode(stripslashes(html_entity_decode(cpotheme_get_option('home_tagline')))); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			
			<div class="container">					
				<?php $feature_posts = new WP_Query('post_type=cpo_feature&posts_per_page=-1&order=ASC&orderby=menu_order'); ?>
				<?php if($feature_posts->post_count > 0): $feature_count = 0; ?>
				<div id="minifeatures" class="minifeatures">
					<?php while($feature_posts->have_posts()): $feature_posts->the_post(); ?>
					<?php if($feature_count % 4 == 0 && $feature_count != 0) echo '<div class="col-divide"></div>'; $feature_count++; ?>
					<div class="feature column col4 <?php if($feature_count % 4 == 0) echo ' feature_right col-last'; ?>">
						<?php $icon = get_post_meta(get_the_ID(), 'feature_icon', true); ?>
						<?php the_post_thumbnail(); ?>
						<h2 class="feature-title"><?php the_title(); ?></h2>
						<div class="feature-content"><?php the_content(); ?></div>
					</div>
					<?php endwhile; ?>
					<div class='clear'></div>
				</div>
				<?php endif; ?>
			</div>			
			
			<div class="container">
				<?php $feature_posts = new WP_Query('post_type=cpo_portfolio&order=ASC&orderby=menu_order&meta_key=portfolio_featured&meta_value=1&numberposts=-1&posts_per_page=-1'); ?>
				<?php if($feature_posts->have_posts()): $feature_count = 0; ?>
				<div id="portfolio" class="portfolio">
					<div class="column col4 portfolio-heading">
						<?php echo do_shortcode(stripslashes(html_entity_decode(cpotheme_get_option('home_portfolio')))); ?>
					</div>
					<div class="column col4x3 col-last">
						<div class="portfolio-list">
							<?php while($feature_posts->have_posts()): $feature_posts->the_post(); ?>
							<?php if($feature_count % 3 == 0 && $feature_count != 0) echo '<div class="col-divide"></div>'; ?>
							<?php $feature_count++; ?>
							<div class="column col3<?php if($feature_count % 3 == 0 && $feature_count != 0) echo ' col-last'; ?>">
								<?php get_template_part('element', 'portfolio'); ?>
							</div>
							<?php endwhile; ?>
							<div class='clear'></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="clear"></div>
			</div>

			<?php } ?>