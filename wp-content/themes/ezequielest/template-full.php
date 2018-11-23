<?php
/*
  Template Name: Full-width Page
 */
?>
<?php get_header(); ?>

<div id="main" class="main">	

  <div class="primero">
      <section id="content" class="container">
        <div id="post">
          <div class="page-content">
           
          </div>
        </div>
      </section>
  </div>
  
	<?php if(have_posts()) while(have_posts()): the_post(); ?>
	<?php get_template_part('element', 'page-header'); ?>
	<div class="container">
		<section id="content" class="content content-wide">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="page-content">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<div class="page-link">'.__('Pages', 'cpotheme').':', 'after' => '</div>')); ?>
				</div>
			</div>
			<?php comments_template('', true); ?>
		</section>
	</div>
  
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>
