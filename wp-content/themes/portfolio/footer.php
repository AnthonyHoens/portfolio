        <footer class="footer">
            <nav role="navigation" class="nav">
                <h2 class="footer__title sro" aria-level="2" role="heading">
                    Navigation principale
                </h2>
                <ul class="nav__container">
                    <?php foreach (dw_menu('main') as $link): ?>
                        <li class="nav__item">
                            <a href="<?= $link->url ?>" class="nav__text">

                                <?= $link->label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <small class="footer__copyright">
                &copy;&nbsp;Anthony Hoens
            </small>

            <div class="footer__contact">
                <a href="mailto:anthony-hoens@hotmail.com">Contactez-moi</a>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>