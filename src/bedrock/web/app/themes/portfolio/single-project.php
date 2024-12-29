<?php get_header(); ?>

<style>
    .single_project__background_img {
        background-image: url(<?= wp_get_attachment_image_url(get_field('cover_img'), $size = '2048x2048') ?>);
    }
</style>

<main class="single_project">
    <section class="single_project__landing_page">
        <div class="single_project__background_img">
            <div class="single_project__information">
                <h2 class="single_project__title" aria-level="2" role="heading">
                    <?= esc_html(get_the_title()); ?>
                </h2>
                <a href="mailto:anthony-hoens@hotmail.com" class="single_project__link">
                    <span></span>
                    Contactez-moi
                </a>
            </div>

            <div class="single_project__site_link">
                <a href="<?= esc_url(get_field('link')); ?>" class="single_project__link" target="_blank">
                    <span></span>
                    <?= esc_html__('Link to the project website', THEME_TEXT_DOMAIN) ?>
                </a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
