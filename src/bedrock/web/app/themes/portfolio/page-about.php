<?php get_header(); ?>

<main class="main">
    <section class="about about--page grid">
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

        <p class="title h1">
            <?= esc_html__('Hello,', THEME_TEXT_DOMAIN); ?>
        </p>

        <?php if (!empty(get_field('about_text')) && !empty(get_field('about_img'))): ?>
            <div class="grid__wrapper grid__wrapper_1">
                <div class="text wysiwyg">
                    <?= wp_kses(get_field('about_text'), ['b' => [], 'strong' => [], 'em' => [], 'i' => [], 'p' => []]); ?>
                </div>
                <div class="about__img_container angle-container disable-hover">
                    <span class="angle angle__top_left"></span>
                    <span class="angle angle__top_right"></span>
                    <span class="angle angle__bottom_left"></span>
                    <span class="angle angle__bottom_right"></span>

                    <img <?= dw_the_img_attributes(get_field('about_img'), ['thumbnail','medium', 'large']) ?>  >
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty(get_field('passion_text')) && !empty(get_field('passion_img'))): ?>
            <div class="grid__wrapper grid__wrapper_2">
                <div class="text wysiwyg">
                    <?= wp_kses(get_field('passion_text'), ['b' => [], 'strong' => [], 'em' => [], 'i' => [], 'p' => []]); ?>
                </div>
                <div class="about__img_container angle-container disable-hover">
                    <span class="angle angle__top_left"></span>
                    <span class="angle angle__top_right"></span>
                    <span class="angle angle__bottom_left"></span>
                    <span class="angle angle__bottom_right"></span>

                    <img <?= dw_the_img_attributes(get_field('passion_img'), ['thumbnail','medium', 'large']) ?>>
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
    <section class="projects-list--slider">
        <h2 aria-level="2" role="heading" class="title h3">
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