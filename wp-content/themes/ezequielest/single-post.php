<?php get_header(); ?>

<div id="main" class="main">

	<?php if(have_posts()) while(have_posts()): the_post(); ?>
	
	<?php get_template_part('element', 'page-header'); ?>
		
	<div class="container">
		<section id="content" class="content <?php cpotheme_sidebar_position(); ?>">
			<?php get_template_part('element', 'blog'); ?>
			<?php if(get_the_author_meta('description')) cpotheme_post_authorbio(); ?>
			<?php comments_template('', true); ?>
		</section>
		<?php get_sidebar('blog'); ?>
	</div>
	<?php endwhile; ?>

</div>

<?php get_footer(); ?>