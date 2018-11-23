<?php
/*
  This template is used to display the heading and banner of most pages.
 */
?>
<div class="container">
	<?php cpotheme_breadcrumb(); ?>
</div>
	
<?php if(!is_home() && !is_front_page()){ ?>
<div id="pagetitle" class="pagetitle">
	<div class="container">
		<h1 class="pagetitle-title"><?php the_title(); ?></h1>
	</div>
</div>
<?php } ?>