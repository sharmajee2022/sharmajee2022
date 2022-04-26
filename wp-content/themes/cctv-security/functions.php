<?php
/**
 * CCTV Security functions and definitions
 *
 * @subpackage CCTV Security
 * @since 1.0
 */

include get_theme_file_path( 'vendor/wptrt/autoload/src/CCTV_Security_Loader.php' );

$cctv_security_loader = new \WPTRT\Autoload\CCTV_Security_Loader();

$cctv_security_loader->cctv_security_add( 'WPTRT\\Customize\\Section', get_theme_file_path( 'vendor/wptrt/customize-section-button/src' ) );

$cctv_security_loader->cctv_security_register();

function cctv_security_setup() {
	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-background', $defaults = array(
	    'default-color'          => '',
	    'default-image'          => '',
	    'default-repeat'         => '',
	    'default-position-x'     => '',
	    'default-attachment'     => '',
	    'wp-head-callback'       => '_custom_background_cb',
	    'admin-head-callback'    => '',
	    'admin-preview-callback' => ''
	));

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cctv-security' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', cctv_security_fonts_url() ) );

}
add_action( 'after_setup_theme', 'cctv_security_setup' );

function cctv_security_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'cctv-security' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'cctv-security' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'cctv-security' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'cctv-security' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'cctv-security' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'cctv-security' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'cctv-security' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cctv-security' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'cctv-security' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cctv-security' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'cctv-security' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cctv-security' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'cctv-security' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'cctv-security' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cctv_security_widgets_init' );

function cctv_security_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family' => rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//Enqueue scripts and styles.
function cctv_security_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'cctv-security-fonts', cctv_security_fonts_url(), array(), null );
	
	//Bootstarp 
	wp_enqueue_style( 'bootstrap-css', esc_url( get_template_directory_uri() ).'/assets/css/bootstrap.css' );
	
	// Theme stylesheet.
	wp_enqueue_style( 'cctv-security-basic-style', get_stylesheet_uri() );
	wp_style_add_data( 'cctv-security-style', 'rtl', 'replace' );

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'cctv-security-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'cctv-security-style' ), '1.0' );
		wp_style_add_data( 'cctv-security-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'cctv-security-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'cctv-security-style' ), '1.0' );
	wp_style_add_data( 'cctv-security-ie8', 'conditional', 'lt IE 9' );

	//font-awesome
	wp_enqueue_style( 'font-awesome-css', esc_url( get_template_directory_uri() ).'/assets/css/fontawesome-all.css' );

	$custom_css = '';

	$cctv_security_logo_top_margin = get_theme_mod('cctv_security_logo_top_margin');
	$cctv_security_logo_bottom_margin = get_theme_mod('cctv_security_logo_bottom_margin');
	$cctv_security_logo_left_margin = get_theme_mod('cctv_security_logo_left_margin');
	$cctv_security_logo_right_margin = get_theme_mod('cctv_security_logo_right_margin');

	$cctv_security_site_title_fontsize = get_theme_mod('cctv_security_site_title_fontsize');

	$cctv_security_site_tagline_fontsize = get_theme_mod('cctv_security_site_tagline_fontsize');

	$custom_css = '
		.logo {
			margin-top: '.esc_attr($cctv_security_logo_top_margin).'px;
			margin-bottom: '.esc_attr($cctv_security_logo_bottom_margin).'px;
			margin-left: '.esc_attr($cctv_security_logo_left_margin).'px;
			margin-right: '.esc_attr($cctv_security_logo_right_margin).'px;
		}
		.logo h1.site-title, .logo p.site-title {
			font-size: '.esc_attr($cctv_security_site_title_fontsize).'px;
		}
		.logo p.site-description {
			font-size: '.esc_attr($cctv_security_site_tagline_fontsize).'px;
		}
	';
	wp_add_inline_style( 'cctv-security-basic-style',$custom_css );

	wp_enqueue_script( 'cctv-security-navigation-jquery', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '2.1.2', true );
	wp_enqueue_script( 'bootstrap-js', esc_url( get_template_directory_uri() ). '/assets/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', esc_url( get_template_directory_uri() ). '/assets/js/jquery.superfish.js', array('jquery') ,'',true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cctv_security_scripts' );

function cctv_security_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'cctv_security_front_page_template' );

define('CCTV_SECURITY_CREDIT',__('https://www.luzuk.com/themes/free-cctv-security-wordpress-theme/','cctv-security'));

if ( ! function_exists( 'cctv_security_credit' ) ) {
	function cctv_security_credit(){
		echo "<a href=".esc_url(CCTV_SECURITY_CREDIT)." target='_blank'>".esc_html__('CCTV Security WordPress Theme','cctv-security')."</a>";
	}
}

function cctv_security_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function cctv_security_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function cctv_security_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function cctv_security_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/* Excerpt Limit Begin */
function cctv_security_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'cctv_security_loop_columns');
if (!function_exists('cctv_security_loop_columns')) {
	function cctv_security_loop_columns() {
		return 3; // 3 products per row
	}
}

require get_parent_theme_file_path( '/inc/custom-header.php' );

require get_parent_theme_file_path( '/inc/template-tags.php' );

require get_parent_theme_file_path( '/inc/template-functions.php' );

require get_parent_theme_file_path( '/inc/customizer.php' );