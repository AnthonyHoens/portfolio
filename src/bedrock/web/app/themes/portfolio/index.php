<?php get_header(); ?>

    <main class="main">
        <section class="hero">
            <canvas class="hero__canvas" id="animation"></canvas>
            <h1 class="title text-center mb-0" aria-level="1" role="heading">
                <?= esc_html__('My projects', THEME_TEXT_DOMAIN) ?>
            </h1>
            <a href="<?= esc_url(sprintf('mailto:%s', get_option('new_admin_email'))) ?>" class="btn btn--primary" itemprop="url">
                <?= esc_html__('Get in touch', THEME_TEXT_DOMAIN) ?>
            </a>
            <div class="landing--arrow">
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"><g fill="none" fill-rule="evenodd"><circle cx="23" cy="23" r="23" fill="#1B8284"/><path fill="#FFF" fill-rule="nonzero" d="m22.994 26.628 7.741-7.746c.264-.263.575-.39.935-.382.36.01.672.145.935.409.263.263.395.575.395.935 0 .36-.132.672-.395.935l-8.11 8.089c-.211.21-.448.369-.711.474a2.112 2.112 0 0 1-.79.158c-.264 0-.527-.053-.79-.158a2.104 2.104 0 0 1-.711-.474l-8.11-8.115a1.218 1.218 0 0 1-.383-.922c.01-.351.145-.659.409-.922.263-.264.575-.395.934-.395.36 0 .672.131.935.395l7.716 7.72Z"/></g></svg>
            </div>
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
                            <?php if(!empty(get_field('short_description'))): ?>
                                <p class="text description">
                                    <?= wp_kses(get_field('short_description'), ['b' => [], 'strong' => [], 'em' => [], 'i' => []]); ?>
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
