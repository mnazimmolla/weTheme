<?php
#register sidebar for widget
function footer_widget(){
	register_sidebar(array(
	'name'=>'Contact Widget',
	'id'=>'contact_widget',
	'description'=>'This is our Contact Widget',
	'before_widget'=>'<div class="col-md-3"><div class="widget">',
	'after_widget'=>'</div></div>',
	'before_title'=>'<h3 class="widget-title">',
	'after_title'=>'</h3>'
	));
}
add_action('widgets_init','footer_widget');
#register blog sidebar for widget
function blog_widget(){
	register_sidebar(array(
	'name'=>'Blog Widget',
	'id'=>'blog_widget',
	'description'=>'This is our Blog Sidebar Widget',
	'before_widget'=>'<div class="widget">',
	'after_widget'=>'</div>',
	'before_title'=>'<h4 class="title">',
	'after_title'=>'</h4>'
	));
}

add_action('widgets_init','blog_widget');



class contact_sidebar extends WP_Widget {

	function __construct() {
		// Instantiate the parent object
		parent::__construct(
		'footer_class', #id
		'Contact Us' #name
		);
		
	}
	
	function form( $instance ) {
		// Output admin widget options form
		$title = ! empty($instance['title'])? $instance['title'] : 'Input Field is Empty';
		$icon = ! empty($instance['icon'])? $instance['icon'] : 'Input Field is Empty';
		$address = ! empty($instance['address'])? $instance['address'] : 'Input Field is Empty';
		$icon2 = ! empty($instance['icon2'])? $instance['icon2'] : 'Input Field is Empty';
		$mobile = ! empty($instance['mobile'])? $instance['mobile'] : 'Input Field is Empty';
		$eicon = ! empty($instance['eicon'])? $instance['eicon'] : 'Input Field is Empty';
		$email = ! empty($instance['email'])? $instance['email'] : 'Input Field is Empty';


		?>
		
		<p>
			<label>Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title');?>" value="<?php echo $title;?>" />
		</p>
		<p>
			<label>Icon</label>
			<input type="text" name="<?php echo $this->get_field_name('icon');?>" value="<?php echo $icon;?>" />
		</p>
		<p>
			<label>Address</label>
			<input type="text" name="<?php echo $this->get_field_name('address');?>" value="<?php echo $address;?>" />
		</p>
		<p>
			<label>Icon Mobile</label>
			<input type="text" name="<?php echo $this->get_field_name('icon2');?>" value="<?php echo $icon2;?>" />
		</p>
		<p>
			<label>Mobile</label>
			<input type="text" name="<?php echo $this->get_field_name('mobile');?>" value="<?php echo $mobile;?>" />
		</p>
		<p>
			<label>E-mail Icon</label>
			<input type="text" name="<?php echo $this->get_field_name('eicon');?>" value="<?php echo $eicon;?>" />
		</p>
		<p>
			<label>E-mail</label>
			<input type="text" name="<?php echo $this->get_field_name('email');?>" value="<?php echo $email;?>" />
		</p>
		
		<?php
	}
	
	function update( $new_instance, $old_instance ) {
		// Save widget options
		
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
		$instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
		$instance['icon2'] = ( ! empty( $new_instance['icon2'] ) ) ? strip_tags( $new_instance['icon2'] ) : '';
		$instance['mobile'] = ( ! empty( $new_instance['mobile'] ) ) ? strip_tags( $new_instance['mobile'] ) : '';
		$instance['eicon'] = ( ! empty( $new_instance['eicon'] ) ) ? strip_tags( $new_instance['eicon'] ) : '';
		$instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';

		return $instance;
	}
	
	function widget( $args, $instance ) {
		// Widget output
		 echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) )
		if ( ! empty( $instance['icon'] ) )
		if ( ! empty( $instance['address'] ) )
		if ( ! empty( $instance['icon2'] ) )
		if ( ! empty( $instance['mobile'] ) )
		if ( ! empty( $instance['eicon'] ) )
		if ( ! empty( $instance['email'] ) )
		?>
			<div class="widget-title">
				<h3 class="widget-title"><?php echo $instance['title'];?></h3>
			</div><!-- /.widget-title -->
			<div class="address">
				<p>
					<span class="icon"><i class="fa fa-<?php echo $instance['icon']; ?>"></i></span> 
					<span class="txt"><?php echo $instance['address'];?></span>
				</p>							
				<p>
					<span class="icon"><i class="fa fa-<?php echo $instance['icon2']; ?>"></i></span> 
					<span class="txt"> <?php echo $instance['mobile']?></span>
				</p>
				<p>
					<span class="icon"><i class="fa fa-<?php echo $instance['eicon'];?>"></i></span> 
					<span class="txt"> <?php echo $instance['email'];?></span>
				</p>
			</div><!-- /.address -->
	<?php
		echo $args['after_widget'];
	}	
}



#register custom widget
function contact_widget_wp(){
	register_widget('contact_sidebar');
}
add_action('widgets_init','contact_widget_wp');