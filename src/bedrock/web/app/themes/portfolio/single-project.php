<?php get_header(); ?>

<style>
    .single_project__background_img {
        background-image: url(<?= wp_get_attachment_image_url(get_field('cover_img'), $size = '2048x2048') ?>);
    }
</style>

<main class="single_project">
    <section class="single_project__landing_page">
        <div class="single_project__information">
            <?php if(!empty(get_field('logo'))): ?>
                <img class="project__logo" src="<?= esc_url(get_field('logo')) ?>" alt="" />
            <?php endif; ?>
            <h2 class="single_project__title h3" aria-level="2" role="heading">
                <?= esc_html(get_the_title()); ?>
            </h2>
            <?php if(!empty(get_field('subtitle'))): ?>
                <p class="single_project__subtitle">
                    <?= esc_html(get_field('subtitle')) ?>
                </p>
            <?php endif; ?>
            <?php if(!empty(get_field('link'))): ?>
                <a href="<?= esc_url(get_field('link')) ?>" class="btn btn--primary" target="_blank">
                    <?= esc_html__('Link to the project website', THEME_TEXT_DOMAIN) ?>
                </a>
            <?php endif; ?>
        </div>
        <div class="single_project__background_img">
            <div class="gradient"></div>
        </div>

        <div class="landing--arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46"><g fill="none" fill-rule="evenodd"><circle cx="23" cy="23" r="23" fill="#1B8284"/><path fill="#FFF" fill-rule="nonzero" d="m22.994 26.628 7.741-7.746c.264-.263.575-.39.935-.382.36.01.672.145.935.409.263.263.395.575.395.935 0 .36-.132.672-.395.935l-8.11 8.089c-.211.21-.448.369-.711.474a2.112 2.112 0 0 1-.79.158c-.264 0-.527-.053-.79-.158a2.104 2.104 0 0 1-.711-.474l-8.11-8.115a1.218 1.218 0 0 1-.383-.922c.01-.351.145-.659.409-.922.263-.264.575-.395.934-.395.36 0 .672.131.935.395l7.716 7.72Z"/></g></svg>
        </div>
    </section>

    <?php $terms = wp_get_post_terms(get_the_ID(), 'project-owner'); ?>

    <section class="project__content">
        <h3 class="h5">
            <?= esc_html__('The project', THEME_TEXT_DOMAIN) ?>
        </h3>

        <?php if(!empty($terms)): ?>
            <div class="tags">
                <?php foreach ($terms as $term): ?>
                    <span class="tag"><?= esc_html($term->name) ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if(!empty(get_field('description'))): ?>
            <div class="text wysiwyg">
                <?= wp_kses(get_field('description'), ['b' => [], 'strong' => [], 'em' => [], 'i' => [], 'p' => []]); ?>
            </div>
        <?php endif ?>
    </section>

    <?php if(!empty(get_field('design_img_computer')) || !empty(get_field('design_img_phone'))): ?>
        <div class="project__preview container">
            <?php if(!empty(get_field('design_img_computer'))): ?>
                <div>
                    <img class="macbook" src="<?= esc_url(dw_asset('/images/macbook.png')) ?>"
                         alt="<?= esc_attr__('Project image inside macbook', THEME_TEXT_DOMAIN) ?>" />
                    <figure class="project__img--desktop container--img">
                        <img <?= dw_the_img_attributes(get_field('design_img_computer'), ['thumbnail','medium', 'large']) ?> />
                    </figure>
                </div>
            <?php endif; ?>
            <?php if(!empty(get_field('design_img_phone'))): ?>
                <div class="iphone--container">
                    <img class="iphone" src="<?= esc_url(dw_asset('/images/iphone.png')) ?>"
                         alt="<?= esc_attr__('Project image inside iphone', THEME_TEXT_DOMAIN) ?>" />
                    <figure class="project__img--iphone container--img">
                        <img <?= dw_the_img_attributes(get_field('design_img_phone'), ['thumbnail','medium', 'large']) ?> />
                    </figure>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php
    $projects = new WP_Query([
        'post_type' => 'project',
        'post_by_page' => 6,
        'post__not_in' => [get_the_ID()],
        'orderBy' => 'date',
        'order' => 'desc',
    ]);
    ?>
    <section class="projects-list--slider">
        <div class="container arrows__container">
            <h2 aria-level="2" role="heading" class="title h4">
                <?= esc_html__('Some of my projects', THEME_TEXT_DOMAIN) ?>
            </h2>

            <div class="arrows">
                <img src="<?= dw_asset('/images/icons/arrow--left.svg') ?>" class="arrow arrow-prev" alt/>
                <img src="<?= dw_asset('/images/icons/arrow--right.svg') ?>" class="arrow arrow-next" alt/>
            </div>
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
