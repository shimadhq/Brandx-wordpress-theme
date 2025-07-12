<?php get_header(); ?>

<main id="main-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    else :
        echo '<p>' . __('No content found', 'brandx') . '</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>