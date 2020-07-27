<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' <span class="excerpt-more">&hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a></span>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
});




add_action('init', function() {
    global $wp_rewrite;
    $author_slug = 'autoria'; // change slug name
    $wp_rewrite->author_base = $author_slug;
});
 
add_action( 'admin_menu', function() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Novedades';
    $submenu['edit.php'][5][0] = 'Novedades';
    $submenu['edit.php'][10][0] = 'Añadir Novedad';
    $submenu['edit.php'][16][0] = 'Novedades Tags';
} );
add_action( 'init', function() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Novedades';
    $labels->singular_name = 'Novedad';
    $labels->add_new = 'Añadir Novedades';
    $labels->add_new_item = 'Añadir Novedades';
    $labels->edit_item = 'Editar Novedades';
    $labels->new_item = 'Novedades';
    $labels->view_item = 'Ver Novedades';
    $labels->search_items = 'Buscar Novedades';
    $labels->not_found = 'No se encontraron Novedades';
    $labels->not_found_in_trash = 'No hay Novedades en la papelera';
    $labels->all_items = 'Todas las Novedades';
    $labels->menu_name = 'Novedades';
    $labels->name_admin_bar = 'Novedades';
} );

// BAD filter
// add_action('pre_get_posts', function($query) {
//      //gets the global query var object
//     global $wp_query;
    
//     if ( !$query->is_main_query() )
//         return;

//     if(is_author( )) {
//         $query->set('post_type' ,'any');
//         //we remove the actions hooked on the '__after_loop' (post navigation)
//         remove_all_actions ( '__after_loop');    
//     } 
// });