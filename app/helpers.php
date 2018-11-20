<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    if (remove_action('wp_head', 'wp_enqueue_scripts', 1)) {
        wp_enqueue_scripts();
    }

    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                        "{$template}.blade.php",
                        "{$template}.php",
                    ];
                });
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

function get_menus($menu) {
    /**
     * Obtiene items de un objeto de menú
     */
        $menuobject = get_menu_object($menu);
        if($menuobject) {
        //Si tengo un objeto menú me devuelve el objeto y empiezo a recolectar items
            $items = wp_get_nav_menu_items( $menuobject->term_id );
            return $items;
        } else {
            //Si no hay hago un llamado independiente por sección
            return false;
        }
}

function get_menu_object($location) {
    /**
     * Obtiene el menú desde una ubicación escogida
     */
    if( ( $locations = get_nav_menu_locations() ) && isset($locations[$location]) ){
        $menu = wp_get_nav_menu_object( $locations[$location] );
        return $menu;
    } else {
        return false;
    }
}

function get_instagram() {
    return 'https://www.instagram.com/auraaustral.cl/';
}

function get_facebook() {
    return 'https://web.facebook.com/AuraAustral.cl/';
}

function get_mail() {
    return 'auraaustral.cl@gmail.com';
}

function get_post_type_name( $postid ) {
    $ptypeobj = get_post_type_object( get_post_type( $postid ) );
    return $ptypeobj->labels->name;
}

function get_logo( $color = null ) {
    if(is_singular(['glosario', 'post']) || is_page() || is_archive() || is_404() || is_search() || $color === 'dark' ) {
        return get_template_directory_uri() . '/assets/images/aura_austral.png';
    } else if(is_singular('visual')) {
        return get_template_directory_uri() . '/assets/images/aura_mini_blanco.png';
    } else {
        return get_template_directory_uri() . '/assets/images/aura_austral_blanco.png';
    }
}

function get_mobile_logo( $color = null ) {
    if(is_singular(['glosario', 'post']) || is_page() || is_archive() || is_404() || is_search() || $color === 'dark' ) {
        return get_template_directory_uri() . '/assets/images/aura_mini.png';
    } else {
        return get_template_directory_uri() . '/assets/images/aura_mini_blanco.png';
    }
}

function build_instagram_url( $user ) {
    return 'https://instagram.com/' . $user;
}

add_action( 'wp_head', function() {
     global $post;
    $css = get_post_meta( $post->ID, '_aau_customcss', true );
    if($css && is_singular( 'ediciones' )) {
        echo '<style>' . $css . '</style>';
    }
});
