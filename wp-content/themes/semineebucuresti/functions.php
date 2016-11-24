<?php

load_theme_textdomain( 'semineebucuresti', TEMPLATEPATH.'/languages' );                        
add_theme_support ( 'menus' );

/**
 * Add custom post excerpt length
 */ 
function custom_excerpt_length () {
    return 15;
}
add_filter ( 'excerpt_length', 'custom_excerpt_length' );

function register_theme_menus () {
	register_nav_menus (
		array(
			'header-menu'   => __( 'Header Menu' )
		)
	);
}    
add_action ( 'init', 'register_theme_menus' ); 

/*/
 * Hide admin bar when viewing the front-end
 */
add_filter ( 'show_admin_bar', '__return_false' );  

/*
 * Declare Woocommerce support 
 */
add_action( 'after_setup_theme', 'woocommerce_support' );

add_theme_support ( 'menus' );

function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

/*
 * Include  necessary scripts and styles
 */

function theme_styles() {
	
	wp_enqueue_style ( 'bootstrap_css', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style ( 'fontawesome_css', get_template_directory_uri() .'/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_style ( 'main_css', get_template_directory_uri() .'/style.css' );
	
}    
add_action( 'wp_enqueue_scripts', 'theme_styles' );
				
function theme_js () {
	
	global $wp_scripts;
	wp_register_Script ( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
	wp_register_Script ( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false ); 
	
	$wp_scripts -> add_data ( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts -> add_data ( 'respond_js ', 'conditional', 'lt IE 9' );  
	
	wp_enqueue_script ( 'bootstrap_js', get_template_directory_uri() .'/js/bootstrap.min.js', array ('jquery'), '', true ); 
	
}
add_action( 'wp_enqueue_scripts', 'theme_js' );

/*
 * CHANGE DEFAULT WOOCOMMERCE BREADCRUMBS STYLES
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
	return array(
			'delimiter'   => ' &#47; ',
			'wrap_before' => '<div class="col-md-12"><nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
			'wrap_after'  => '</nav></div>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
		);
}

/*
 * REMOVE CATEGORY PAGE ORDERING AND PRODUCT COUNT
 */

remove_action( woocommerce_before_shop_loop, woocommerce_catalog_ordering, 30 );
remove_action( woocommerce_before_shop_loop, woocommerce_result_count, 20 );
remove_action( woocommerce_after_shop_loop_item, woocommerce_template_loop_add_to_cart, 10 );
remove_action( woocommerce_sidebar, woocommerce_get_sidebar, 10 );
remove_action( woocommerce_after_shop_loop, woocommerce_pagination, 10 );

	
function products_start_wrap () { ?>

<div class="col-md-12">

<?php  
}
add_action('woocommerce_before_shop_loop', 'products_start_wrap');

		
function products_end_wrap () { ?>

	</div>

<?php  
}
add_action('woocommerce_after_shop_loop', 'products_end_wrap');

require_once dirname(__FILE__) . '/inc/custom-walker.php';

// Disable product review (tab)
function woo_remove_product_tabs($tabs) {
unset($tabs['reviews']); 					// Remove Reviews tab
	unset($tabs['description']);
	unset($tabs['additional_information']);
return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
	
//Reposition WooCommerce breadcrumb 
function woocommerce_remove_breadcrumb(){
remove_action( 
	'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}
add_action(
	'woocommerce_before_main_content', 'woocommerce_remove_breadcrumb'
);

function woocommerce_custom_breadcrumb() {
	woocommerce_breadcrumb();
}

add_action( 'woo_custom_breadcrumb', 'woocommerce_custom_breadcrumb' );

// remove short description from product page
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

// Display 24 products per page. Goes in functions.php
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 500;' ), 20 );


add_filter( 'loop_shop_columns', 'wc_loop_shop_columns', 1, 10 );
/*
 * Return a new number of maximum columns for shop archives
 * @param int Original value
 * @return int New number of columns
 */
function wc_loop_shop_columns( $number_columns ) {
    return 6;
}

/**
 * Register our sidebars and widgetized areas.
 *
 */
function seminee_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home middle sidebar',
		'id'            => 'home_middle',
		'before_widget' => '<div class="reason">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

        // home left banner
	register_sidebar( array(
		'name'          => 'Home left banner',
		'id'            => 'home_left',
		'before_widget' => '<div class="left-banner">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );        
        // home right banner
	register_sidebar( array(
		'name'          => 'Home right banner',
		'id'            => 'home_right',
		'before_widget' => '<div class="home_right">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );         

}
add_action( 'widgets_init', 'seminee_widgets_init' );