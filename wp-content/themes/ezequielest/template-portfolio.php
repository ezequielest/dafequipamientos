<?php
/*
  Template Name: Portfolio Page
 */
?>
<?php get_header(); ?>


<div id="main" class="main">	
	<?php if(have_posts()) while(have_posts()): the_post(); ?>
	
	<?php get_template_part('element', 'page-header'); ?>
		
	<div class="container">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	
	
	<div class="container">
		<?php get_template_part('element', 'portfolio-navigation'); ?>

		<?php if(get_query_var('paged')) $current_page = get_query_var('paged'); else $current_page = 1; ?>	
		<?php query_posts('post_type=cpo_portfolio&paged='.$current_page.'&posts_per_page=12&order=ASC&orderby=menu_order'); ?>
		<?php if(have_posts()): $feature_count = 0; ?>
		<section id="portfolio" class="portfolio">
				<?php while(have_posts()): the_post(); ?>
				<?php $feature_count++; ?>
				<div class="column col4<?php if($feature_count % 4 == 0 && $feature_count != 0) echo ' col-last'; ?>">
					<?php get_template_part('element', 'portfolio'); ?>
				</div>
				<?php endwhile; ?>
			<div class='clear'></div>
		</section>
		<?php endif; ?>
		<?php cpotheme_pagination(); ?>
	</div>
</div>

<?php get_footer(); ?>