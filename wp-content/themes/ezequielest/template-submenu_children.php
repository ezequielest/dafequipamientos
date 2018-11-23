<?php
/*
  Template Name: Submenu: Children
 */
?>
<?php get_header(); ?>

<div id="main" class="main">
	<?php if (have_posts()) while (have_posts()) : the_post(); ?>
	
	<?php get_template_part('element', 'page-header'); ?>
	
	<div class="container">
		<div id="submenu" class="submenu">
			<ul class="menu-sub">
				<?php wp_list_pages("title_li=&child_of=".$post->ID); ?>
			</ul>
		</div>
		<div id="content" class="content">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="content">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<div class="page-link">' . __('Pages:', 'cpotheme'), 'after' => '</div>')); ?>
				</div>

			</div>
		</div>
	</div>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>