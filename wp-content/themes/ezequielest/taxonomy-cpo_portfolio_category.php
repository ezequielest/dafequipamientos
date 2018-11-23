<?php get_header(); ?>


<div id="main" class="main">
	<div class="container">
		<?php cpotheme_breadcrumb(); ?>
	</div>
	
	<div id="pagetitle" class="pagetitle">
		<div class="container">
			<h1 class="pagetitle-title"><?php echo single_tag_title('', true); ?></h1>
		</div>
	</div>
		
	<div class="container">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-content">
				<?php echo tag_description(); ?>
			</div>
		</div>
	</div>	
	
	<div class="container">
		<?php get_template_part('element', 'portfolio-navigation'); ?>
		
		<?php if(have_posts()): $feature_count = 0; ?>
		<section id="portfolio" class="portfolio">
			<div class="portfolio-content">
				<?php while(have_posts()): the_post(); ?>
				<?php if($feature_count % 4 == 0 && $feature_count != 0) echo '<div class="col-divide"></div>'; ?>
				<?php $feature_count++; ?>
				<div class="column col4<?php if($feature_count % 4 == 0 && $feature_count != 0) echo ' col-last'; ?>">
					<?php get_template_part('element', 'portfolio'); ?>
				</div>
				<?php endwhile; ?>
				<div class='clear'></div>
			</div>
		</section>
		<?php endif; ?>
		<?php cpotheme_pagination(); ?>
	</div>
</div>

<?php get_footer(); ?>