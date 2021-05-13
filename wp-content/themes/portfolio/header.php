<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Anthony Hoens | Portfolio du jeune étudiant passionné par le web!</title>

        <link rel="stylesheet" href="<?= dw_asset('/css/reset.css') ?>">
        <link rel="stylesheet" href="<?= dw_asset('/css/theme.css') ?>">

        <?php wp_head() ?>
    </head>
    <body>

    <header>
        <h1 aria-level="1" role="heading">
            Anthony Hoens
        </h1>
        <nav role="navigation">
            <h2 class="sro" aria-level="2" role="heading">
                Navigation principale
            </h2>
            <ul>
                <?php foreach (dw_menu('main') as $link): ?>
                    <li>
                        <a href="<?= $link->url ?>">
                            <span></span>
                            <?= $link->label ?>
                        </a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </nav>
    </header>