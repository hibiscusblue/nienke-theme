<?php

/**
 * Nienke van Zatrate
 * Theme setup and assets.
 */

function nienke_enqueue_assets() {

    /* ========================================
       BASE
       ======================================== */

    $base_css_path = get_theme_file_path('/assets/css/base/base.css');

    wp_enqueue_style(
        'nienke-base',
        get_theme_file_uri('/assets/css/base/base.css'),
        array(),
        file_exists($base_css_path) ? filemtime($base_css_path) : '1.0.0'
    );


    /* ========================================
       COMPONENTS — CSS
       ======================================== */


    // Header
    $header_css_path = get_theme_file_path('/assets/css/components/header.css');

    wp_enqueue_style(
        'nienke-header',
        get_theme_file_uri('/assets/css/components/header.css'),
        array('nienke-base'),
        file_exists($header_css_path) ? filemtime($header_css_path) : '1.0.0'
    );


    // Intro
    $intro_css_path = get_theme_file_path('/assets/css/components/intro.css');

    wp_enqueue_style(
        'nienke-intro',
        get_theme_file_uri('/assets/css/components/intro.css'),
        array('nienke-base'),
        file_exists($intro_css_path) ? filemtime($intro_css_path) : '1.0.0'
    );


    // Footer
    $footer_css_path = get_theme_file_path('/assets/css/components/footer.css');

    wp_enqueue_style(
        'nienke-footer',
        get_theme_file_uri('/assets/css/components/footer.css'),
        array('nienke-base'),
        file_exists($footer_css_path) ? filemtime($footer_css_path) : '1.0.0'
    );


    // Collage
    $collage_css_path = get_theme_file_path('/assets/css/components/collage.css');

    wp_enqueue_style(
        'nienke-collage',
        get_theme_file_uri('/assets/css/components/collage.css'),
        array('nienke-base'),
        file_exists($collage_css_path) ? filemtime($collage_css_path) : '1.0.0'
    );


    // Recipe
    $recipe_css_path = get_theme_file_path('/assets/css/components/recipe.css');

    wp_enqueue_style(
        'nienke-recipe',
        get_theme_file_uri('/assets/css/components/recipe.css'),
        array('nienke-base'),
        file_exists($recipe_css_path) ? filemtime($recipe_css_path) : '1.0.0'
    );


    /* ========================================
       PAGES — CSS
       ======================================== */


    // Homepage
    $home_css_path = get_theme_file_path('/assets/css/pages/home.css');

    wp_enqueue_style(
        'nienke-home',
        get_theme_file_uri('/assets/css/pages/home.css'),
        array('nienke-base'),
        file_exists($home_css_path) ? filemtime($home_css_path) : '1.0.0'
    );


    // Cuisine
    $cuisine_css_path = get_theme_file_path('/assets/css/pages/cuisine.css');

    wp_enqueue_style(
        'nienke-cuisine',
        get_theme_file_uri('/assets/css/pages/cuisine.css'),
        array('nienke-base'),
        file_exists($cuisine_css_path) ? filemtime($cuisine_css_path) : '1.0.0'
    );

    // Recipe index — Savoury & Sweet
$recipe_index_css_path = get_theme_file_path('/assets/css/pages/recipe-index.css');

wp_enqueue_style(
    'nienke-recipe-index',
    get_theme_file_uri('/assets/css/pages/recipe-index.css'),
    array('nienke-base'),
    file_exists($recipe_index_css_path) ? filemtime($recipe_index_css_path) : '1.0.0'
);


// One-screen recipe
$recipe_sheet_css_path = get_theme_file_path('/assets/css/pages/recipe-sheet.css');

wp_enqueue_style(
    'nienke-recipe-sheet',
    get_theme_file_uri('/assets/css/pages/recipe-sheet.css'),
    array('nienke-base'),
    file_exists($recipe_sheet_css_path) ? filemtime($recipe_sheet_css_path) : '1.0.0'
);

    /* ========================================
       JAVASCRIPT
       ======================================== */


    // Header menu
    $header_js_path = get_theme_file_path('/assets/js/header.js');

    wp_enqueue_script(
        'nienke-header-js',
        get_theme_file_uri('/assets/js/header.js'),
        array(),
        file_exists($header_js_path) ? filemtime($header_js_path) : '1.0.0',
        true
    );


    // Typewriter intro
    $intro_js_path = get_theme_file_path('/assets/js/intro.js');

    wp_enqueue_script(
        'nienke-intro-js',
        get_theme_file_uri('/assets/js/intro.js'),
        array(),
        file_exists($intro_js_path) ? filemtime($intro_js_path) : '1.0.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'nienke_enqueue_assets');


/* ========================================
   NIENKE — FAVICON
   ======================================== */

function nienke_favicon() {

    $favicon_path = get_theme_file_path('/assets/images/favicon.png');
    $favicon_url  = get_theme_file_uri('/assets/images/favicon.png');

    $version = file_exists($favicon_path)
        ? filemtime($favicon_path)
        : '1.0.0';

    $favicon = $favicon_url . '?v=' . $version;

    echo '<link rel="icon" type="image/png" href="' . esc_url($favicon) . '">';
    echo '<link rel="apple-touch-icon" href="' . esc_url($favicon) . '">';
}

add_action('wp_head', 'nienke_favicon');
add_action('admin_head', 'nienke_favicon');