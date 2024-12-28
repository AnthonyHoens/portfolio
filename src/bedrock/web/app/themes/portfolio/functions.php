<?php

if(!defined('THEME_TEXT_DOMAIN')) define('THEME_TEXT_DOMAIN', 'portfolio');

/**
 * Load theme text domain.
 *
 * @return void
 */
function my_theme_text_domain_locale(): void
{
    load_theme_textdomain(THEME_TEXT_DOMAIN, get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'my_theme_text_domain_locale', 100);

/* ****
 *  Return the attributes of an img
 * ****/

function dw_the_img_attributes($id, $sizes = []) {
    $src = wp_get_attachment_url($id);
    $thumbnail_meta =  get_post_meta($id);


    $sizes = array_map(function($size) use ($id, $src) {
        $data = wp_get_attachment_image_src($id, $size);

        if(is_null($src)) {
            $src = $data[0];
        }

        return $data[0] . ' ' . $data[1] . 'w';
    }, $sizes);


    $srcset = implode(', ', $sizes);
    $alt = $thumbnail_meta['_wp_attachment_image_alt'][0] ?? null;


    return 'src="' . $src . '" srcset="' . $srcset . '" alt="' . $alt . '"';
}


/* ****
 *  Return a compiled asset's URI
 * ****/

function dw_menu($location)
{
    $locations = get_nav_menu_locations();
    $menu = $locations[$location];

    $links = wp_get_nav_menu_items($menu);

    $links = array_map(function ($post) {
        $link = new \stdClass();

        $link->classes = $post->classes[0];
        $link->url = $post->url;
        $link->label = $post->title;

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if ($actual_link == $link->url) {
            $link->active = 'nav__active';
        } elseif ($actual_link == $link->url) {
            $link->active = 'nav__active';
        }

        return $link;
    }, $links);

    return $links;
}

/* ****
 *  Return a compiled asset's URI
 * ****/

function dw_asset($path)
{
    return rtrim(get_template_directory_uri(), '/') . '/public/' . ltrim($path, '/');
}

/* ****
 *  Register custom post type
 * ****/

add_action('init', 'dw_custom_post_type');

function dw_custom_post_type()
{
    register_post_type('project', [
        'label' => 'Projets',
        'labels' => [
            'singular_name' => 'Projet',
            'add_new' => 'Ajouter un projet',
            'add_new_item' => 'Ajouter un nouveau projet',
            'edit_item' => 'Modifier un projet',
            'new_item' => 'Nouveau projet',
        ],
        'description' => 'Tous les projets réalisés par Anthony Hoens.',
        'public' => true,
        'menu_position' => 5,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-code-standards',
        'rewrite' => [
            'slug' => 'projects',
        ],
    ]);
}

/* ****
 *  Register navigations menus
 * ****/
add_action('init', 'dw_custom_navigation_menus');

function dw_custom_navigation_menus()
{
    register_nav_menus([
        'main' => 'Navigation principale',
    ]);
}


/* ****
 *  Disable Gutenberg Editor
 * ****/

add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");

function disable_gutenberg_editor()
{
    return false;
}

/**
 * Escaping the translation of a formatted string.
 *
 * If there is no translation, or the text domain isn't loaded, the original text is returned.
 *
 * @param string $format The format string is composed of zero or more directives: ordinary characters (excluding %) that are copied directly to the result, and conversion specifications, each of which results in fetching its own parameter. This applies to both sprintf and printf.
 *                       Each conversion specification consists of a percent sign (%), followed by one or more of these elements, in order: An optional sign specifier that forces a sign (- or +) to be used on a number. By default, only the - sign is used on a number if it's negative. This specifier forces positive numbers to have the + sign attached as well, and was added in PHP 4.3.0.
 * @param string $domain Optional. Text domain. Unique identifier for retrieving translated strings.
 *                       Default 'default'.
 * @param float|int|string ...$formatValues
 *
 * @return string Translated text.
 */
function esc_html_f(
    string $format,
    string $domain = 'default',
    mixed ...$formatValues
): string {
    $translatedFormat = __($format, $domain);
    $translatedText = sprintf($translatedFormat, ...$formatValues);

    return esc_html($translatedText);
}