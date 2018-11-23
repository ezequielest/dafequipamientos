<?php get_header(); ?>

<div id="main" class="main">
	<div id="pagetitle" class="pagetitle">
		<div class="container">
			<h1 class="pagetitle-title"><?php _e('Search Results for', 'cpotheme') ?> '<?php echo the_search_query();?>'</h1>
		</div>
	</div>
	
	<div class="container">
		<section id="content" class="content">
			<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<?php $current_format = get_post_format(); ?>
			<article <?php post_class('post'); ?> id="post-<?php the_ID(); ?>"> 
				<?php if(get_post_type() == 'post'): ?>
					<?php if($current_format == 'gallery'):
						$args = array(
						'post_type' => 'attachment',
						'numberposts' => null,
						'post_status' => null,
						'post_mime_type' => 'image',
						'post_parent' => $post->ID);
						cpotheme_post_slideshow($args); ?>
						
						<?php elseif(has_post_thumbnail() && !is_singular()): ?>
						<div class="post-image">
							<a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Go to %s', 'cpotheme'), the_title_attribute('echo=0')); ?>" rel="bookmark">
								<?php the_post_thumbnail(array(800, 500)); ?>
							</a>
						</div>
					<?php endif; ?>
					
					<div class="post-byline">
						<div class="post-date">
							<?php the_time('M d'); ?>
							<span class="icon icon-time"></span>
						</div>
						<?php cpotheme_postpage_author(); ?>
						<?php cpotheme_postpage_categories(); ?>
						<?php cpotheme_postpage_comments(); ?>
					</div>
				<?php endif; ?>
				<h2 class="post-title">
					<a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Go to %s', 'cpotheme'), the_title_attribute('echo=0')); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
				<div class="post-content">
					<?php the_excerpt(); ?>
					<a class="readmore" href="<?php the_permalink(); ?>"><?php _e('Read More', 'cpotheme'); ?> &raquo;</a>
				</div>
			</article>
			<?php endwhile; ?>
			<?php cpotheme_pagination(); ?>
			<?php endif; ?>
		</section>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
