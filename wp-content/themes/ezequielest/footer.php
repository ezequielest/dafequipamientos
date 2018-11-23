			<div class="clear"></div>
			
			<div id="footersidebar" class="footersidebar">
				<div class="container">
				<?php get_sidebar('footer'); ?>
				</div>
			</div>
			
			<div id="footer" class="footer">
				<div class="container">
					<!--<div id="footermenu" class="footermenu">
						<?php wp_nav_menu(array('menu_class' => 'menu-footer', 'theme_location' => 'footer_menu', 'depth' => '2', 'fallback_cb' => false)); ?>
					</div>-->
					<div style="float:left; margin-left:25%;">&copy; <?php bloginfo('name'); ?> <?php echo date("Y"); ?> - INDUSTRIA ARGENTINA</div>
                                        <div style="float:right;">Diseñado por <a href="http://www.ezequielest.com" target="_blanck" alt="diseñado por ezequielest"><img src="http://www.ezequielest.com/wp-content/uploads/2016/02/logo-66x44-rojoblanco.png" width="38" style="padding-left:5px;"/></a></div> 
				</div>
			</div>
			<div class="clear"></div>
		</div><!-- wrapper -->
	</div><!-- outer -->
	<?php wp_footer(); ?>
</body>
</html>