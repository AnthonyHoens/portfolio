<?php

/* ****
 *  Return the attributes of an img
 * ****/

function dw_the_img_attributes($id, $sizes = []) {
    $src = wp_get_attachment_url($id);
    $thumbnail_meta =  get_post_meta($id);


    $sizes = array_map(function($size) use ($id) {
        $data = wp_get_attachment_image_src($id, $size);


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
        'supports' => array('title'),
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

