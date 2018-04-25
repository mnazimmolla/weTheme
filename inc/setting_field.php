<?php

function setting_field(){
	
	#add setting field
	#add_settings_field($id, $title, $callback, $page);
	add_settings_field('service_title', 'Service Section Title', 'service_title_callback', 'general');
	add_settings_field('service_des', 'Service Section Description', 'service_des_callback', 'general');
	add_settings_field('profetional_title', 'Profetional Section Title', 'profetional_title_callback', 'general');
	add_settings_field('profetional_des', 'Profetional Section Description', 'profetional_des_callback', 'general');
	add_settings_field('portfolio_title', 'Portfolio Section Title', 'portfolio_title_callback', 'general');
	add_settings_field('portfolio_des', 'Portfolio Section Description', 'portfolio_des_callback', 'general');
	add_settings_field('pricing_title', 'Pricing Section Title', 'pricing_title_callback', 'general');
	add_settings_field('pricing_des', 'Pricing Section Description', 'pricing_des_callback', 'general');
	
	
	#register setting filed 
	//register_setting( $option_group/$page, $option_name/id,);
	register_setting( 'general', 'service_title');
	register_setting( 'general', 'service_des');
	register_setting( 'general', 'profetional_title');
	register_setting( 'general', 'profetional_des');
	register_setting( 'general', 'portfolio_title');
	register_setting( 'general', 'portfolio_des');
	register_setting( 'general', 'pricing_title');
	register_setting( 'general', 'pricing_des');
	
	function service_title_callback(){
		echo '<input type="text" name="service_title" value="'.get_option('service_title').'" />';
	}
	function service_des_callback(){
		echo '<input type="text" name="service_des" value="'.get_option('service_des').'" />';
	}
	function profetional_title_callback(){
		echo '<input type="text" name="profetional_title" value="'.get_option('profetional_title').'" />';
	}
	function profetional_des_callback(){
		echo '<input type="text" name="profetional_des" value="'.get_option('profetional_des').'" />';
	}
	function portfolio_title_callback(){
		echo '<input type="text" name="portfolio_title" value="'.get_option('portfolio_title').'" />';
	}
	function portfolio_des_callback(){
		echo '<input type="text" name="portfolio_des" value="'.get_option('portfolio_des').'" />';
	}
	function pricing_title_callback(){
		echo '<input type="text" name="pricing_title" value="'.get_option('pricing_title').'" />';
	}
	function pricing_des_callback(){
		echo '<input type="text" name="pricing_des" value="'.get_option('pricing_des').'" />';
	}
}
add_action('admin_init','setting_field');