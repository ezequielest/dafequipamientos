<?php

if(!class_exists('Cpotheme_Widget_Social')){
	class Cpotheme_Widget_Social extends WP_Widget{
		
		function Cpotheme_Widget_Social(){
			$widget_ops = array('classname' => 'cpotheme-social', 'description' => __('This widget lets you display an advertising banner of any size.', 'cpocore'));
			$this->WP_Widget('cpotheme-social', __('CPO - Social Links', 'cpocore'), $widget_ops);
			$this->alt_option_name = 'cpotheme-social';
		}

		function widget($args, $instance){
			extract($args);
			$title = apply_filters('widget_title', $instance['title']);
			$page_rss = esc_attr($instance['page_rss']);
			$page_facebook = esc_attr($instance['page_facebook']);
			$page_twitter = esc_attr($instance['page_twitter']);
			$page_gplus = esc_attr($instance['page_gplus']);
			$page_linkedin = esc_attr($instance['page_linkedin']);
			$page_youtube = esc_attr($instance['page_youtube']);
			$page_tumblr = esc_attr($instance['page_tumblr']);
			$page_skype = esc_attr($instance['page_skype']);
			$page_pinterest = esc_attr($instance['page_pinterest']);
			$page_instagram = esc_attr($instance['page_instagram']);
			$page_dribbble = esc_attr($instance['page_dribbble']);
			
			echo $before_widget;
			if($title != '') echo $before_title.$title.$after_title; ?>
			<div class="widget-content" id="<?php echo $widget_id; ?>">
				<?php if($page_rss != ''): ?>
				<a class="social-link social-link-rss" href="<?php echo esc_url($page_rss); ?>">
					<span class="social-icon icon-rss"></span>
				</a>
				<?php endif; ?>
				<?php if($page_facebook != ''): ?>
				<a class="social-link social-link-facebook" href="<?php echo esc_url($page_facebook); ?>">
					<span class="social-icon icon-facebook"></span>
				</a>
				<?php endif; ?>
				<?php if($page_twitter != ''): ?>
				<a class="social-link social-link-twitter" href="<?php echo esc_url($page_twitter); ?>">
					<span class="social-icon icon-twitter"></span>
				</a>
				<?php endif; ?>
				<?php if($page_gplus != ''): ?>
				<a class="social-link social-link-gplus" href="<?php echo esc_url($page_gplus); ?>">
					<span class="social-icon icon-google-plus"></span>
				</a>
				<?php endif; ?>
				<?php if($page_linkedin != ''): ?>
				<a class="social-link social-link-linkedin" href="<?php echo esc_url($page_linkedin); ?>">
					<span class="social-icon icon-linkedin"></span>
				</a>
				<?php endif; ?>
				<?php if($page_youtube != ''): ?>
				<a class="social-link social-link-youtube" href="<?php echo esc_url($page_youtube); ?>">
					<span class="social-icon icon-youtube"></span>
				</a>
				<?php endif; ?>
				<?php if($page_tumblr != ''): ?>
				<a class="social-link social-link-tumblr" href="<?php echo esc_url($page_tumblr); ?>">
					<span class="social-icon icon-tumblr"></span>
				</a>
				<?php endif; ?>
				<?php if($page_skype != ''): ?>
				<a class="social-link social-link-skype" href="<?php echo esc_url($page_skype); ?>">
					<span class="social-icon icon-skype"></span>
				</a>
				<?php endif; ?>
				<?php if($page_pinterest != ''): ?>
				<a class="social-link social-link-pinterest" href="<?php echo esc_url($page_pinterest); ?>">
					<span class="social-icon icon-pinterest"></span>
				</a>
				<?php endif; ?>
				<?php if($page_instagram != ''): ?>
				<a class="social-link social-link-instagram" href="<?php echo esc_url($page_instagram); ?>">
					<span class="social-icon icon-instagram"></span>
				</a>
				<?php endif; ?>
				<?php if($page_dribbble != ''): ?>
				<a class="social-link social-link-dribbble" href="<?php echo esc_url($page_dribbble); ?>">
					<span class="social-icon icon-dribbble"></span>
				</a>
				<?php endif; ?>
			</div>
			<?php echo $after_widget;
		}

		function update($new_instance, $old_instance){
			$instance = $old_instance;
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['page_rss'] = $new_instance['page_rss'];
			$instance['page_facebook'] = $new_instance['page_facebook'];
			$instance['page_twitter'] = $new_instance['page_twitter'];
			$instance['page_gplus'] = $new_instance['page_gplus'];
			$instance['page_linkedin'] = $new_instance['page_linkedin'];
			$instance['page_youtube'] = $new_instance['page_youtube'];
			$instance['page_tumblr'] = $new_instance['page_tumblr'];
			$instance['page_skype'] = $new_instance['page_skype'];
			$instance['page_instagram'] = $new_instance['page_instagram'];
			$instance['page_dribbble'] = $new_instance['page_dribbble'];
			$instance['page_pinterest'] = $new_instance['page_pinterest'];
			return $instance;
		}

		function form($instance){
			$instance = wp_parse_args((array)$instance, 
			array('title' => '', 
			'page_rss' => '', 
			'page_facebook' => '', 
			'page_twitter' => '', 
			'page_gplus' => '', 
			'page_linkedin' => '', 
			'page_youtube' => '', 
			'page_tumblr' => '', 
			'page_skype' => '', 
			'page_pinterest' => '', 
			'page_instagram' => '', 
			'page_dribbble' => '', 
			'ad_code' => ''));
			
			extract($instance, EXTR_SKIP);
			$title = esc_attr($instance['title']);
			$page_rss = esc_attr($instance['page_rss']);
			$page_facebook = esc_attr($instance['page_facebook']);
			$page_twitter = esc_attr($instance['page_twitter']);
			$page_gplus = esc_attr($instance['page_gplus']);
			$page_linkedin = esc_attr($instance['page_linkedin']);
			$page_youtube = esc_attr($instance['page_youtube']);
			$page_tumblr = esc_attr($instance['page_tumblr']);
			$page_skype = esc_attr($instance['page_skype']);
			$page_pinterest = esc_attr($instance['page_pinterest']);
			$page_instagram = esc_attr($instance['page_instagram']);
			$page_dribbble = esc_attr($instance['page_dribbble']); ?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cpocore'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_rss'); ?>"><?php _e('RSS URL', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_rss'); ?>" name="<?php echo $this->get_field_name('page_rss'); ?>" type="text" value="<?php echo $page_rss; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_facebook'); ?>"><?php _e('Facebook Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_facebook'); ?>" name="<?php echo $this->get_field_name('page_facebook'); ?>" type="text" value="<?php echo $page_facebook; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_twitter'); ?>"><?php _e('Twitter Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_twitter'); ?>" name="<?php echo $this->get_field_name('page_twitter'); ?>" type="text" value="<?php echo $page_twitter; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_gplus'); ?>"><?php _e('Google Plus Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_gplus'); ?>" name="<?php echo $this->get_field_name('page_gplus'); ?>" type="text" value="<?php echo $page_gplus; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_linkedin'); ?>"><?php _e('LinkedIn Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_linkedin'); ?>" name="<?php echo $this->get_field_name('page_linkedin'); ?>" type="text" value="<?php echo $page_linkedin; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_youtube'); ?>"><?php _e('YouTube Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_youtube'); ?>" name="<?php echo $this->get_field_name('page_youtube'); ?>" type="text" value="<?php echo $page_youtube; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_tumblr'); ?>"><?php _e('Tumblr Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_tumblr'); ?>" name="<?php echo $this->get_field_name('page_tumblr'); ?>" type="text" value="<?php echo $page_tumblr; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_skype'); ?>"><?php _e('Skype Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_skype'); ?>" name="<?php echo $this->get_field_name('page_skype'); ?>" type="text" value="<?php echo $page_skype; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_pinterest'); ?>"><?php _e('Pinterest Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_pinterest'); ?>" name="<?php echo $this->get_field_name('page_pinterest'); ?>" type="text" value="<?php echo $page_pinterest; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_instagram'); ?>"><?php _e('Instagram Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_instagram'); ?>" name="<?php echo $this->get_field_name('page_instagram'); ?>" type="text" value="<?php echo $page_instagram; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('page_dribbble'); ?>"><?php _e('Dribbble Page', 'cpocore'); ?></label><br/>
				<input class="widefat" id="<?php echo $this->get_field_id('page_dribbble'); ?>" name="<?php echo $this->get_field_name('page_dribbble'); ?>" type="text" value="<?php echo $page_dribbble; ?>" />
			</p>
		<?php }
	}
	register_widget('Cpotheme_Widget_Social');
}
