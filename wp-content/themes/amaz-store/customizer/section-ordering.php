<?php
/*********************/
// Move To Top
/********************/
 $wp_customize->add_setting( 'amaz_store_move_to_top', array(
    'default'           => false,
    'sanitize_callback' => 'amaz_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new amaz_store_Toggle_Control( $wp_customize, 'amaz_store_move_to_top', array(
    'label'       => esc_html__( 'Enable', 'amaz-store' ),
    'section'     => 'amaz-store-move-to-top',
    'type'        => 'toggle',
    'settings'    => 'amaz_store_move_to_top',
  ) ) );

  // BG color
 $wp_customize->add_setting('amaz_store_move_to_top_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new amaz_store_Customizer_Color_Control($wp_customize,'amaz_store_move_to_top_bg_clr', array(
        'label'      => __('Background Color', 'amaz-store' ),
        'section'    => 'amaz-store-move-to-top',
        'settings'   => 'amaz_store_move_to_top_bg_clr',
    ) ) 
 );  

$wp_customize->add_setting('amaz_store_move_to_top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'amaz_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'amaz_store_move_to_top_icon_clr', array(
        'label'      => __('Icon Color', 'amaz-store' ),
        'section'    => 'amaz-store-move-to-top',
        'settings'   => 'amaz_store_move_to_top_icon_clr',
    ) ) 
 );

/****************/
//doc link
/****************/
$wp_customize->add_setting('amaz_store_movetotop_learn_more', array(
    'sanitize_callback' => 'amaz_store_sanitize_text',
    ));
$wp_customize->add_control(new amaz_store_Misc_Control( $wp_customize, 'amaz_store_movetotop_learn_more',
            array(
        'section'    => 'amaz-store-move-to-top',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/amaz-store/#back-top',
        'description' => esc_html__( 'To know more go with this', 'amaz-store' ),
        'priority'   =>100,
    )));
