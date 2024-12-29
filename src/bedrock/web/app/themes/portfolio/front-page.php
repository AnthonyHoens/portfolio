<?php get_header(); ?>
<main class="main">
    <section class="hero" itemscope itemtype="https://schema.org/Person">
        <canvas class="hero__canvas" id="animation"></canvas>
        <h1 class="title text-center mb-0" aria-level="1" role="heading">
            <span itemprop="givenName"><?= esc_html('Anthony') ?></span> <span itemprop="familyName"><?= esc_html('Hoens') ?></span>
        </h1>
        <p class="text" itemprop="jobTitle">
            <?= esc_html__('Full-stack developer', THEME_TEXT_DOMAIN) ?>
        </p>
        <a href="<?= esc_url(sprintf('mailto:%s', get_option('new_admin_email'))) ?>" class="btn btn--primary" itemprop="url">
            <?= esc_html__('Get in touch', THEME_TEXT_DOMAIN) ?>
        </a>
    </section>

    <section class="about grid container">
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

        <div class="about__text_container">
            <h2 class="title h5" aria-level="2" role="heading">
                <?= esc_html__('Hello,', THEME_TEXT_DOMAIN) ?>
            </h2>
            <p class="text">
                <?= esc_html__('I am Anthony Hoens, a full-stack developer with 3 years of experience. I am passionate about my work and take pride in providing clear communication, collaborative work, and complete commitment.', THEME_TEXT_DOMAIN) ?>
            </p>
            <p class="text">
                <?= esc_html__('Specialized in PHP (Laravel, WordPress, Magento) and front-end (React, jQuery, CSS), I develop scalable applications and dynamic interfaces, with a strong focus on website performance.', THEME_TEXT_DOMAIN) ?>
            </p>
        </div>

        <div class="about__img_container angle-container disable-hover">
            <span class="angle angle__top_left"></span>
            <span class="angle angle__top_right"></span>
            <span class="angle angle__bottom_left"></span>
            <span class="angle angle__bottom_right"></span>

            <img class="about__img" src="<?= esc_url(dw_asset('images/anthony-hoens.jpeg')) ?>"
                 alt="<?= esc_attr__("Anthony Hoens's picture", THEME_TEXT_DOMAIN) ?>">
        </div>
    </section>

    <section class="philosophy">
        <h2 class="sro"><?= esc_html__('My way to think', THEME_TEXT_DOMAIN) ?></h2>
        <div class="container">
            <figure>
                <blockquote>
                    <?= esc_html__("There is only one way to fail: to give up before succeeding.", THEME_TEXT_DOMAIN); ?>
                </blockquote>
                <figcaption>
                    <?= esc_html('Georges Clemenceau') ?>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="projects-list" id="projects">
        <h2 class="title sro" aria-level="2" role="heading">
            <?= esc_html__('Some of my projects', THEME_TEXT_DOMAIN) ?>
        </h2>

        <?php
        $projects = new WP_Query([
            'post_type' => 'project',
            'orderBy' => 'date',
            'order' => 'asc',
        ]);
        ?>

        <?php if ($projects->have_posts()) : while($projects->have_posts()) : $projects->the_post(); ?>
            <?php $terms = wp_get_post_terms(get_the_ID(), 'project-owner'); ?>
            <section class="project">
                <div class="container">
                    <div class="project__img_container angle-container">
                        <span class="angle angle__bottom_left"></span>
                        <span class="angle angle__bottom_right"></span>
                        <span class="angle angle__top_left"></span>
                        <span class="angle angle__top_right"></span>

                        <a href="<?= esc_url(get_permalink()) ?>" title="<?= esc_html_f('Learn more about %s', THEME_TEXT_DOMAIN, esc_html(get_the_title())) ?>" class="stretched-link">
                            <?php if(!empty(get_field('cover_img'))): ?>
                                <img class="img" <?= dw_the_img_attributes(get_field('cover_img'), ['thumbnail','medium', 'large']) ?>>
                            <?php endif; ?>
                            <?php if(!empty(get_field('logo'))): ?>
                                <img class="logo" <?= dw_the_img_attributes(get_field('logo'), ['thumbnail','medium', 'large']) ?>>
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="project__text_container">
                        <h3 class="title h3" aria-level="3" role="heading">
                            <?= esc_html(get_the_title()); ?>
                        </h3>
                        <?php if(!empty(get_field('subtitle'))): ?>
                            <p class="subtitle leading">
                                <?= esc_html(get_field('subtitle')) ?>
                            </p>
                        <?php endif; ?>
                        <?php if(!empty($terms)): ?>
                            <div class="tags">
                                <?php foreach ($terms as $term): ?>
                                    <span class="tag"><?= esc_html($term->name) ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty(get_field('description'))): ?>
                            <p class="text description">
                                <?= wp_kses(get_field('description'), ['b' => [], 'strong' => [], 'em' => [], 'i' => []]); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endwhile; else: ?>
            <div class="container">
                <p class="project__no_project">
                    <?= esc_html__("We haven't found a project yet.", THEME_TEXT_DOMAIN) ?>
                </p>
            </div>
        <?php endif; ?>
    </section>
    <?php include 'contact.php'; ?>
</main>

<?php get_footer(); ?>
