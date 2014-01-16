<?php
/**
 * Dokan customizer
 *
 * @author WeDevs
 */
class Dokan_Customizer {

    function __construct() {
        add_action( 'customize_register', array($this, 'register_control') );
        add_action( 'wp_head', array($this, 'generate_styles'), 99 );
        add_action( 'customize_preview_init', array($this, 'customizer_scripts' ) );
    }

    function register_control( $wp_customize ) {

        // logo
        $wp_customize->add_section( 'dokan_log_section', array(
            'title' => __( 'Theme Logo', 'dokan' ),
            'priority' => 9,
            'description' => __( 'Upload your logo to replace the default Logo (dimension : 180 X 50)' ),
        ) );

        $wp_customize->add_setting( 'dokan_logo', array(
            'default' => get_stylesheet_directory_uri() . '/assets/images/logo.png',
            'type' => 'option',
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dokan_logo', array(
            'label' => __( 'Upload Logo', 'dokan' ),
            'section' => 'dokan_log_section',
            'settings' => 'dokan_logo',
        ) ) );

        // link color
        $wp_customize->add_setting( 'dokan_link_color', array(
            'default' => '#428BCA',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_link_color', array(
            'label' => __( 'Link Color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_link_color',
            'priority' => 20
        ) ) );


        // link hover color
        $wp_customize->add_setting( 'dokan_link_hover_color', array(
            'default' => '#2A6496',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_link_hover_color', array(
            'label' => __( 'Link hover Color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_link_hover_color',
            'priority' => 25
        ) ) );

        // Header Background color
        $wp_customize->add_setting( 'dokan_header_bg', array(
            'default' => '#fff',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_header_bg', array(
            'label' => __( 'Header Background color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_header_bg',
            'priority' => 30
        ) ) );

        // nav backgroung color
        $wp_customize->add_setting( 'dokan_nav_bg', array(
            'default' => '#fff',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_nav_bg', array(
            'label' => __( 'Navigation Background Color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_nav_bg',
            'priority' => 33
        ) ) );

        // nav color
        $wp_customize->add_setting( 'dokan_nav_color', array(
            'default' => '#777777',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_nav_color', array(
            'label' => __( 'Navigation Color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_nav_color',
            'priority' => 35
        ) ) );

        // nav hover color
        $wp_customize->add_setting( 'dokan_nav_hover', array(
            'default' => '#333',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_nav_hover', array(
            'label' => __( 'Navigation hover Color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_nav_hover',
            'priority' => 40
        ) ) );

        // Footer Background color
        $wp_customize->add_setting( 'dokan_footer_bg', array(
            'default' => '#393939',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_footer_bg', array(
            'label' => __( 'Footer Background color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_footer_bg',
            'priority' => 50
        ) ) );

        // Footer bottom bar Background color
        $wp_customize->add_setting( 'footer_bottom_bar_bg_color', array(
            'default' => '#242424',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bottom_bar_bg_color', array(
            'label' => __( 'Copy Container Background color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'footer_bottom_bar_bg_color',
            'priority' => 50
        ) ) );

        // footer text color
        $wp_customize->add_setting( 'dokan_footer_text', array(
            'default' => '#E8E8E8',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_footer_text', array(
            'label' => __( 'Footer text color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_footer_text',
            'priority' => 55
        ) ) );

        // widget header color
        $wp_customize->add_setting( 'footer_widget_header', array(
            'default' => '#E8E8E8',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_header', array(
            'label' => __( 'Footer widget header color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'footer_widget_header',
            'priority' => 60
        ) ) );


        // widget text color
        $wp_customize->add_setting( 'dokan_footer_widget_link', array(
            'default' => '#AFAFAF',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_footer_widget_link', array(
            'label' => __( 'Widget link color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_footer_widget_link',
            'priority' => 65
        ) ) );


        // widget text hover color
        $wp_customize->add_setting( 'dokan_footer_link_hover', array(
            'default' => '#E8E8E8',
            'transport' => 'postMessage',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dokan_footer_link_hover', array(
            'label' => __( 'Widget link hover color', 'dokan' ),
            'section' => 'colors',
            'settings' => 'dokan_footer_link_hover',
            'priority' => 70
        ) ) );
    }

    function generate_styles() {
        ?>
        <style type="text/css">

            <?php if ( $logo = get_theme_mod( 'dokan_logo' ) ) : ?>
                .site-header h1.site-title a { background: url("<?php echo esc_url( $logo ); ?>") no-repeat scroll 0 0 rgba(0, 0, 0, 0);}
            <?php endif; ?>

            a,.site-footer .footer-copy a { color: <?php echo get_theme_mod( 'dokan_link_color' ); ?>; }
            a:hover,.site-footer .footer-copy a:hover { color: <?php echo get_theme_mod( 'dokan_link_hover_color' ); ?>; }
            .site-header { background-color: <?php echo get_theme_mod( 'dokan_header_bg' ); ?> ; }
            .navbar-default{ background-color: <?php echo get_theme_mod( 'dokan_nav_bg' ); ?>; }
            .navbar-default .navbar-nav > li > a{ color: <?php echo get_theme_mod( 'dokan_nav_color' ); ?>; }
            .navbar-default .navbar-nav > li > a:hover { color: <?php echo get_theme_mod( 'dokan_nav_hover' ); ?>; }
            .site-footer .widget h3{ color: <?php echo get_theme_mod( 'footer_widget_header' ); ?>; }
            .site-footer .widget ul li a{ color: <?php echo get_theme_mod( 'dokan_footer_widget_link' ); ?>; }
            .site-footer .widget ul li a:hover{ color: <?php echo get_theme_mod( 'dokan_footer_link_hover' ); ?>; }
            .site-footer { color: <?php echo get_theme_mod( 'dokan_footer_text' ); ?>; }
            .site-footer .footer-widget-area { background: <?php echo get_theme_mod( 'dokan_footer_bg' ); ?> ; }
            .site-footer .copy-container { background: <?php echo get_theme_mod( 'footer_bottom_bar_bg_color' ); ?> ; }
        </style>
        <?php
    }

    function customizer_scripts() {
        $url = get_template_directory_uri() . '/assets/js/theme-customizer.js';
        wp_enqueue_script( 'dokan-theme-customizer', $url, array('jquery', 'customize-preview') );
    }

}

new Dokan_Customizer();