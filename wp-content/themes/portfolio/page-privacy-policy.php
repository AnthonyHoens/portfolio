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
            </div>
            
        </section>


    </main>

<?php get_footer(); ?>
<?php
