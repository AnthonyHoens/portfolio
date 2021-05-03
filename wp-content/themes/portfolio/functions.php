<?php

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

function dw_custom_post_type() {
    register_post_type('project', [
        'label' => 'Projets',
        'labels' => [
            'name' => 'Projets',
            'singular_name' => 'Projet',
            'add_new' => 'Ajouter un projet',
            'add_new_item' => 'Ajouter un nouveau projet',
            'edit_item' => 'Modifier un projet',
            'new_item' => 'Nouveau projet',
        ],
        'description' => 'Tous les projets réalisés par Anthony Hoens.',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-code-standards',
        'rewrite' => [
            'slug' => 'project',
        ],
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

