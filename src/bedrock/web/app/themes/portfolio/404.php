<?php get_header(); ?>

<main class="main">
    <section class="hero">
        <canvas class="hero__canvas" id="animation"></canvas>
        <h1 class="title text-center mb-0" aria-level="1" role="heading">
            <?= esc_html__("It seems you're lost!", THEME_TEXT_DOMAIN) ?>
        </h1>
        <a href="<?= esc_url(home_url()) ?>" class="btn btn--primary" itemprop="url">
            <?= esc_html__('Return Homepage', THEME_TEXT_DOMAIN) ?>
        </a>
    </section>
</main>

<?php get_footer(); ?>
