<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<nav id="main-navigation" class="main-navigation">
    <?php
    $menu_locations = get_nav_menu_locations();
    $menu_id = $menu_locations['main_menu'] ?? 0;
    $menu_items = $menu_id ? wp_get_nav_menu_items(get_term($menu_id, 'nav_menu')->term_id) : array();

    if (!empty($menu_items)) {
        $menu_list = '<ul id="primary-menu" class="nav-menu">';
        foreach ((array)$menu_items as $key => $menu_item) {
            if (!$menu_item || !is_object($menu_item)) continue;
            $title = $menu_item->title ?? '';
            $url = $menu_item->url ?? '';
            $classes = !empty($menu_item->classes) ? $menu_item->classes[0] : '';
            $parent_id = $menu_item->menu_item_parent ?? 0;

            if ($parent_id == 0) {
               $menu_list .= '<li class="menu-item ' . esc_attr($classes) . '">';
               $menu_list .= '<a href="' . esc_url($url) . '">';

               $icon = '';
               if (!empty($classes)) {
                    switch ($classes) {
                        case 'menu-item-features':
                            $icon = '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons/phone-icon.svg') . '" alt="' . esc_attr($title) . ' Icon" class="menu-icon" />';
                            break;
                        case 'menu-item-video':
                            $icon = '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons/video-icon.svg') . '" alt="' . esc_attr($title) . ' Icon" class="menu-icon" />';
                            break;
                        case 'menu-item-products':
                            $icon = '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons/products-icon.svg') . '" alt="' . esc_attr($title) . ' Icon" class="menu-icon" />';
                            break;
                        case 'menu-item-plans':
                            $icon = '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons/plans-icon.svg') . '" alt="' . esc_attr($title) . ' Icon" class="menu-icon" />';
                            break;
                        case 'menu-item-blog':
                            $icon = '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons/blog-icon.svg') . '" alt="' . esc_attr($title) . ' Icon" class="menu-icon" />';
                            break;
                        default:
                            $icon = ''; 
                    }
                }
                $menu_list .= ($icon ? $icon : '') . esc_html($title);
                $menu_list .= '</a>';
            
                $has_submenu = false;
                foreach ((array)$menu_items as $sub_item) {
                    if (!$sub_item || !is_object($sub_item)) continue;
                    if ($sub_item->menu_item_parent == $menu_item->ID) {
                      $has_submenu = true;
                      break;
                    }
                }
                if ($has_submenu) {
                  $menu_list .= '<span class="submenu-arrow"><img src="' . esc_url(get_template_directory_uri() . '/assets/images/icons/arrow-down.svg') . '" alt="submenu-arrow" /></span>';
                }
                $menu_list .= '</a>';
            
                $submenu = '';
                foreach ((array)$menu_items as $sub_item) {
                    if (!$sub_item || !is_object($sub_item)) continue;
                    if ($sub_item->menu_item_parent == $menu_item->ID) {
                        if (empty($submenu)) $submenu = '<ul class="sub-menu">';
                        $submenu .= '<li' . esc_attr($sub_item->classes[0] ?? '') . '"><a href="' . esc_url($sub_item->url ?? '') . '">' . esc_html($sub_item->title ?? '') . '</a></li>';
                    }
                }
                $menu_list .= '</ul>';
            }
        }
        $menu_list .= '</ul>';
        echo $menu_list;
    } else {
        echo '<p>' . __('منوی اصلی تنظیم نشده است.', 'brandx') . '</p>';
    }
    ?>
</nav>