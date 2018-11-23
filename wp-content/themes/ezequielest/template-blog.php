<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="main" class="main">
	<?php if(have_posts()) while(have_posts()): the_post(); ?>
	
	<?php get_template_part('element', 'page-header'); ?>
		
	<div class="container">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
	
	<?php endwhile; ?>
	
	<div class="container">		
		<section id="content" class="content">
			<?php if(get_query_var('paged')) $current_page = get_query_var('paged'); else $current_page = 1; ?>
			<?php $posts_per_page = get_option('posts_per_page'); ?>
			<?php query_posts("post_type=post&paged=$current_page&posts_per_page=$posts_per_page"); ?>
			
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<?php get_template_part('element', 'blog'); ?>
			<?php endwhile; ?>

			<?php cpotheme_pagination(); ?>
			<?php endif; ?>
		</section>
		<?php get_sidebar('blog'); ?>
	</div>
	</div>

<?php get_footer(); ?>