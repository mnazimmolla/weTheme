<?php
function price_meta_box(){
	add_meta_box(
		'price_meta', #id
		'Price Title', #title
		'price_meta_callback', #callback
		'pricing', #screen
		'normal', #contex
		'high' #priority
	);
}
add_action('add_meta_boxes','price_meta_box');

function price_meta_callback($post){
	$p_title = get_post_meta($post->ID, 'p_title', true);
	$p_currancy = get_post_meta($post->ID, 'p_currancy', true);
	$p_amount = get_post_meta($post->ID, 'p_amount', true);
	$p_duration = get_post_meta($post->ID, 'p_duration', true);
	$p_service1 = get_post_meta($post->ID, 'p_service1', true);
	$p_service2 = get_post_meta($post->ID, 'p_service2', true);
	$p_service3 = get_post_meta($post->ID, 'p_service3', true);
	$p_service4 = get_post_meta($post->ID, 'p_service4', true);
	$p_service5 = get_post_meta($post->ID, 'p_service5', true);
	
	
	
	wp_nonce_field('save_pricing_nonce','pricing_nonce');
	?>
	
	<p>
		<label>Pricing Title</label>
		<input type="text" name="p_title" value="<?php echo $p_title;?>"/>
	</p>
	<p>
		<label>Pricing Currancy</label>
		<input type="text" name="p_currancy" value="<?php echo $p_currancy;?>"/>
	</p>
	<p>
		<label>Pricing Amount</label>
		<input type="text" name="p_amount" value="<?php echo $p_amount;?>"/>
	</p>	
	<p>
		<label>Pricing Duration</label>
		<input type="text" name="p_duration" value="<?php echo $p_duration;?>"/>
	</p>
	<p>
		<label>Pricing Service 1</label>
		<input type="text" name="p_service1" value="<?php echo $p_service1;?>"/>
	</p>
	<p>
		<label>Pricing Service 2</label>
		<input type="text" name="p_service2" value="<?php echo $p_service2;?>"/>
	</p>
	<p>
		<label>Pricing Service 3</label>
		<input type="text" name="p_service3" value="<?php echo $p_service3;?>"/>
	</p>
	<p>
		<label>Pricing Service 4</label>
		<input type="text" name="p_service4" value="<?php echo $p_service4;?>"/>
	</p>
	<p>
		<label>Pricing Service 5</label>
		<input type="text" name="p_service5" value="<?php echo $p_service5;?>"/>
	</p>
	
	
	<?php 
}
function save_pricing_nonce($post_id){
	//check nonce is set.
	if(! isset($_POST['pricing_nonce'])){
		return;
	}
	
	//verify nonce.
	if(! wp_verify_nonce($_POST['pricing_nonce'], 'save_pricing_nonce')){
		return;
	}
	
	//check input is set 
	if(! isset($_POST['p_title'])){
		return;
	}
	if(! isset($_POST['p_currancy'])){
		return;
	}
	if(! isset($_POST['p_amount'])){
		return;
	}
	if(! isset($_POST['p_duration'])){
		return;
	}
	if(! isset($_POST['p_service1'])){
		return;
	}	
	if(! isset($_POST['p_service2'])){
		return;
	}
	if(! isset($_POST['p_service3'])){
		return;
	}
	if(! isset($_POST['p_service4'])){
		return;
	}
	if(! isset($_POST['p_service5'])){
		return;
	}
	
	
	
	//sanitize input filed
	$my_p_title = sanitize_text_field($_POST['p_title']);
	$my_p_currancy = sanitize_text_field($_POST['p_currancy']);
	$my_p_amount = sanitize_text_field($_POST['p_amount']);
	$my_p_duration = sanitize_text_field($_POST['p_duration']);
	$my_p_service1 = sanitize_text_field($_POST['p_service1']);
	$my_p_service2 = sanitize_text_field($_POST['p_service2']);
	$my_p_service3 = sanitize_text_field($_POST['p_service3']);
	$my_p_service4 = sanitize_text_field($_POST['p_service4']);
	$my_p_service5 = sanitize_text_field($_POST['p_service5']);
	
	
	update_post_meta($post_id,'p_title', $my_p_title);
	update_post_meta($post_id,'p_currancy', $my_p_currancy);
	update_post_meta($post_id,'p_amount', $my_p_amount);
	update_post_meta($post_id,'p_duration', $my_p_duration);
	update_post_meta($post_id,'p_service1', $my_p_service1);
	update_post_meta($post_id,'p_service2', $my_p_service2);
	update_post_meta($post_id,'p_service3', $my_p_service3);
	update_post_meta($post_id,'p_service4', $my_p_service4);
	update_post_meta($post_id,'p_service5', $my_p_service5);
}
add_action('save_post','save_pricing_nonce');
?>