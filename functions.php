<?php
/**
 * Theme Functions
 * 
 * @package brandx
*/

function brandx_enqueue_scripts() {
    $version = date('YmdHis');
    wp_enqueue_style('brandx-style', get_stylesheet_uri(), [], $version);
    wp_enqueue_style('brandx-header', get_template_directory_uri() . '/assets/css/header.css', [], $version);
    wp_enqueue_style('brandx-fonts', get_template_directory_uri() . '/assets/css/custom-fonts.css', [], $version);
    wp_enqueue_style('services-banner', get_template_directory_uri() . '/assets/css/services-banner.css', [], $version);
    wp_enqueue_style('features-list', get_template_directory_uri() . '/assets/css/features-list.css', [], $version);
    wp_enqueue_style('about-brandx', get_template_directory_uri() . '/assets/css/about-brandx.css', [], $version);
    wp_enqueue_style('why-brandx-style', get_template_directory_uri() . '/assets/css/why-brandx.css', [], $version);
    wp_enqueue_script('why-brandx-script', get_template_directory_uri() . '/assets/js/wpc-counter.js', [], $version);
}
add_action('wp_enqueue_scripts', 'brandx_enqueue_scripts');

//Adding customize settings to WordPress Customizer
function brandx_customize_register($wp_customize) {
    //Adding section for header settings
    $wp_customize->add_section('brandx_header_section', [
        'title' => __('تنظیمات هدر', 'brandx'),
        'priority' => 30,
    ]);

    //Setting logo
    $wp_customize->add_setting('brandx_logo', [
        'default' => get_template_directory_uri() . '/assets/images/logo/brand-x-logo.png',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'brandx_logo', [
        'label' => __('آپلود لوگو', 'brandx'),
        'section' => 'brandx_header_section',
        'settings' => 'brandx_logo',
    ]));

    //Setting Email
    $wp_customize->add_setting('brandx_email', [
        'default' => 'info@test.com',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('brandx_email', [
        'label' => __('ایمیل', 'brandx'),
        'section' => 'brandx_header_section',
        'type' => 'text',
    ]);

    //Setting mobile number
    $wp_customize->add_setting('brandx_phone', [
        'default' => '+123-456-7890',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('brandx_phone', [
        'label' => __('شماره تماس', 'brandx'),
        'section' => 'brandx_header_section',
        'type' => 'text',
    ]);
}
add_action('customize_register', 'brandx_customize_register');

//Registering menu
register_nav_menus(array(
    'main_menu' => __('منوی اصلی', 'brandx'),
));

//Adding defalut menu items
function brandx_register_default_menu() {
    if (!has_nav_menu('main_menu')) {
        $menu_id = wp_create_nav_menu('منوی اصلی');
        
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('ویژگی‌ها', 'brandx'),
            'menu-item-classes' => 'menu-item-features',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);

        $video_id = wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('ویدئو', 'brandx'),
            'menu-item-classes' => 'menu-item-video',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('دوره حرفه‌ای جاوا اسکریپت', 'brandx'),
            'menu-item-parent-id' => $video_id,
            'menu-item-classes' => 'menu-item-sub-video-1',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('دوره حرفه‌ای HTML', 'brandx'),
            'menu-item-parent-id' => $video_id,
            'menu-item-classes' => 'menu-item-sub-video-2',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('دوره حرفه‌ای CSS', 'brandx'),
            'menu-item-parent-id' => $video_id,
            'menu-item-classes' => 'menu-item-sub-video-3',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('محصولات', 'brandx'),
            'menu-item-classes' => 'menu-item-products',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);

        $plans_id = wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('پلن‌های طراحی سایت', 'brandx'),
            'menu-item-classes' => 'menu-item-plans',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('پلن طراحی پایه', 'brandx'),
            'menu-item-parent-id' => $plans_id,
            'menu-item-classes' => 'menu-item-sub-plan-1',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);
        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('پلن طراحی VIP', 'brandx'),
            'menu-item-parent-id' => $plans_id,
            'menu-item-classes' => 'menu-item-sub-plan-2',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);

        wp_update_nav_menu_item($menu_id, 0, [
            'menu-item-title' => __('مقالات', 'brandx'),
            'menu-item-classes' => 'menu-item-blog',
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ]);

        $menu_location = ['main_menu' => $menu_id];
        set_theme_mod('nav_menu_locations', $menu_location);
    }
}
add_action('after_switch_theme', 'brandx_register_default_menu');

// Adding widgets
function register_brandx_widgets() {
    $widgets = [
        [
            'path' => '/template-parts/widgets/services-banner.php',
            'class' => 'WPC\Widgets\Services_Banner_Widget',
        ],
        [
            'path' => '/template-parts/widgets/features-list.php',
            'class' => 'WPC\Widgets\Features_List_Widget',
        ],
        [
            'path' => '/template-parts/widgets/about-brandx.php',
            'class' => 'WPC\Widgets\About_Brandx_widget',
        ],
        [
            'path' => '/template-parts/widgets/why-brandx.php',
            'class' => 'WPC\Widgets\Why_Brandx_Widget',
        ],
    ];

    foreach ($widgets as $widget) {
        $full_path = get_template_directory() . $widget['path'];
        if (file_exists($full_path)) {
            require_once $full_path;

            if (class_exists($widget['class'])) {
                \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new $widget['class']);
            } else {
                error_log("Class {$widget['class']} not found in {$full_path}");
            }
        } else {
            error_log("Widget file not found: {$full_path}");
        }
    }
}
add_action('elementor/widgets/register', 'register_brandx_widgets');

?>