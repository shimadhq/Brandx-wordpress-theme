<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header" class="header-desktop">
    <div class="header-container">
        <?php get_template_part('/template-parts/header/header-top'); ?>
        <?php wp_nav_menu(array('theme_location' => 'main_menu',
         'menu_class' => 'nav-menu',
         'container' => 'nav',
         'container_id' => 'main-navigation',
        ));
        ?>
    </div>
</header>
<header class="header-mobile">
    <div class="top-mobile">
        <div class="mobile-logo">
           <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
              <img src="<?php echo esc_url(get_theme_mod('brandx_logo', get_template_directory_uri() . '/assets/images/logo/brand-x-logo.png')); ?>" alt="brand-x logo" class="logo">
           </a>
        </div>
        <div class="menu-mobile">
            <img src="<?php echo esc_url(get_theme_mod('menu-icon', get_template_directory_uri() . '/assets/images/icons/menu-icon.svg')); ?>" />
        </div>
    </div>
    <div class="search">
            <form role="search" method="get" class="search-mobile" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" class="field-mobile" placeholder="<?php esc_attr_e('جستجو...', 'brandx'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <button type="submit" class="search-button">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search-icon.svg') ?>" alt="search icon" class="custom-search-icon" />
                </button>
            </form>
    </div>
    </div>
</header>
