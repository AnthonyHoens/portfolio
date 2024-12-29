<?php

if (!defined('THEME_TEXT_DOMAIN')) define('THEME_TEXT_DOMAIN', 'portfolio');

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

/**
 * Build the image attributes of an img ID.
 *
 * @param int $id
 * @param string[] $sizes
 * @return string
 */
function dw_the_img_attributes(int $id, array $sizes = []): string
{
    $src = wp_get_attachment_url($id);
    $thumbnail_meta = get_post_meta($id);

    $sizes = array_map(function ($size) use ($id, $src) {
        $data = wp_get_attachment_image_src($id, $size);

        if (is_null($src)) {
            $src = $data[0];
        }

        return $data[0] . ' ' . $data[1] . 'w';
    }, $sizes);

    $srcset = implode(', ', $sizes);
    $alt = $thumbnail_meta['_wp_attachment_image_alt'][0] ?? null;

    return 'src="' . $src . '" srcset="' . $srcset . '" alt="' . $alt . '"';
}

/**
 * Get the menu.
 *
 * @param string $location
 * @return stdClass[]
 */
function dw_menu(string $location): array
{
    $locations = get_nav_menu_locations();
    $menu = $locations[$location];

    $links = wp_get_nav_menu_items($menu);

    return array_map(function ($post) {
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
}

/**
 * Return a compiled asset's URI
 *
 * @param string $path
 * @return string
 */
function dw_asset(string $path): string
{
    return rtrim(get_template_directory_uri(), '/') . '/public/' . ltrim($path, '/');
}

/**
 * Register project custom post type
 *
 * @return void
 */
function dw_custom_post_type(): void
{
    register_post_type('project', [
        'label' => esc_html__('Projects', THEME_TEXT_DOMAIN),
        'labels' => [
            'singular_name' => esc_html__('Project', THEME_TEXT_DOMAIN),
            'add_new' => esc_html__('Add a project', THEME_TEXT_DOMAIN),
            'add_new_item' => esc_html__('Add a new project', THEME_TEXT_DOMAIN),
            'edit_item' => esc_html__('Modify a project', THEME_TEXT_DOMAIN),
            'new_item' => esc_html__('New project', THEME_TEXT_DOMAIN),
        ],
        'description' => esc_html__('All projects realised by Anthony Hoens.', THEME_TEXT_DOMAIN),
        'public' => true,
        'has_archive' => true,
        'menu_position' => 5,
        'supports' => ['title'],
        'menu_icon' => 'dashicons-code-standards',
        'rewrite' => [
            'slug' => 'projects',
        ],
    ]);

    register_taxonomy(
        'project-owner',
        'project',
        [
            'label' => esc_html__('Projects realised by', THEME_TEXT_DOMAIN),
            'labels' => [
                'singular_name' => esc_html__('Project realised by', THEME_TEXT_DOMAIN),
                'add_new' => esc_html__('Add a project realised by', THEME_TEXT_DOMAIN),
                'add_new_item' => esc_html__('Add a new project realised by', THEME_TEXT_DOMAIN),
                'edit_item' => esc_html__('Modify a project realised by', THEME_TEXT_DOMAIN),
                'new_item' => esc_html__('New project realised by', THEME_TEXT_DOMAIN),
            ],
            'has_archive' => true,
        ]
    );
}

add_action('init', 'dw_custom_post_type');

/**
 * Register navigations menus
 *
 * @return void
 */
function dw_custom_navigation_menus(): void
{
    register_nav_menus([
        'main' => esc_html__('Main Navigation', THEME_TEXT_DOMAIN),
    ]);
}

add_action('init', 'dw_custom_navigation_menus');

/**
 * Disable Gutenberg Editor
 *
 * @return bool
 */
function disable_gutenberg_editor(): bool
{
    return false;
}

add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");

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
    mixed  ...$formatValues
): string
{
    $translatedFormat = __($format, $domain);
    $translatedText = sprintf($translatedFormat, ...$formatValues);

    return esc_html($translatedText);
}

/**
 * Allow SVG
 */
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext' => $filetype['ext'],
        'type' => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

function fix_svg(): void
{
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}

add_action('admin_head', 'fix_svg');

/**
 * Insert acf fields.
 */
add_action('acf/include_fields', function () {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(field_group: array(
        'key' => 'about_page',
        'title' => 'About Page',
        'fields' => array(
            array(
                'key' => 'about_text',
                'label' => 'About text',
                'name' => 'about_text',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'allow_in_bindings' => 0,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'about_img',
                'label' => 'About Image',
                'name' => 'about_img',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'passion_text',
                'label' => 'Passion Text',
                'name' => 'passion_text',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'allow_in_bindings' => 0,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'passion_img',
                'label' => 'Passion Image',
                'name' => 'passion_img',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page',
                    'operator' => '==',
                    'value' => '6',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

    acf_add_local_field_group(array(
        'key' => 'single_projects',
        'title' => 'Single Projects',
        'fields' => array(
            array(
                'key' => 'cover_img',
                'label' => 'Cover Image',
                'name' => 'cover_img',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'subtitle',
                'label' => 'SubTitle',
                'name' => 'subtitle',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'allow_in_bindings' => 0,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'description',
                'label' => 'Description',
                'name' => 'description',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'allow_in_bindings' => 0,
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'short_description',
                'label' => 'Short Description',
                'name' => 'short_description',
                'aria-label' => '',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'allow_in_bindings' => 0,
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
            array(
                'key' => 'description_image',
                'label' => 'Description Image',
                'name' => 'description_image',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'logo',
                'label' => 'Project Logo',
                'name' => 'logo',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'link',
                'label' => 'Link',
                'name' => 'link',
                'aria-label' => '',
                'type' => 'link',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'allow_in_bindings' => 0,
            ),
            array(
                'key' => 'design_img_computer',
                'label' => 'Design Image Computer',
                'name' => 'design_img_computer',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'design_img_phone',
                'label' => 'Design Image Phone',
                'name' => 'design_img_phone',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'id',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'project',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
});

