<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

<div id="main" class="main">
	<?php if(have_posts()) while(have_posts()): the_post(); ?>

	<?php get_template_part('element', 'page-header'); ?>
		
	<div class="container">		
		<div id="content" class="content content-wide">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="page-content">
					<?php the_content(); ?>
					<?php wp_link_pages(array('before' => '<div class="page-link">'.__('Pages', 'cpotheme').':', 'after' => '</div>')); ?>
				</div>
			</div>
		</div>
	</div>

   <div class="tercero">
    <section id="content" class="container">
          <div class="col-md-12 center">
             <span>Acceda a nuestro catálogo online 2016</span>
             <div class="botones-catalogo">
                <a class="btn-pdf" href="http://www.dafequipamientos.com/wp-content/Catalogo-2015.pdf" download="daf-catalogo-2016">Descargar</a>
                <a class="btn-veronline" href="http://www.dafequipamientos.com/catalogo">Ver catálogo Online</a>
             </div>
          </div>
    </section>
  </div>

  <div id="empresas" style="text-align:center;">
    <h3>Algunas de las <strong>empresas</strong> que confiaron en nosotros:</h3>
    <a href="http://www.ushuaiaextremo.com/" target="_blanck"><img src="http://www.dafequipamientos.com/wp-content/empresas/emp1.jpg" alt="ushuaiaextremo" width="110"></a>&nbsp;<a href="http://www.calafatemountainpark.com/es/index.aspx" target="_blanck"><img src="http://www.dafequipamientos.com/wp-content/empresas/emp2.jpg" alt="calafatemountainpark" width="90"></a>&nbsp;&nbsp;<a href="http://www.yetipatagonia.com.ar/" target="_blanck"><img src="http://www.dafequipamientos.com/wp-content/empresas/emp3.jpg" alt="yetipatagonia" width="80"></a>&nbsp;&nbsp;<a href="http://www.fronterasur.net/" target="_blanck"><img src="http://www.dafequipamientos.com/wp-content/empresas/emp5.jpg" alt="fronterasur" width="90"></a>&nbsp;&nbsp;<a href="http://www.adventurestore.com.ar/" target="_blanck"><img src="http://www.dafequipamientos.com/wp-content/empresas/emp4.jpg" alt="adventure" width="80"></a>&nbsp;&nbsp;<a href="http://www.vivapatagonia.com/" target="_blanck"><img src="http://www.dafequipamientos.com/wp-content/empresas/emp6.jpg" alt="vivapatagonia" width="80"></a><a href="www.rossiski.com.ar" target="_blank"><img class="" src="http://www.dafequipamientos.com/wp-content/uploads/2015/07/11756625_710189155775113_1995951922_n1.jpg" alt="" width="99" height="66"></a><img class="alignnone wp-image-897" src="http://www.dafequipamientos.com/wp-content/uploads/2015/01/11868794_722587134535315_1674731912_n_02-300x158.jpg" alt="11868794_722587134535315_1674731912_n_02" width="100" height="52">
  </div>
	<?php endwhile; ?>
</div>

<?php get_footer(); ?>