<?php get_header(); ?>
<main class="main">
    <section class="main__landing_page landing_page" itemscope itemtype="https://schema.org/Person">
        <canvas class="landing_page__canvas" id="animation"></canvas>
        <h1 class="landing_page__title" aria-level="1" role="heading">
            <span itemprop="familyName"><?= esc_html('Hoens') ?></span> <span itemprop="givenName"><?= esc_html('Anthony') ?></span>
        </h1>
        <p class="landing_page__text" itemprop="jobTitle">
            <?= esc_html__('Full-stack developer', THEME_TEXT_DOMAIN) ?>
        </p>
        <a href="<?= esc_url(sprintf('mailto:%s', get_option('new_admin_email'))) ?>" class="landing_page__link link" itemprop="url">
            <span class="link__bg"></span>
            <?= esc_html__('Get in touch', THEME_TEXT_DOMAIN) ?>
        </a>
    </section>

    <section class="main__about about">
        <span class="about__grid about__grid_1"></span>
        <span class="about__grid about__grid_2"></span>
        <span class="about__grid about__grid_3"></span>
        <span class="about__grid about__grid_4"></span>
        <span class="about__grid about__grid_5"></span>
        <span class="about__grid about__grid_6"></span>
        <span class="about__grid about__grid_7"></span>
        <span class="about__grid about__grid_8"></span>
        <span class="about__grid about__grid_9"></span>
        <span class="about__grid about__grid_10"></span>
        <span class="about__grid about__grid_11"></span>
        <span class="about__grid about__grid_12"></span>
        <h2 class="about__title" aria-level="2" role="heading">
            <span><?= esc_html__('About', THEME_TEXT_DOMAIN) ?></span>
        </h2>
        <p class="about__text about__text_1">
            <span>
                Je suis Anthony Hoens, développeur full-stack passionné. Fort de mon expérience, je me lance en tant qu'indépendant pour créer des solutions web sur-mesure.
            </span>
        </p>
        <p class="about__text about__text_2">
            <span>
                Fort d'une solide expérience en WordPress, Magento et Laravel, je maîtrise parfaitement PHP et suis à l'aise avec le frontend (CSS, React, JavaScript, jQuery) pour créer des sites web dynamiques et performants.
            </span>
        </p>
        <p class="about__text about__text_3">
            <span>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae pulvinar velit, vel viverra magna. Nam porttitor metus sit amet ligula ultricies, a sollicitudin diam commodo. Aenean et sagittis sapien. Sed eu sem sit amet felis finibus feugiat. Ut interdum porttitor porta. Vestibulum.
            </span>
        </p>

        <div class="about__img_container about__img_hover">
            <span class="about__span about__span_1"></span>
            <span class="about__span about__span_2"></span>
            <span class="about__span about__span_3"></span>
            <span class="about__span about__span_4"></span>
            <img class="about__img" src="https://anthony-hoens.be/wp-content/uploads/2021/05/hoens_anthony.png"
                 alt="<?= esc_attr__("Anthony Hoens's picture", THEME_TEXT_DOMAIN) ?>">

            <?php $page = get_page_by_path('about'); ?>
            <a href="<?= esc_url(get_page_link($page->ID)) ?>"
               class="about__img_text"
               title="<?= esc_html_f('Learn more about %s', THEME_TEXT_DOMAIN, 'Anthony Hoens') ?>">
                <?= esc_html__('Learn more', THEME_TEXT_DOMAIN) ?>
            </a>
        </div>
    </section>

    <section class="main__projects projects" id="projects">
        <h2 class="projects__title sro" aria-level="2" role="heading">
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

        <section class="projects__project project">
            <span class="project__span project__span_1"></span>
            <span class="project__span project__span_2"></span>
            <span class="project__span project__span_3"></span>
            <span class="project__span project__span_4"></span>
            <div class="project__container">
                <div class="project__img_container">
                    <a class="project__img_link" href="<?= esc_url(get_permalink()); ?>">
                        <?= esc_html_f('Learn more about %s', THEME_TEXT_DOMAIN, esc_html(get_the_title())) ?>
                    </a>
                    <img class="img" <?= dw_the_img_attributes(get_field('cover_img'), ['thumbnail','medium', 'large']) ?>>
                </div>
                <div class="project__info_container">
                    <h3 class="project__title" aria-level="3" role="heading">
                        <a href="<?= esc_url(get_permalink()); ?>">
                            <?= esc_html(get_the_title()); ?>
                        </a>
                    </h3>
                    <?php if(!empty(get_field('description'))): ?>
                        <p class="project__description">
                            <?= wp_kses(get_field('description'), ['b' => [], 'strong' => [], 'em' => [], 'i' => []]); ?>
                        </p>
                    <?php endif; ?>

                    <div class="project__link_container">
                        <a href="<?= esc_url(get_permalink()); ?>" class="project__link">
                            <span></span>
                            <?= esc_html__('View the project', THEME_TEXT_DOMAIN) ?>
                        </a>
                        <?php if(!empty(get_field('link'))): ?>
                            <a href="<?= esc_url(get_field('link')); ?>" target="_blank" class="project__link project__site_link">
                                <span></span>
                                <?= esc_html__('Link to the project website', THEME_TEXT_DOMAIN) ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
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
