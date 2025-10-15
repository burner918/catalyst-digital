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

/**
 * Register Custom Post Types
 */

/**
 * Register Projects Custom Post Type
 */
function catalyst_digital_register_projects_cpt()
{
    $labels = array(
        'name'                  => _x('Projects', 'Post Type General Name', 'catalyst-digital'),
        'singular_name'         => _x('Project', 'Post Type Singular Name', 'catalyst-digital'),
        'menu_name'             => __('Projects', 'catalyst-digital'),
        'name_admin_bar'        => __('Project', 'catalyst-digital'),
        'archives'              => __('Project Archives', 'catalyst-digital'),
        'attributes'            => __('Project Attributes', 'catalyst-digital'),
        'parent_item_colon'     => __('Parent Project:', 'catalyst-digital'),
        'all_items'             => __('All Projects', 'catalyst-digital'),
        'add_new_item'          => __('Add New Project', 'catalyst-digital'),
        'add_new'               => __('Add New', 'catalyst-digital'),
        'new_item'              => __('New Project', 'catalyst-digital'),
        'edit_item'             => __('Edit Project', 'catalyst-digital'),
        'update_item'           => __('Update Project', 'catalyst-digital'),
        'view_item'             => __('View Project', 'catalyst-digital'),
        'view_items'            => __('View Projects', 'catalyst-digital'),
        'search_items'          => __('Search Project', 'catalyst-digital'),
        'not_found'             => __('Not found', 'catalyst-digital'),
        'not_found_in_trash'    => __('Not found in Trash', 'catalyst-digital'),
        'featured_image'        => __('Project Image', 'catalyst-digital'),
        'set_featured_image'    => __('Set project image', 'catalyst-digital'),
        'remove_featured_image' => __('Remove project image', 'catalyst-digital'),
        'use_featured_image'    => __('Use as project image', 'catalyst-digital'),
        'insert_into_item'      => __('Insert into project', 'catalyst-digital'),
        'uploaded_to_this_item' => __('Uploaded to this project', 'catalyst-digital'),
        'items_list'            => __('Projects list', 'catalyst-digital'),
        'items_list_navigation' => __('Projects list navigation', 'catalyst-digital'),
        'filter_items_list'     => __('Filter projects list', 'catalyst-digital'),
    );

    $args = array(
        'label'                 => __('Project', 'catalyst-digital'),
        'description'           => __('Portfolio projects and case studies', 'catalyst-digital'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'revisions'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
        'rewrite'               => array(
            'slug'       => 'projects',
            'with_front' => false,
        ),
    );

    register_post_type('projects', $args);
}
add_action('init', 'catalyst_digital_register_projects_cpt', 0);

/**
 * REST API Endpoints
 */

/**
 * Register custom REST API routes
 */
function catalyst_digital_register_rest_routes()
{
    register_rest_route('healthcheck/v1', '/ping', array(
        'methods'             => 'GET',
        'callback'            => 'catalyst_digital_healthcheck_endpoint',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'catalyst_digital_register_rest_routes');

/**
 * Healthcheck endpoint callback
 *
 * @return WP_REST_Response
 */
function catalyst_digital_healthcheck_endpoint()
{
    global $wpdb;

    // Get WordPress version
    $wp_version = get_bloginfo('version');

    // Get theme information
    $theme = wp_get_theme();
    $theme_name = $theme->get('Name');
    $theme_version = $theme->get('Version');

    // Check database connectivity
    $db_status = 'connected';
    try {
        $wpdb->get_var("SELECT 1");
    } catch (Exception $e) {
        $db_status = 'error';
    }

    // Get memory usage
    $memory_limit = ini_get('memory_limit');
    $memory_usage = function_exists('memory_get_usage') ? round(memory_get_usage() / 1024 / 1024, 2) . ' MB' : 'N/A';

    // Get PHP version
    $php_version = phpversion();

    // Get server time
    $server_time = current_time('mysql');
    $server_timestamp = current_time('timestamp');

    // Check if site is in maintenance mode
    $maintenance_mode = false;
    if (function_exists('wp_is_maintenance_mode')) {
        $maintenance_mode = wp_is_maintenance_mode();
    } elseif (file_exists(ABSPATH . '.maintenance')) {
        $maintenance_mode = true;
    }

    // Build response data
    $response_data = array(
        'status'      => 'ok',
        'timestamp'   => $server_timestamp,
        'datetime'    => $server_time,
        'site'        => array(
            'name'      => get_bloginfo('name'),
            'url'       => get_site_url(),
            'home_url'  => get_home_url(),
        ),
        'wordpress'   => array(
            'version'   => $wp_version,
            'multisite' => is_multisite(),
        ),
        'theme'       => array(
            'name'      => $theme_name,
            'version'   => $theme_version,
        ),
        'database'    => array(
            'status'    => $db_status,
            'prefix'    => $wpdb->prefix,
        ),
        'server'      => array(
            'php_version'   => $php_version,
            'memory_limit'  => $memory_limit,
            'memory_usage'  => $memory_usage,
            'server_software' => isset($_SERVER['SERVER_SOFTWARE']) ? sanitize_text_field($_SERVER['SERVER_SOFTWARE']) : 'Unknown',
        ),
        'maintenance' => array(
            'mode'      => $maintenance_mode,
        ),
    );

    // Return response
    return new WP_REST_Response($response_data, 200);
}
