<?php
/**
 * @var array $args
 * @var bool $lightMode
 */

$lightMode = $args['lightMode'] ?? false;
?>

<!doctype html>
<html lang="<?= get_locale() ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= is_front_page() ? 'Anthony Hoens | Portfolio' : wp_title('Anthony Hoens |') ?></title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="<?= dw_asset('/lib/glider/css/glider.min.css'); ?>">
        <link rel="stylesheet" href="<?= dw_asset('/css/theme.css'); ?>">

        <?php wp_head(); ?>
    </head>
    <body>

    <header class="header <?= $lightMode ? 'header--light' : '' ?>">
        <div class="container">
            <h1 aria-level="1" role="heading" class="logo mb-0">
                <a href="<?= is_front_page() ? '#' : esc_url(get_home_url()) ?>">
                    <?php if($lightMode): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="39"><g fill="#272727" fill-rule="evenodd"><path fill-rule="nonzero" d="m22.813 37.513-3.91-11.794H8.3L4.177 37.513h4.016v1.038H0v-1.038h2.517L16.172 0h4.392l13.494 37.513h2.464v1.038H19.01v-1.038h3.802Zm-8.997-27.302L8.782 24.517h9.693l-4.659-14.306Z"/><path fill-rule="nonzero" d="M31.449 0h17.013v1.046h-3.163v23.291H56.15V1.046h-3.217V0H70v1.046h-3.217v36.458H70v1.047H52.933v-1.047h3.217V25.769H45.299v11.735h3.163v1.047H31.449v-1.047h3.217V1.046h-3.217z"/><path d="M8.116 24.348h48.696v2.029H8.116z"/></g></svg>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="39"><g fill="#FFF" fill-rule="evenodd"><path fill-rule="nonzero" d="M22.786 37.416 18.88 25.652H8.291L4.172 37.416h4.012v1.035H0v-1.035h2.514L16.154 0h4.385l13.48 37.416h2.46v1.035h-17.49v-1.035h3.797ZM13.8 10.185 8.772 24.454h9.681L13.8 10.184Z"/><path fill-rule="nonzero" d="M31.549 0h16.969v1.044h-3.155v23.23h10.823V1.044h-3.209V0H70v1.044h-3.209v36.363H70v1.044H52.977v-1.044h3.209V25.702H45.363v11.705h3.155v1.044H31.549v-1.044h3.209V1.044h-3.209z"/><path d="M7.887 24.648h48.31v1.972H7.887z"/></g></svg>
                    <?php endif; ?>
                </a>
            </h1>
            <nav role="navigation" class="main-nav">
                <h2 class="sro nav__title" aria-level="2" role="heading">
                    <?= esc_html__('Main Navigation', THEME_TEXT_DOMAIN) ?>
                </h2>
                <ul>
                    <?php foreach (dw_menu('main') as $link): ?>
                        <li>
                            <a class="<?= $link->classes ?> <?= $link->active ?>" href="<?= $link->url ?>">
                                <?= $link->label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li>
                        <a href="https://www.linkedin.com/in/anthony-hoens/" target="_blank" class="social linkedin">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="200" height="200" fill="#7D7D7D" stroke="#7D7D7D" viewBox="-143 145 512 512"><path stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="62.464" d="M-143 145v512h512V145h-512zM41.4 508.1H-8.5V348.4h49.9v159.7zM15.1 328.4h-.4c-18.1 0-29.8-12.2-29.8-27.7 0-15.8 12.1-27.7 30.5-27.7s29.7 11.9 30.1 27.7c.1 15.4-11.6 27.7-30.4 27.7zM241 508.1h-56.6v-82.6c0-21.6-8.8-36.4-28.3-36.4-14.9 0-23.2 10-27 19.6-1.4 3.4-1.2 8.2-1.2 13.1v86.3H71.8s.7-146.4 0-159.7h56.1v25.1c3.3-11 21.2-26.6 49.8-26.6 35.5 0 63.3 23 63.3 72.4v88.8z"/><path d="M-143 145v512h512V145h-512zM41.4 508.1H-8.5V348.4h49.9v159.7zM15.1 328.4h-.4c-18.1 0-29.8-12.2-29.8-27.7 0-15.8 12.1-27.7 30.5-27.7s29.7 11.9 30.1 27.7c.1 15.4-11.6 27.7-30.4 27.7zM241 508.1h-56.6v-82.6c0-21.6-8.8-36.4-28.3-36.4-14.9 0-23.2 10-27 19.6-1.4 3.4-1.2 8.2-1.2 13.1v86.3H71.8s.7-146.4 0-159.7h56.1v25.1c3.3-11 21.2-26.6 49.8-26.6 35.5 0 63.3 23 63.3 72.4v88.8z"/></svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>