        <footer class="footer">
            <nav role="navigation" class="footer__nav nav">
                <h2 class="nav__title sro" aria-level="2" role="heading">
                    Seconde navigation principale
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

        <script src="<?= dw_asset('js/app.js') ?>"></script>
        <?php wp_footer(); ?>
    </body>
</html>