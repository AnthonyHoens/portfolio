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
                    <?php the_title(); ?>
                </h2>
                <a href="mailto:anthony-hoens@hotmail.com" class="single_project__link">
                    <span></span>
                    Contactez-moi
                </a>
            </div>

            <div class="single_project__site_link">
                <a href="<?php the_field('link'); ?>" class="single_project__link" target="_blank">
                    <span></span>
                    Lien vers le site
                </a>
            </div>
        </div>


        <section class="single_project__support">
            <h3 role="heading" aria-level="3" class="sro">
                <?php the_title(); ?> sur différents support.
            </h3>
            <div class="single_project__support_img_container">
                <img <?= dw_the_img_attributes(get_field('support_img'), ['thumbnail','medium', 'large']) ?>>
            </div>
            <p class="single_project__support__text">
                <?php the_field('support_text'); ?>
            </p>
        </section>

        <section class="single_project__moodboard moodboard">
            <h3 aria-level="3" role="heading" class="moodboard__title">
                Moodboard
                <span></span>
            </h3>
            <div class="moodboard__container">
                <div class="moodboard__img_container">
                    <img <?= dw_the_img_attributes(get_field('moodboard_img'), ['thumbnail','medium', 'large']) ?>>
                </div>
                <p class="moodboard__text">
                    <?php the_field('moodboard_text'); ?>
                </p>
            </div>
        </section>

        <section class="single_project__design design">
            <h3 aria-level="3" role="heading" class="design__title">
                Design
                <span></span>
            </h3>
            <div class="design__container">
                <div class="design__computer_design">
                    <img <?= dw_the_img_attributes(get_field('design_img_computer'), ['thumbnail','medium', 'large']) ?>>
                </div>
                <div class="design__phone_design">
                    <img <?= dw_the_img_attributes(get_field('design_img_phone'), ['medium', 'large']) ?>>
                </div>
            </div>
        </section>
    </section>
    <?php include 'contact.php'; ?>
</main>

<?php get_footer(); ?>
