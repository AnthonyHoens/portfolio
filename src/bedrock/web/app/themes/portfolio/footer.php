        <footer class="footer">
            <nav role="navigation" class="footer__nav nav">
                <h2 class="nav__title sro" aria-level="2" role="heading">
                    <?= esc_html__('Main Navigation', THEME_TEXT_DOMAIN); ?>
                </h2>
                <ul class="nav__container">
                    <?php foreach (dw_menu('main') as $link): ?>
                        <li class="nav__item">
                            <a href="<?= $link->url ?>" class="nav__text <?= $link->active ?> <?= $link->classes ?>">
                                <?= $link->label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <small class="footer__copyright">
                &copy;&nbsp;<?= esc_html__('All rights reserved.', THEME_TEXT_DOMAIN) ?>
            </small>

            <div class="footer__contact">
                <a href="<?= esc_url(sprintf('mailto:%s', get_option('new_admin_email'))) ?>">
                    <?= esc_html__('Get in touch', THEME_TEXT_DOMAIN) ?>
                </a>
            </div>
        </footer>

        <script src="<?= dw_asset('js/contact.js') ?>"></script>

        <?php if (is_front_page()): ?>
            <script src="<?= dw_asset('js/app.js') ?>"></script>
        <?php endif; ?>

        <?php wp_footer(); ?>
    </body>
</html>