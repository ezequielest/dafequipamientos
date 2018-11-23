<?php
/*
  This template is used to display the main portfolio navigation.
 */
?>

<?php global $post; ?>
<?php $feature_posts = get_terms('cpo_portfolio_category', 'order=ASC&orderby=name'); ?>
<?php if(sizeof($feature_posts) > 0): $feature_count = 0; ?>
<ul class="menu-portfolio">
	<?php if(cpotheme_get_option('cpo_postpage_portfolio') != 0): ?>
	<li class="item">
		<a href="<?php echo cpotheme_get_option('cpo_postpage_portfolio'); ?>"><?php _e('Back to Portfolio', 'cpotheme'); ?></a>
	</li>
	<?php endif; ?>
	<?php wp_list_categories("taxonomy=cpo_portfolio_category&title_li="); ?>
</ul>
<?php endif; ?>