<?php

require_once ( 'classes/ALegacyGenetics/Controller.php' );
require_once ( 'classes/ALegacyGenetics/MenuItem.php' );
require_once ( 'classes/ALegacyGenetics/Cow.php' );
require_once ( 'classes/ALegacyGenetics/HoverCow.php' );
require_once ( 'classes/ALegacyGenetics/HomepageBox.php' );

$alg_controller = new \ALegacyGenetics\Controller;

add_action( 'init', array( $alg_controller, 'form_capture' ) );
add_action( 'init', array( $alg_controller, 'create_post_types' ) );
add_action( 'after_setup_theme', array( $alg_controller, 'theme_setup' ) );
add_action( 'wp_enqueue_scripts', array( $alg_controller, 'enqueue_styles_and_scripts' ) );
add_action( 'admin_init', array( $alg_controller, 'editor_styles' ) );
add_action( 'widgets_init', array( $alg_controller, 'widgets_init' ) );
add_action( 'customize_register', array( $alg_controller, 'customizer' ) );
add_action( 'pre_post_update', array( $alg_controller, 'save_custom_page_meta' ) );
add_shortcode( 'a_legacy_genetics', array( $alg_controller, 'short_code' ) );
add_action( 'login_head', array( $alg_controller, 'add_favicon' ) );
add_action( 'admin_head', array( $alg_controller, 'add_favicon' ) );

if ( is_admin() )
{
	add_action( 'admin_enqueue_scripts',  array( $alg_controller, 'enqueue_admin_styles_and_scripts' ) );
	add_action( 'admin_init', array( $alg_controller, 'register_settings' ) );
	add_action( 'add_meta_boxes', array( $alg_controller, 'page_layout_box' ) );
	add_action( 'admin_menu', array( $alg_controller, 'admin_menus') );
}