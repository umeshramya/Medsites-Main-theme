<?php
/*
 * Medsites functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Medsites
*/ 



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 function medsites_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'medsites' ),
		'id'            => 'right_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'medsites' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'medsites_widgets_init' );
