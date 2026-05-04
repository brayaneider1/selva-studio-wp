<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'astra-theme-css' ), '1.0.0' );
    
    wp_enqueue_script( 'selva-global', get_stylesheet_directory_uri() . '/assets/js/global.js', array(), '1.0.0', true );

    if ( is_front_page() || is_page_template( 'page-home.php' ) ) {
        wp_enqueue_style( 'selva-home', get_stylesheet_directory_uri() . '/assets/css/pages/home.css', array( 'child-style' ), '1.0.0' );
        wp_enqueue_script( 'selva-home', get_stylesheet_directory_uri() . '/assets/js/pages/home.js', array(), '1.0.0', true );
    }

    if ( is_page_template( 'page-about.php' ) ) {
        wp_enqueue_style( 'selva-about', get_stylesheet_directory_uri() . '/assets/css/pages/about.css', array( 'child-style' ), '1.0.0' );
    }

    if ( is_home() || is_archive() ) {
        wp_enqueue_style( 'selva-blog', get_stylesheet_directory_uri() . '/assets/css/pages/blog.css', array( 'child-style' ), '1.0.0' );
    }

    if ( is_single() ) {
        wp_enqueue_style( 'selva-single', get_stylesheet_directory_uri() . '/assets/css/pages/single.css', array( 'child-style' ), '1.0.0' );
    }

    wp_enqueue_style( 'selva-mega-menu', get_stylesheet_directory_uri() . '/assets/css/components/mega-menu.css', array( 'child-style' ), '1.0.0' );
    wp_enqueue_script( 'selva-mega-menu', get_stylesheet_directory_uri() . '/assets/js/components/mega-menu.js', array(), '1.0.0', true );

    if ( is_front_page() || is_home() || is_single() || is_page_template( 'page-about.php' ) ) {
        wp_dequeue_style( 'astra-theme-css' );
        wp_dequeue_style( 'astra-google-fonts' );
        wp_dequeue_script( 'astra-theme-js' );
    }
}, 20 );

add_action( 'selva_header_trigger', function() {
    echo '<button id="selva-menu-toggle" class="selva-menu-trigger" aria-label="Abrir Menú">
            <span class="menu-text">Menú</span>
            <span class="menu-icon">
                <span class="line line-1"></span>
                <span class="line line-2"></span>
            </span>
          </button>';
});
