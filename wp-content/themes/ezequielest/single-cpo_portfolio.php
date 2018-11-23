<?php get_header(); ?>

<div id="main" class="main">
	<?php if(have_posts()) while(have_posts()): the_post(); ?>
	
	<div class="container">
		<?php cpotheme_breadcrumb(); ?>
	</div>
	
	<div id="pagetitle" class="pagetitle">
		<div class="container">
			<h1 class="pagetitle-title"><?php the_title(); ?></h1>
		</div>
	</div>
		
	<div class="container">
		<section id="content" class="content content-wide">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php $portfolio_layout = get_post_meta(get_the_ID(), 'portfolio_layout', true); 
					
					//Image Slideshows
					if($portfolio_layout == 'slideshow'):
					$args = array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_status' => null,
					'post_mime_type' => 'image',
					'exclude' => get_post_thumbnail_id(),
					'post_parent' => $post->ID);
					cpotheme_post_slideshow($args); 
					
					//Image Galleries
					elseif($portfolio_layout == 'gallery'):
					$args = array(
					'post_type' => 'attachment',
					'posts_per_page' => -1,
					'post_status' => null,
					'post_mime_type' => 'image',
					'exclude' => get_post_thumbnail_id(),
					'post_parent' => $post->ID);
					cpotheme_post_gallery($args, 3); 
					
					//Videos
					elseif($portfolio_layout == 'video'): 
					cpotheme_post_video(get_post_meta(get_the_ID(), 'portfolio_video', true));
					
					//Single Image
					elseif($portfolio_layout == 'normal'): ?>
					<div class="portfolio-image">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php endif; ?>

				<div class="portfolio-content">
					<?php the_content(); ?>
				</div>
				<?php wp_link_pages(array('before' => '<div id="postpagination">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>')); ?>
			</div>
		</section>
	</div>
	<?php endwhile; ?>
</div>


<?php get_footer(); ?>