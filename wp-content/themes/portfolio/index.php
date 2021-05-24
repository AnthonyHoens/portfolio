<?php get_header(); ?>
<div class="torch__option">
    <p id="optionBtn">Option de lumière</p>
</div>
<div class="torch__header">
    <div>
        <label for="circle_size">Régler la taille du cercle</label>
        <input type="range" id="circle_size" name="circle_size" min="10" max="15">
    </div>
    <div>
        <label for="light_activate">Activer ou désactiver la lumière</label>
        <input type="checkbox" id="light_activate" name="light_activate" checked>
    </div>
</div>

<div class="torch">
    <p class="torch__text sro">Hidden text</p>
    <div class="torch__light"></div>
</div>

<main class="main">
    <section class="main__landing_page landing_page">
        <canvas class="landing_page__canvas" id="animation"></canvas>
        <h1 class="landing_page__title" aria-level="1" role="heading">
            Hoens Anthony<span class="sro">, jeune étudiant de 23 ans vous accompagnant vers de nouvelles aventures&nbsp;!</span>
        </h1>
        <p class="landing_page__text">
            Front End / Back end Dev
        </p>
        <a href="mailto:anthony-hoens@hotmail.com" class="landing_page__link link">
            <span class="link__bg"></span>
            Contactez-moi
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
            <span class="about__span about__span_1"></span>
            <span class="about__span about__span_2"></span>
            <span class="about__span about__span_3"></span>
            <span class="about__span about__span_4"></span>
            <img class="about__img" src="http://portfolio.local/wp-content/uploads/2021/05/hoens_anthony.png" alt="Photo de Hoens Anthony">
            <a href="http://portfolio.local/about/" class="about__img_text">En savoir plus<span class="sro"> à propos de anthony hoens</span></a>
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
            <span class="project__span project__span_1"></span>
            <span class="project__span project__span_2"></span>
            <span class="project__span project__span_3"></span>
            <span class="project__span project__span_4"></span>
            <div class="project__container">
                <div class="project__info_container">
                    <p class="project__number">
                        <?php the_field('number'); ?>
                    </p>
                    <h3 class="project__title" aria-level="3" role="heading">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <p class="project__description">
                        <?php the_field('description'); ?>
                    </p>

                    <div class="project__link_container">
                        <a href="<?php the_permalink(); ?>" class="project__link">
                            <span></span>
                            Voir le projet
                        </a>
                        <a href="<?php the_field('link'); ?>" target="_blank" class="project__link project__site_link">
                            <span></span>
                            Lien vers le site
                        </a>
                    </div>
                </div>
                <div class="project__img_container">
                    <a class="project__img_link" href="<?php the_permalink(); ?>">En savoir plus sur <?php the_title() ?></a>
                    <img class="img" <?= dw_the_img_attributes(get_field('cover_img'), ['thumbnail','medium', 'large']) ?>>
                </div>
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
    <?php include 'contact.php'; ?>
</main>

<?php get_footer(); ?>
