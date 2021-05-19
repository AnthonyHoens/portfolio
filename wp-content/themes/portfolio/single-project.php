<?php get_header(); ?>

<style>
    .single_project__background_img {
        background-image: url(<?= wp_get_attachment_image_url(get_field('cover_img'), $size = '2048x2048') ?>);
    }
</style>

<main class="single_project">
    <section class="single_project__landing_page">
        <div class="single_project__background_img"></div>
        <div class="single_project__information">
            <p class="single_project__number">
                <?php the_field('number'); ?>
            </p>
            <h2 class="single_project__title" aria-level="2" role="heading">
                <?php the_title(); ?>
            </h2>
            <a href="mailto:anthony-hoens@hotmail.com">Contactez-moi</a>
        </div>

        <div>
            <a href="<?php the_field('link'); ?>" target="_blank">Lien vers le site</a>
            <span></span>
            <span></span>
        </div>


        <section class="single_project__support">
            <h3 role="heading" aria-level="3" class="sro">
                <?php the_title(); ?> sur différents support.
            </h3>
            <div class="single_project__support_img_container">
                <img <?= dw_the_img_attributes(get_field('support_img'), ['thumbnail','medium', 'large']) ?>>
            </div>
            <p>
                <?php the_field('support_text'); ?>
            </p>
        </section>

        <section class="single_project__moodboard">
            <h3 aria-level="3" role="heading" class="single_project__second_title">
                Moodboard
            </h3>
            <div class="single_project__moodboard_img_container">
                <img <?= dw_the_img_attributes(get_field('moodboard_img'), ['thumbnail','medium', 'large']) ?>>
            </div>
            <p class="single_project__moodboard_text">
                <?php the_field('moodboard_text'); ?>
            </p>
        </section>

        <section class="single_project__moodboard">
            <h3 aria-level="3" role="heading" class="single_project__second_title">
                Design
            </h3>
            <div class="single_project__computer_design">
                <img <?= dw_the_img_attributes(get_field('design_img_computer'), ['thumbnail','medium', 'large']) ?>>
            </div>
            <div class="single_project__phone_design">
                <img <?= dw_the_img_attributes(get_field('design_img_phone'), ['medium', 'large']) ?>>
            </div>
        </section>
    </section>
    <?php include 'contact.php'; ?>
</main>

<?php get_footer(); ?>
