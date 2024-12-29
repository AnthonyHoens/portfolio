<?php get_header(null, ['lightMode' => true]); ?>

<main class="main">
    <section class="about about--page grid container">
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
        <div class="container">
            <h2 aria-level="2" role="heading" class="title h4">
                <?= esc_html__('Some of my projects', THEME_TEXT_DOMAIN) ?>
            </h2>
        </div>
        <div class="container js-projects-slider">
            <?php if ($projects->have_posts()): while($projects->have_posts()): $projects->the_post(); ?>
                <section class="project">
                    <div class="project__img_container">
                        <a href="<?= esc_url(get_permalink()); ?>" class="stretched-link" title="<?= esc_html_f('Learn more about %s', THEME_TEXT_DOMAIN, esc_html(get_the_title())) ?>">
                            <img class="img" <?= dw_the_img_attributes(get_field('cover_img'), ['thumbnail','medium', 'large']) ?>>
                            <?php if(!empty(get_field('logo'))): ?>
                                <img class="logo" <?= dw_the_img_attributes(get_field('logo'), ['thumbnail','medium', 'large']) ?>>
                            <?php endif; ?>
                        </a>
                    </div>
                </section>
            <?php endwhile; else: ?>
                <div>
                    <p class="project__no_project">
                        <?= esc_html__("We haven't found a project yet.", THEME_TEXT_DOMAIN) ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="contact--me">
        <h2 class="h5">
            <?= esc_html__("Let's talk about your project ?", THEME_TEXT_DOMAIN) ?>
        </h2>
        <a href="<?= esc_url(sprintf('mailto:%s', get_option('new_admin_email'))) ?>" class="btn btn--secondary" itemprop="url">
            <?= esc_html__('Get in touch', THEME_TEXT_DOMAIN) ?>
        </a>
    </section>
</main>

<?php get_footer(); ?>