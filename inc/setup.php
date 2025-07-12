<?php
if (!defined('ABSPATH')) {
    exit;
}

function brandx_setup() {
    //Supporting title tag
    add_theme_support('title-tag');

    //Supporting index images
    add_theme_support('post-thumbnails');

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'gallery',
        'caption',
        'style',
        'script'
    ]);

    register_nav_menus([
        'main_menu' => 'منوی اصلی',
        'footer-menu' => 'منوی فوتر'
    ]);
}

add_action('after_setup_theme', 'brandx_setup');