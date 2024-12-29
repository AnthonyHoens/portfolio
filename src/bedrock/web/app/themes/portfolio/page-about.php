<?php get_header(); ?>

<main class="main">
    <section class="main__about main__special_about about grid">
        <span class="grid__line grid__line_1"></span>
        <span class="grid__line grid__line_2"></span>
        <span class="grid__line grid__line_3"></span>
        <span class="grid__line grid__line_4"></span>
        <span class="grid__line grid__line_5"></span>
        <span class="grid__line grid__line_6"></span>
        <span class="grid__line grid__line_7"></span>
        <span class="grid__line grid__line_8"></span>
        <span class="grid__line grid__line_9"></span>
        <span class="grid__line grid__line_10"></span>
        <span class="grid__line grid__line_11"></span>
        <span class="grid__line grid__line_12"></span>

        <h2 role="heading" aria-level="2" class="sro">
            <?= esc_html(get_the_title()); ?>
        </h2>

        <p class="about__special_title">
            <?= esc_html__('Hello,', THEME_TEXT_DOMAIN); ?>
        </p>

        <?php if (!empty(get_field('about_text')) && !empty(get_field('about_img'))): ?>
            <div class="about__wrap about__wrap_1 wrap">
                <p class="wrap__text">
                    <?= esc_html(get_field('about_text')); ?>
                </p>
                <div class="about__img_container wrap__img_container">
                    <span class="about__span about__span_1"></span>
                    <span class="about__span about__span_2"></span>
                    <span class="about__span about__span_3"></span>
                    <span class="about__span about__span_4"></span>
                    <img <?= dw_the_img_attributes(get_field('about_img'), ['thumbnail','medium', 'large']) ?>  >
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty(get_field('passion_text')) && !empty(get_field('passion_img'))): ?>
            <div class="about__wrap about__wrap_2 wrap">
                <p class="wrap__text">
                    <?= esc_html(get_field('passion_text')); ?>
                </p>
                <div class="about__img_container wrap__img_container">
                    <span class="about__span about__span_1"></span>
                    <span class="about__span about__span_2"></span>
                    <span class="about__span about__span_3"></span>
                    <span class="about__span about__span_4"></span>
                    <img <?= dw_the_img_attributes(get_field('passion_img'), ['thumbnail','medium', 'large']) ?>>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty(get_field('sport_text')) && !empty(get_field('sport_img'))): ?>
            <div class="about__wrap about__wrap_3 wrap">
                <p class="wrap__text">
                    <?= esc_html(get_field('sport_text')); ?>
                </p>
                <div class="about__img_container wrap__img_container">
                    <span class="about__span about__span_1"></span>
                    <span class="about__span about__span_2"></span>
                    <span class="about__span about__span_3"></span>
                    <span class="about__span about__span_4"></span>
                    <img <?= dw_the_img_attributes(get_field('sport_img'), ['thumbnail','medium', 'large']) ?>>
                </div>
            </div>
        <?php endif; ?>
    </section>

    <?php
        $projects = new WP_Query([
            'post_type' => 'project',
            'post_by_page' => 6,
            'orderBy' => 'date',
            'order' => 'asc',
        ]);
    ?>
    <section class="main__some_projects some_projects">
        <h2 aria-level="2" role="heading" class="some_projects__title">
            <?= esc_html__('Some of my projects', THEME_TEXT_DOMAIN) ?>
        </h2>
        <?php if ($projects->have_posts()): while($projects->have_posts()): $projects->the_post(); ?>
            <section class="some_projects__project project">
                <div class="project__info_container">
                    <h3 class="project__title" aria-level="3" role="heading">
                        <a href="<?= esc_url(get_permalink()); ?>">
                            <?= esc_html(get_the_title()); ?>
                        </a>
                    </h3>
                </div>
                <div class="project__img_container">
                    <a href="<?= esc_url(get_permalink()); ?>">
                        <span class="sro">
                            <?= esc_html_f('Learn more about %s', THEME_TEXT_DOMAIN, esc_html(get_the_title())) ?>
                        </span>
                    </a>
                    <img <?= dw_the_img_attributes(get_field('cover_img'), ['thumbnail','medium', 'large']) ?>>
                </div>
            </section>
        <?php endwhile; else: ?>
            <div>
                <p class="project__no_project">
                    <?= esc_html__("We haven't found a project yet.", THEME_TEXT_DOMAIN) ?>
                </p>
            </div>
        <?php endif; ?>
    </section>
    <?php include 'contact.php'; ?>
</main>

<?php get_footer(); ?>