        <footer class="footer">
            <div class="container">
                <a href="<?= is_front_page() ? '#' : esc_url(get_home_url()) ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="39"><g fill="#FFF" fill-rule="evenodd"><path fill-rule="nonzero" d="M22.786 37.416 18.88 25.652H8.291L4.172 37.416h4.012v1.035H0v-1.035h2.514L16.154 0h4.385l13.48 37.416h2.46v1.035h-17.49v-1.035h3.797ZM13.8 10.185 8.772 24.454h9.681L13.8 10.184Z"/><path fill-rule="nonzero" d="M31.549 0h16.969v1.044h-3.155v23.23h10.823V1.044h-3.209V0H70v1.044h-3.209v36.363H70v1.044H52.977v-1.044h3.209V25.702H45.363v11.705h3.155v1.044H31.549v-1.044h3.209V1.044h-3.209z"/><path d="M7.887 24.648h48.31v1.972H7.887z"/></g></svg>
                </a>

                <nav role="navigation" class="main-nav">
                    <h2 class="nav__title sro" aria-level="2" role="heading">
                        <?= esc_html__('Main Navigation', THEME_TEXT_DOMAIN); ?>
                    </h2>
                    <ul>
                        <?php foreach (dw_menu('main') as $link): ?>
                            <li>
                                <a href="<?= $link->url ?>" class="<?= $link->active ?> <?= $link->classes ?>">
                                    <?= $link->label ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </footer>

        <script src="<?= dw_asset('/lib/glider/js/glider.min.js') ?>"></script>
        <script src="<?= dw_asset('/js/slider.js') ?>"></script>
        <script src="<?= dw_asset('/js/burger.js') ?>"></script>
        <script src="<?= dw_asset('js/app.js') ?>"></script>

        <?php wp_footer(); ?>
    </body>
</html>