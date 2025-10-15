<?php

/**
 * Catalyst Digital Theme Functions
 *
 * @package Catalyst_Digital
 */

// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function catalyst_digital_setup()
{
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'catalyst-digital'),
        'footer'  => __('Footer Menu', 'catalyst-digital'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
}
add_action('after_setup_theme', 'catalyst_digital_setup');

/**
 * Set the content width in pixels
 */
function catalyst_digital_content_width()
{
    global $content_width;
    $content_width = apply_filters('catalyst_digital_content_width', 1200);
}
add_action('after_setup_theme', 'catalyst_digital_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function catalyst_digital_scripts()
{
    // Enqueue Google Fonts
    wp_enqueue_style('catalyst-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', array(), null);

    // Enqueue theme stylesheet
    wp_enqueue_style('catalyst-digital-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue theme JavaScript
    wp_enqueue_script('catalyst-digital-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'catalyst_digital_scripts');

/**
 * Register widget areas
 */
function catalyst_digital_widgets_init()
{
    // Footer Widget Area 1
    register_sidebar(array(
        'name'          => __('Footer 1', 'catalyst-digital'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'catalyst-digital'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Footer Widget Area 2
    register_sidebar(array(
        'name'          => __('Footer 2', 'catalyst-digital'),
        'id'            => 'footer-2',
        'description'   => __('Add widgets here to appear in your footer.', 'catalyst-digital'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // Footer Widget Area 3
    register_sidebar(array(
        'name'          => __('Footer 3', 'catalyst-digital'),
        'id'            => 'footer-3',
        'description'   => __('Add widgets here to appear in your footer.', 'catalyst-digital'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'catalyst_digital_widgets_init');

/**
 * Custom template tags for this theme
 */

/**
 * Display navigation to next/previous post
 */
function catalyst_digital_post_navigation()
{
    the_post_navigation(array(
        'prev_text' => '<span class="nav-subtitle">' . __('Previous:', 'catalyst-digital') . '</span> <span class="nav-title">%title</span>',
        'next_text' => '<span class="nav-subtitle">' . __('Next:', 'catalyst-digital') . '</span> <span class="nav-title">%title</span>',
    ));
}

/**
 * Add custom body classes
 */
function catalyst_digital_body_classes($classes)
{
    // Add a class of hfeed to non-singular pages
    if (! is_singular()) {
        $classes[] = 'hfeed';
    }

    // Add a class for the page template
    if (is_page_template()) {
        $classes[] = 'page-template-' . basename(get_page_template_slug(), '.php');
    }

    return $classes;
}
add_filter('body_class', 'catalyst_digital_body_classes');

/**
 * Add a pingback url auto-discovery header
 */
function catalyst_digital_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'catalyst_digital_pingback_header');

/**
 * Custom excerpt length
 */
function catalyst_digital_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'catalyst_digital_excerpt_length', 999);

/**
 * Custom excerpt more text
 */
function catalyst_digital_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'catalyst_digital_excerpt_more');

/**
 * Add custom logo support
 */
function catalyst_digital_custom_logo()
{
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    } else {
        echo '<a href="' . esc_url(home_url('/')) . '" class="site-logo">' . esc_html(get_bloginfo('name')) . '</a>';
    }
}
