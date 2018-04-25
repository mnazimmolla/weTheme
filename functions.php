<?php
	register_nav_menus(array (
	"header_menu"=>"click to add in Header Menu",
	"footer_menu"=>"click to add in Footer Menu",
	)	
);




add_theme_support('custom-header');
add_theme_support('post-thumbnails');


require_once("inc/metabox.php");
require_once("inc/widget.php");
require_once("inc/setting_field.php");

function add_css_js(){
	wp_enqueue_style("awesome", get_template_directory_uri()."/assets/css/font-awesome.min.css", array(), "version", "All");
	wp_enqueue_style("bootstrap", get_template_directory_uri()."/assets/css/bootstrap.min.css", array(), "version", "All");
	wp_enqueue_style("smartmenus", get_template_directory_uri()."/assets/css/jquery.smartmenus.bootstrap.css", array(), "version", "All");
	wp_enqueue_style("style", get_template_directory_uri()."/assets/css/style.css", array(), "version", "All");
	wp_enqueue_style("responsive", get_template_directory_uri()."/assets/css/responsive.css", array(), "version", "All");

	//modernizr ken dilen na?
	wp_enqueue_script("modernizr", get_template_directory_uri()."/assets/js/modernizr.js", array(jquery),"version", false);
	wp_enqueue_script("plugins", get_template_directory_uri()."/assets/js/plugins.js", array(jquery),"version", true);
	wp_enqueue_script("functions", get_template_directory_uri()."/assets/js/functions.js", array(jquery),"version", true);
}
add_action("wp_enqueue_scripts","add_css_js");




function team_post(){
	$args = array(
		"public"=> true,
		"label"=> "Team",
		"supports"=> array("title","editor","thumbnail"),
	);
	register_post_type("team",$args);
}
add_action("init","team_post");


function service_post(){
	$args = array(
		"public"=>true,
		"label"=>"Service Post",
		"supports"=> array("title","editor","thumbnail"),
	);
	register_post_type("service",$args);
}
add_action("init","service_post");







function slider_post(){
	$args = array(
		"label" => "Slider",
		"public" => true,
		supports => array("title","thumbnail","editor"),
	);
	register_post_type("slider",$args);
}
add_action("init","slider_post");


#register metabox for slider post
function slider_metabox(){
		add_meta_box(
		'slider_custom_metabox', #id
		'Slider Option', #name
		'slider_custom_metabox_callback', #callback
		'slider', #screen
		'normal', #context
		'high' #priority
	);
}
add_action('add_meta_boxes','slider_metabox');
function slider_custom_metabox_callback($post){
	$sliderhead = get_post_meta($post->ID, slihead, true);
	$sliderdes = get_post_meta($post->ID, sliderdes, true);
	$slidertext = get_post_meta($post->ID, slidertext, true);
	$sliderhref = get_post_meta($post->ID, sliderhref, true);
	
	
	wp_nonce_field('save_slider_meta','slider_nonce');
	?>
	<p>
		<label>Slider Heading</label>
		<input type="text" name="slihead" value="<?php echo $sliderhead;?>" />
	</p>
	<p>
		<label>Slider Description</label>
		<input type="text" name="sliderdes" value="<?php echo $sliderdes;?>" />
	</p>
	<p>
		<label>Slider Button text</label>
		<input type="text" name="slidertext" value="<?php echo $slidertext;?>" />
	</p>
	<p>
		<label>Slider Hyperlink</label>
		<input type="text" name="sliderhref" value="<?php echo $sliderhref;?>" />
	</p>
	<?php
}
function save_slider_meta($post_id){
	if(!isset ($_POST['slider_nonce'])){
		return;
	}
	if(! wp_verify_nonce($_POST['slider_nonce'], 'save_slider_meta')){
		return;
	}
	if(!isset($_POST['slihead'])){
		return;
	}
	if(!isset($_POST['sliderdes'])){
		return;
	}
	if(!isset($_POST['slidertext'])){
		return;
	}
	if(!isset($_POST['sliderhref'])){
		return;
	}
	$myslider = sanitize_text_field($_POST['slihead']);
	$mysliderdes = sanitize_text_field($_POST['sliderdes']);
	$myslidertext = sanitize_text_field($_POST['slidertext']);
	$mysliderhref = sanitize_text_field($_POST['sliderhref']);
	
	
	update_post_meta($post_id, 'slihead', $myslider);
	update_post_meta($post_id, 'sliderdes', $mysliderdes);
	update_post_meta($post_id, 'slidertext', $myslidertext);
	update_post_meta($post_id, 'sliderhref', $mysliderhref);
}
add_action('save_post','save_slider_meta');












function service_metabox(){
	add_meta_box(
	"service_icon", //id
	"Service Icon", //title
	"service_icon_callback", //callback
	"service", //screen
	"normal", //priority
	"high" //position
	);
}
add_action("add_meta_boxes","service_metabox");

function service_icon_callback($post){
	$s_icon = get_post_meta($post->ID, "s_icon",true);
	wp_nonce_field("save_service_icon","service_nonce");
	?>
	<p>
		<label>Icon</label>
		<input class="" type="text" name="s_icon" value="<?php echo $s_icon; ?>" />
	</p>
	<?php 
}
function save_service_icon($post_id){
	if(!isset($_POST["service_nonce"])){
		return;
	}
	if(! wp_verify_nonce($_POST["service_nonce"], "save_service_icon")){
		return;
	}
	if(!isset($_POST["s_icon"])){
		return;
	}
	$my_s_icon = sanitize_text_field($_POST["s_icon"]);
	update_post_meta($post_id, "s_icon", $my_s_icon);
}
add_action("save_post","save_service_icon");
//pricing table custom post type register. 



function pricing_table_post() {
	$labels = array(
		'name'               => _x( 'Pricing', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Pricing', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Pricing', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Pricing', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Pricing', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Pricing', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Pricing', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Pricing', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Pricing', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Pricing', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Pricing', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Pricing:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Pricing found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Pricing found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Pricing' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'pricing', $args );
}
add_action( 'init', 'pricing_table_post' );

#register portfolio item custom post type


function portitems_custom_post() {
	$labels = array(
		'name'               => _x( 'items', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'item', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'items', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'item', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'item', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New item', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New item', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit item', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View item', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All items', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search items', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent items:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No items found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No items found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'item' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'items', $args );
}
add_action( 'init', 'portitems_custom_post' );

#register taxonomy for item custom post type. 


function item_taxonomy_post() {
	$labels = array(
		'name'              => _x( 'items', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'item', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search items', 'textdomain' ),
		'all_items'         => __( 'All items', 'textdomain' ),
		'parent_item'       => __( 'Parent item', 'textdomain' ),
		'parent_item_colon' => __( 'Parent item:', 'textdomain' ),
		'edit_item'         => __( 'Edit item', 'textdomain' ),
		'update_item'       => __( 'Update item', 'textdomain' ),
		'add_new_item'      => __( 'Add New item', 'textdomain' ),
		'new_item_name'     => __( 'New item Name', 'textdomain' ),
		'menu_name'         => __( 'item', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'item' ),
	);

	register_taxonomy( 'c_cat', array( 'items' ), $args );
}

add_action( 'init', 'item_taxonomy_post', 0 );