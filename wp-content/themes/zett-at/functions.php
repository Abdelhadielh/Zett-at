<?php
/**
 * Zett-at Theme Functions
 *
 * @package Zett-at
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function zett_at_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Add custom image sizes
    add_image_size('zett-at-hero', 1920, 1080, true);
    add_image_size('zett-at-feature', 600, 400, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'zett-at'),
        'footer'  => __('Footer Menu', 'zett-at'),
    ));

    // Switch default core markup for search form, comment form, and comments
    // to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Set up the WordPress core custom background feature
    add_theme_support('custom-background', array(
        'default-color' => 'F5F5F0',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add custom editor color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => __('Bleu de Fès', 'zett-at'),
            'slug'  => 'bleu-de-fes',
            'color' => '#003399',
        ),
        array(
            'name'  => __('Or Artisanal', 'zett-at'),
            'slug'  => 'or-artisanal',
            'color' => '#D4AF37',
        ),
        array(
            'name'  => __('Terre d\'Ocre', 'zett-at'),
            'slug'  => 'terre-d-ocre',
            'color' => '#C35B2D',
        ),
        array(
            'name'  => __('Fond Blanc Cassé', 'zett-at'),
            'slug'  => 'fond-blanc-casse',
            'color' => '#F5F5F0',
        ),
    ));
}
add_action('after_setup_theme', 'zett_at_setup');

/**
 * Enqueue scripts and styles
 */
function zett_at_scripts() {
    // Enqueue Google Fonts - Tinos and Arimo
    wp_enqueue_style(
        'zett-at-google-fonts',
        'https://fonts.googleapis.com/css2?family=Tinos:wght@400;700&family=Arimo:wght@400;600;700&display=swap',
        array(),
        null
    );

    // Enqueue main stylesheet
    wp_enqueue_style(
        'zett-at-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // Enqueue JavaScript
    wp_enqueue_script(
        'zett-at-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script for AJAX calls if needed
    wp_localize_script('zett-at-navigation', 'zettAtAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'zett_at_scripts');

/**
 * Register widget areas
 */
function zett_at_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'zett-at'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'zett-at'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer', 'zett-at'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'zett-at'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'zett_at_widgets_init');

/**
 * Custom excerpt length
 */
function zett_at_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'zett_at_excerpt_length');

/**
 * Custom excerpt more
 */
function zett_at_excerpt_more($more) {
    return '&hellip;';
}
add_filter('excerpt_more', 'zett_at_excerpt_more');

/**
 * Add custom body classes
 */
function zett_at_body_classes($classes) {
    // Add a class if no sidebar
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Add a class for singular pages
    if (is_singular()) {
        $classes[] = 'singular';
    }

    return $classes;
}
add_filter('body_class', 'zett_at_body_classes');

/**
 * Customizer additions
 */
function zett_at_customize_register($wp_customize) {
    // Add customizer sections, settings, and controls here
    // This is a basic implementation - extend as needed
}
add_action('customize_register', 'zett_at_customize_register');

/**
 * SVG Icon Helper Function
 */
function zett_at_get_svg($icon_name) {
    $icons = array(
        'instagram' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>',
        'youtube'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
        'facebook'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
        'twitter'   => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>',
    );

    return isset($icons[$icon_name]) ? $icons[$icon_name] : '';
}
