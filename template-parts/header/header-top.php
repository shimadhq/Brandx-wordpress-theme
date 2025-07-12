<div class="header-top">
    <div class="header-logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <img src="<?php echo esc_url(get_theme_mod('brandx_logo', get_template_directory_uri() . '/assets/images/logo/brand-x-logo.png')); ?>" alt="brand-x logo" class="logo">
        </a>
    </div>
    <div class="header-info">
        <div class="contact-info">
            <div class="phone-icon">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/phone-icon.svg') ?>" alt="phone-icon" class="custom-search-icon" />
            </div>
            <div class="contact">
                <a class="phone" href="#">
                    <?php echo esc_html(get_theme_mod('brandx_phone', '۰۲۱۵۶۳۳۳۴۵')); ?>
                </a>
                <a class="email" href="#">
                    <?php echo esc_html(get_theme_mod('brandx_email', 'info@test.com')); ?>
                </a>
            </div>
        </div>
        <div class="search-section">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search" class="search-field" placeholder="<?php esc_attr_e('جستجو...', 'brandx'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <button type="submit" class="search-button">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/icons/search-icon.svg') ?>" alt="search icon" class="custom-search-icon" />
                </button>
            </form>
        </div>
    </div>
</div>