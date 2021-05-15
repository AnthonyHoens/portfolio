<?php get_header(); ?>

<main class="main">
    <section class="main__landing_page landing_page">
        <canvas class="landing_page__canvas" id="animation"></canvas>
        <h1 class="landing_page__title" aria-level="1" role="heading">
            Hoens Anthony<span class="sro">, jeune étudiant de 23 ans vous accompagnant vers de nouvelles aventures&nbsp;!</span>
        </h1>
        <p class="landing_page__text">
            Front End / Back end Dev
        </p>
        <a href="mailto:anthony-hoens@hotmail.com" class="landing_page__link">
            Contactez-moi
        </a>
    </section>

    <section class="main__about about">
        <h2 class="about__title" aria-level="2" role="heading">
            Á propos
        </h2>
        <p class="about__text about__text_1">
            Bonjour, je m'appelle Anthony Hoens, étudiant en 2ème année à la Haute École de la province de Liège.
            Passionné de développement depuis 4ans, j'ai donc décidé d'en faire mon métier.
            Je suis actuellement un font-end et back-end developper
        </p>
        <p class="about__text about__text_2">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae pulvinar velit, vel viverra magna. Nam porttitor metus sit amet ligula ultricies, a sollicitudin diam commodo. Aenean et sagittis sapien. Sed eu sem sit amet felis finibus feugiat. Ut interdum porttitor porta. Vestibulum.
        </p>
        <p class="about__text about__text_3">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae pulvinar velit, vel viverra magna. Nam porttitor metus sit amet ligula ultricies, a sollicitudin diam commodo. Aenean et sagittis sapien. Sed eu sem sit amet felis finibus feugiat. Ut interdum porttitor porta. Vestibulum.
        </p>


        <div class="about__img_container">
            <img class="about__img" src="" alt="Photo de Hoens Anthony">
            <a href="" class="about__img_text">En savoir plus<span class="sro"> à propos de anthony hoens</span></a>
        </div>
    </section>

    <section class="main__projects projects" id="projects">
        <h2 class="projects__title sro" aria-level="2" role="heading">
            Tous mes projets
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
            <div class="project__info_container">
                <p class="project__number">
                    <?php the_field('number'); ?>
                </p>
                <h3 class="project__title" aria-level="3" role="heading">
                    <?php the_title(); ?>
                </h3>
                <p class="project__description">
                    <?php the_field('description'); ?>
                </p>

                <div class="project__link_container">
                    <a href="<?php the_permalink(); ?>" class="project__container">Voir le projet</a>
                    <a href="<?php the_field('link'); ?>" target="_blank" class="project__container">Lien vers le site</a>
                </div>
            </div>
            <div class="project__img_container">
                <img src="<?php the_field('cover_img'); ?>" alt="Spotify - image de couverture">
            </div>
        </section>
        <?php endwhile; else: ?>
            <div>
                <p class="project__no_project">
                    Nous n'avons pas encore trouvé de projet.
                </p>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php get_footer(); ?>