<?php

/**
 * Nienke van Zatrate
 * Theme setup and assets.
 */

function nienke_enqueue_styles() {

    // Base
    wp_enqueue_style(
        'nienke-base',
        get_theme_file_uri('/assets/css/base/base.css'),
        array(),
        '1.0.0'
    );

    // Components
    wp_enqueue_style(
        'nienke-header',
        get_theme_file_uri('/assets/css/components/header.css'),
        array('nienke-base'),
        '1.0.0'
    );

    wp_enqueue_style(
        'nienke-footer',
        get_theme_file_uri('/assets/css/components/footer.css'),
        array('nienke-base'),
        '1.0.0'
    );

    wp_enqueue_style(
        'nienke-collage',
        get_theme_file_uri('/assets/css/components/collage.css'),
        array('nienke-base'),
        '1.0.0'
    );

    wp_enqueue_style(
        'nienke-recipe',
        get_theme_file_uri('/assets/css/components/recipe.css'),
        array('nienke-base'),
        '1.0.0'
    );

    // Homepage
$home_css_path = get_theme_file_path('/assets/css/pages/home.css');

wp_enqueue_style(
    'nienke-home',
    get_theme_file_uri('/assets/css/pages/home.css'),
    array('nienke-base'),
    file_exists($home_css_path) ? filemtime($home_css_path) : '1.0.0'
);
}

add_action('wp_enqueue_scripts', 'nienke_enqueue_styles');