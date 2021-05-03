<?php get_header(); ?>

<main class="contact">
    <section class="contact__container">
        <h2 role="heading" aria-level="2" class="contact__title sro">
            <?php the_title(); ?>
        </h2>

        <div class="second_container">
            <p class="second_container__title">
                <?php the_content(); ?>
            </p>

            <div>
                <p>
                    <?php the_field('about_text'); ?>
                </p>
                <div>
                    <img src="<?php the_field('about_img'); ?>" alt="Image à propos de moi.">
                </div>
            </div>

            <div>
                <p>
                    <?php the_field('passion_text'); ?>
                </p>
                <div>
                    <img src="<?php the_field('passion_img'); ?>" alt="Image à propos de ma passion préférée.">
                </div>
            </div>

            <div>
                <p>
                    <?php the_field('sport_text'); ?>
                </p>
                <div>
                    <img src="<?php the_field('sport_img'); ?>" alt="Image à propos de mon sport favori.">
                </div>
            </div>
        </div>

        <blockquote>
            <p>
                <?php the_field('philosophy_text'); ?>
            </p>
        </blockquote>
    </section>

    <?php

        $projects = new WP_Query([
            'post_type' => 'project',
            'post_by_page' => 3,
            'orderBy' => 'date',
            'order' => 'asc',
        ]);

    ?>
    <section class="some_projects">
        <h2 aria-level="2" role="heading" class="some_projects__title">
            Quelque uns de mes projets
        </h2>
        <?php if ($projects->have_posts()) : while($projects->have_posts()) : $projects->the_post(); ?>

            <section class="project">
                <div class="project__info_container">
                    <p class="project__number">
                        <?php the_field('number'); ?>
                    </p>
                    <h3 class="project__title" aria-level="3" role="heading">
                        <?php the_title(); ?>
                    </h3>
                </div>
                <div class="project__img_container">
                    <img src="<?php the_field('cover_img'); ?>" alt="Spotify - image de couverture">
                </div>
            </section>
        <?php endwhile; else: ?>
            <div>
                <p class="no_project">
                    Nous n'avons pas encore trouvé de projet.
                </p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>
