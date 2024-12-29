<?php get_header(); ?>

    <main class="main">
        <section class="hero hero--with-bg">
            <h1 class="title text-center mb-0" aria-level="1" role="heading">
                <?= esc_html__('My projects', THEME_TEXT_DOMAIN) ?>
            </h1>
            <a href="<?= esc_url(sprintf('mailto:%s', get_option('new_admin_email'))) ?>" class="btn btn--primary" itemprop="url">
                <?= esc_html__('Get in touch', THEME_TEXT_DOMAIN) ?>
            </a>
        </section>

        <section class="projects-list" id="projects">
            <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
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
                            <h2 class="title h2" aria-level="3" role="heading">
                                <?= esc_html(get_the_title()); ?>
                            </h2>
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
    </main>

<?php get_footer(); ?>
