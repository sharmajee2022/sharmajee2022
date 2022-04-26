<?php
/**
 * CCTV Security: Customizer
 *
 * @subpackage CCTV Security
 * @since 1.0
 */

use WPTRT\Customize\Section\CCTV_Security_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( CCTV_Security_Button::class );

	$manager->add_section(
		new CCTV_Security_Button( $manager, 'cctv_security_pro', [
			'title'      => __( 'CCTV Security Pro', 'cctv-security' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'cctv-security' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/cctv-security-wordpress-theme/', 'cctv-security')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'cctv-security-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'cctv-security-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function cctv_security_customize_register( $wp_customize ) {

	$wp_customize->add_setting('cctv_security_logo_margin',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('cctv_security_logo_margin',array(
		'label' => __('Logo Margin','cctv-security'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('cctv_security_logo_top_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'cctv_security_sanitize_float'
	));
	$wp_customize->add_control('cctv_security_logo_top_margin',array(
		'type' => 'number',
		'description' => __('Top','cctv-security'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('cctv_security_logo_bottom_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'cctv_security_sanitize_float'
	));
	$wp_customize->add_control('cctv_security_logo_bottom_margin',array(
		'type' => 'number',
		'description' => __('Bottom','cctv-security'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('cctv_security_logo_left_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'cctv_security_sanitize_float'
	));
	$wp_customize->add_control('cctv_security_logo_left_margin',array(
		'type' => 'number',
		'description' => __('Left','cctv-security'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('cctv_security_logo_right_margin',array(
		'default' => '',
		'sanitize_callback'	=> 'cctv_security_sanitize_float'
 	));
 	$wp_customize->add_control('cctv_security_logo_right_margin',array(
		'type' => 'number',
		'description' => __('Right','cctv-security'),
		'section' => 'title_tagline',
    ));

	$wp_customize->add_setting('cctv_security_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'cctv_security_sanitize_checkbox'
	));
	$wp_customize->add_control('cctv_security_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','cctv-security'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('cctv_security_site_title_fontsize',array(
		'default' => '',
		'sanitize_callback'	=> 'cctv_security_sanitize_float'
	));
	$wp_customize->add_control('cctv_security_site_title_fontsize',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','cctv-security'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('cctv_security_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'cctv_security_sanitize_checkbox'
	));
	$wp_customize->add_control('cctv_security_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','cctv-security'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('cctv_security_site_tagline_fontsize',array(
		'default' => '',
		'sanitize_callback'	=> 'cctv_security_sanitize_float'
	));
	$wp_customize->add_control('cctv_security_site_tagline_fontsize',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','cctv-security'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'cctv_security_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'cctv-security' ),
		'description' => __( 'Description of what this panel does.', 'cctv-security' ),
	) );

	$wp_customize->add_section( 'cctv_security_theme_options_section', array(
    	'title'      => __( 'General Settings', 'cctv-security' ),
		'priority'   => 30,
		'panel' => 'cctv_security_panel_id'
	) );

	$wp_customize->add_setting('cctv_security_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'cctv_security_sanitize_choices'
	));
	$wp_customize->add_control('cctv_security_theme_options',array(
		'type' => 'select',
		'label' => __('Blog Page Sidebar Layout','cctv-security'),
		'section' => 'cctv_security_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','cctv-security'),
		   'Right Sidebar' => __('Right Sidebar','cctv-security'),
		   'One Column' => __('One Column','cctv-security'),
            'Three Columns' => __('Three Columns','cctv-security'),
            'Four Columns' => __('Four Columns','cctv-security'),
		   'Grid Layout' => __('Grid Layout','cctv-security')
		),
	));

	$wp_customize->add_setting('cctv_security_single_post_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'cctv_security_sanitize_choices'
	));
	$wp_customize->add_control('cctv_security_single_post_sidebar',array(
        'type' => 'select',
        'label' => __('Single Post Sidebar Layout','cctv-security'),
        'section' => 'cctv_security_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cctv-security'),
            'Right Sidebar' => __('Right Sidebar','cctv-security'),
            'One Column' => __('One Column','cctv-security')
        ),
	));

	$wp_customize->add_setting('cctv_security_page_sidebar',array(
		'default' => 'One Column',
		'sanitize_callback' => 'cctv_security_sanitize_choices'
	));
	$wp_customize->add_control('cctv_security_page_sidebar',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','cctv-security'),
        'section' => 'cctv_security_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cctv-security'),
            'Right Sidebar' => __('Right Sidebar','cctv-security'),
            'One Column' => __('One Column','cctv-security')
        ),
	));

	$wp_customize->add_setting('cctv_security_archive_page_sidebar',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'cctv_security_sanitize_choices'
	));
	$wp_customize->add_control('cctv_security_archive_page_sidebar',array(
        'type' => 'select',
        'label' => __('Archive & Search Page Sidebar Layout','cctv-security'),
        'section' => 'cctv_security_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','cctv-security'),
            'Right Sidebar' => __('Right Sidebar','cctv-security'),
            'One Column' => __('One Column','cctv-security'),
            'Three Columns' => __('Three Columns','cctv-security'),
            'Four Columns' => __('Four Columns','cctv-security'),
            'Grid Layout' => __('Grid Layout','cctv-security')
        ),
	));

	//Header
	$wp_customize->add_section( 'cctv_security_header_section' , array(
    	'title'    => __( 'Header', 'cctv-security' ),
		'priority' => null,
		'panel' => 'cctv_security_panel_id'
	) );

	$wp_customize->add_setting('cctv_security_topbar_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cctv_security_topbar_text',array(
	   	'type' => 'text',
	   	'label' => __('Topbar Text','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	$wp_customize->add_setting('cctv_security_login_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cctv_security_login_text',array(
	   	'type' => 'text',
	   	'label' => __('Login Text','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	$wp_customize->add_setting('cctv_security_login_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('cctv_security_login_url',array(
	   	'type' => 'url',
	   	'label' => __('Login URL','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	$wp_customize->add_setting('cctv_security_facebook_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('cctv_security_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	$wp_customize->add_setting('cctv_security_twitter_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('cctv_security_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	$wp_customize->add_setting('cctv_security_youtube_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('cctv_security_youtube_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Youtube URL','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	$wp_customize->add_setting('cctv_security_instagram_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('cctv_security_instagram_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Instagram URL','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	$wp_customize->add_setting('cctv_security_request_btn_text',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cctv_security_request_btn_text',array(
	   	'type' => 'text',
	   	'label' => __('Request Button Text','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	$wp_customize->add_setting('cctv_security_request_btn_url',array(
    	'default' => '',
    	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('cctv_security_request_btn_url',array(
	   	'type' => 'url',
	   	'label' => __('Request Button URL','cctv-security'),
	   	'section' => 'cctv_security_header_section',
	));

	//home page slider
	$wp_customize->add_section( 'cctv_security_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'cctv-security' ),
		'priority' => null,
		'panel' => 'cctv_security_panel_id'
	) );

	$wp_customize->add_setting('cctv_security_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'cctv_security_sanitize_checkbox'
	));
	$wp_customize->add_control('cctv_security_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','cctv-security'),
	   	'section' => 'cctv_security_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'cctv_security_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'cctv_security_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'cctv_security_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'cctv-security' ),
			'section' => 'cctv_security_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	//Features Section
	$wp_customize->add_section('cctv_security_features_section',array(
		'title'	=> __('Our Features','cctv-security'),
		'description'=> __('This section will appear below the slider.','cctv-security'),
		'panel' => 'cctv_security_panel_id',
	));

	$wp_customize->add_setting('cctv_security_feature_small_title',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cctv_security_feature_small_title',array(
	   	'type' => 'text',
	   	'label' => __('Small Title','cctv-security'),
	   	'section' => 'cctv_security_features_section',
	));

	$wp_customize->add_setting('cctv_security_feature_section_title',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cctv_security_feature_section_title',array(
	   	'type' => 'text',
	   	'label' => __('Section Heading','cctv-security'),
	   	'section' => 'cctv_security_features_section',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('cctv_security_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'cctv_security_sanitize_choices',
	));
	$wp_customize->add_control('cctv_security_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','cctv-security'),
		'section' => 'cctv_security_features_section',
	));

	//Footer
    $wp_customize->add_section( 'cctv_security_footer', array(
    	'title'  => __( 'Footer Text', 'cctv-security' ),
		'priority' => null,
		'panel' => 'cctv_security_panel_id'
	) );

	$wp_customize->add_setting('cctv_security_show_back_totop',array(
       'default' => true,
       'sanitize_callback'	=> 'cctv_security_sanitize_checkbox'
    ));
    $wp_customize->add_control('cctv_security_show_back_totop',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Back to Top','cctv-security'),
       'section' => 'cctv_security_footer'
    ));

    $wp_customize->add_setting('cctv_security_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('cctv_security_footer_copy',array(
		'label'	=> __('Footer Text','cctv-security'),
		'section' => 'cctv_security_footer',
		'setting' => 'cctv_security_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'cctv_security_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'cctv_security_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'cctv_security_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'cctv_security_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'cctv-security' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'cctv-security' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'cctv_security_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'cctv_security_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'cctv_security_customize_register' );

function cctv_security_customize_partial_blogname() {
	bloginfo( 'name' );
}

function cctv_security_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function cctv_security_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function cctv_security_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}