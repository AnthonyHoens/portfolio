<?php get_header(); ?>
<main class="main">
    <section class="main__landing_page landing_page" itemscope itemtype="https://schema.org/Person">
        <canvas class="landing_page__canvas" id="animation"></canvas>
        <h1 class="landing_page__title" aria-level="1" role="heading">
            <span itemprop="familyName">Hoens</span> <span itemprop="givenName">Anthony</span><span class="sro">, jeune étudiant de 23 ans vous accompagnant vers de nouvelles aventures&nbsp;!</span>
        </h1>
        <p class="landing_page__text" itemprop="jobTitle">
            Front End / Back end Dev
        </p>
        <a href="mailto:anthony-hoens@hotmail.com" class="landing_page__link link" itemprop="url">
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
            <span>Á propos</span>
        </h2>
        <p class="about__text about__text_1">
            <span>
                Bonjour, je m'appelle Anthony Hoens, étudiant en 2ème année à la Haute École de la province de Liège.
                Passionné de développement depuis 4ans, j'ai donc décidé d'en faire mon métier.
                Je suis actuellement un font-end et back-end developper
            </span>
        </p>
        <p class="about__text about__text_2">
            <span>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae pulvinar velit, vel viverra magna. Nam porttitor metus sit amet ligula ultricies, a sollicitudin diam commodo. Aenean et sagittis sapien. Sed eu sem sit amet felis finibus feugiat. Ut interdum porttitor porta. Vestibulum.
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
            <img class="about__img" src="https://anthony-hoens.be/wp-content/uploads/2021/05/hoens_anthony.png" alt="Photo de Hoens Anthony">
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
                <div class="project__img_container">
                    <a class="project__img_link" href="<?php the_permalink(); ?>">En savoir plus sur <?php the_title() ?></a>
                    <img class="img" <?= dw_the_img_attributes(get_field('cover_img'), ['thumbnail','medium', 'large']) ?>>
                </div>
                <div class="project__info_container">
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
