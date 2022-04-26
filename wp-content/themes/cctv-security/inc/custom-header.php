<?php
/**
 * Custom header implementation
 */

function cctv_security_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cctv_security_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1200,
		'height'             => 85,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'cctv_security_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'cctv_security_custom_header_setup' );

if ( ! function_exists( 'cctv_security_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see cctv_security_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'cctv_security_header_style' );
function cctv_security_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .menu-section {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'cctv-security-basic-style', $custom_css );
	endif;
}
endif; // cctv_security_header_style