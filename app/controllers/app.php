<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public function lastnumber() {
        $lastnumber = [];

        $args = array('post_type' => 'ediciones', 'post_status' => 'publish');

        $lastedicion = get_posts($args);

        $lastnumber['title'] = $lastedicion[0]->post_title;

        return $lastnumber;
        
    }

    public function taxtree() {
        /* Busca todas las taxonomías y devuelve una lista de los contenidos en cada taxonomía separados por números */
        $taxtree = array();

        $taxonomies = get_taxonomies( array(
            '_builtin'  => false,
            'public'    => true
        ));
        $ediciones = get_posts( array(
            'post_type' => 'ediciones',
            'numberposts' => -1
        ));
        if($taxonomies && $ediciones) {
            foreach($ediciones as $edicion) {
                    $articulos_edicion = get_posts(array(
                        'post_type' => 'any',
                        'post_status' => 'publish',
                        'numberposts' => -1,
                        'meta_value' => $edicion->ID,
                        'meta_key'   => '_aau_edicion'
                    ));

                    if($articulos_edicion) {
                        foreach($articulos_edicion as $articulo) {
                            
                            foreach($taxonomies as $taxonomy) {

                            $terms = get_the_terms( $articulo->ID, $taxonomy );
                            $terms_width_edges = array();

                            foreach($terms as $term) {
                                $taxtree[$edicion->post_name][$taxonomy]['elements'][] = array(
                                    'group' => 'edges',
                                    'data' => array(
                                        'id' => 'edge-article-' . $term->term_id . '-' . $articulo->ID,
                                        'source' => $term->term_id,
                                        'target' => 'articulo-' . $articulo->ID 
                                    )
                                );
                                $terms_width_edges[] = $term->term_id;
                            }

                            $thumb = get_post_thumbnail_id( $articulo->ID );
                            $thumbsrc = wp_get_attachment_image_src( $thumb, 'thumbnail' );
                            

                            $taxtree[$edicion->post_name][$taxonomy]['elements'][] = array(
                                'group' => 'nodes',
                                'data' => array(
                                    'postid' => $articulo->ID,
                                    'id' => 'articulo-' . $articulo->ID,
                                    'name' => $articulo->post_title,
                                    'link'  => get_permalink($articulo->ID),
                                    'slug'  => $articulo->post_name,
                                    'type'  => 'articulo',
                                    'img'   => $thumbsrc
                                )
                            );
                            }
                        }
                    }
                foreach($taxonomies as $taxonomy) {
                    $taxobj = get_taxonomy( $taxonomy );
                    $terms = get_terms( array('taxonomy' => $taxonomy, 'hide_empty' => true ));
                        $taxtree[$edicion->post_name][$taxonomy]['tax_label'] = $taxobj->label;
                        $taxtree[$edicion->post_name][$taxonomy]['elements'][] = array(
                                                                        'group' => 'nodes',
                                                                        'data'  => array(
                                                                                    'name' => $edicion->post_title,
                                                                                    'id'   => 'edicion-' . $edicion->post_name,
                                                                                    'type' => 'edicion'
                                                                                ),
                                                                        'position' => array('x' => 10, 'y' => 10)
                                                                        );
                    foreach($terms as $term) {
                        $termarts = array();
                        
                            $taxtree[$edicion->post_name][$taxonomy]['elements'][] = array(
                                                                            'group' => 'nodes',
                                                                            'data' => array(
                                                                                    'name' => $term->name,
                                                                                    'slug' => $term->slug,
                                                                                    'id'   => $term->term_id,
                                                                                    'type' => 'term'
                                                                                    )        
                                                                            );
                            }
                    
                }
            }
        }

        return $taxtree;
    }

    public static function globaltaxtree() {
         $globaltaxtree = array();

        $taxonomies = get_taxonomies( array(
            '_builtin'  => false,
            'public'    => true
        ));
        
        if($taxonomies) {
                    $articulos_edicion = get_posts(array(
                        'post_type' => array('artistas', 'obras', 'arq_imaginarias', 'cronicas_territorio', 'entrevistas', 'visual', 'glosario', 'critica_cultural'),
                        'post_status' => 'publish',
                        'numberposts' => -1,
                    ));

                    if($articulos_edicion) {
                        foreach($articulos_edicion as $articulo) {

                            $numero = get_post_meta($articulo->ID, '_aau_edicion', true);
                            
                            foreach($taxonomies as $taxonomy) {

                            $terms = get_the_terms( $articulo->ID, $taxonomy );
                            $terms_width_edges = array();

                            foreach($terms as $term) {
                                $globaltaxtree[$taxonomy]['elements'][] = array(
                                    'group' => 'edges',
                                    'data' => array(
                                        'id' => 'edge-article-' . $term->term_id . '-' . $articulo->ID,
                                        'source' => $term->term_id,
                                        'target' => 'articulo-' . $articulo->ID,
                                        'numero' => $numero
                                    )
                                );
                                $terms_width_edges[] = $term->term_id;
                            }

                            $thumb = get_post_thumbnail_id( $articulo->ID );
                            $thumbsrc = wp_get_attachment_image_src( $thumb, 'thumbnail' );
                            

                            $globaltaxtree[$taxonomy]['elements'][] = array(
                                'group' => 'nodes',
                                'data' => array(
                                    'postid' => $articulo->ID,
                                    'id' => 'articulo-' . $articulo->ID,
                                    'name' => $articulo->post_title,
                                    'numero' => get_the_title($numero),
                                    'numeroID' => $numero,
                                    'link'  => get_permalink($articulo->ID),
                                    'slug'  => $articulo->post_name,
                                    'type'  => 'articulo',
                                    'img'   => $thumbsrc
                                )
                            );
                            }
                        }
                    }
                foreach($taxonomies as $taxonomy) {
                    $taxobj = get_taxonomy( $taxonomy );
                    $terms = get_terms( array('taxonomy' => $taxonomy, 'hide_empty' => true ));
                        $globaltaxtree[$taxonomy]['tax_label'] = $taxobj->label;
                        $globaltaxtree[$taxonomy]['elements'][] = array(
                                                                        'group' => 'nodes',
                                                                        'data'  => array(
                                                                                    'name' => $edicion->post_title,
                                                                                    'id'   => 'edicion-' . $edicion->post_name,
                                                                                    'type' => 'edicion'
                                                                                ),
                                                                        'position' => array('x' => 10, 'y' => 10)
                                                                        );
                    foreach($terms as $term) {
                        $termarts = array();
                        
                            $globaltaxtree[$taxonomy]['elements'][] = array(
                                                                            'group' => 'nodes',
                                                                            'data' => array(
                                                                                    'name' => $term->name,
                                                                                    'slug' => $term->slug,
                                                                                    'id'   => $term->term_id,
                                                                                    'type' => 'term'
                                                                                    )        
                                                                            );
                            }
                    
                }
        }

        return $globaltaxtree;

    }

    public  static function taxtreetransient() {
        // Get any existing copy of our transient data
        if ( false === ($taxtree = get_transient( 'taxtree' ) ) ) {
            // It wasn't there, so regenerate the data and save the transient
            $taxtree = App::taxtree();

            if('WP_ENV' == 'development') 
            {
                $transient_expires = 1;
            }
            else {
                $transient_expires = 12 * HOUR_IN_SECONDS;
            }

                set_transient( 'taxtree', $taxtree, $transient_expires );
            
        }

       return $taxtree;
    }

    public  static function globaltaxtreetransient() {
        // Get any existing copy of our transient data
        if ( false === ($taxtree = get_transient( 'globaltaxtree' ) ) ) {
            // It wasn't there, so regenerate the data and save the transient
            $taxtree = App::globaltaxtree();

            if('WP_ENV' == 'development') 
            {
                $transient_expires = 1;
            }
            else {
                $transient_expires = 12 * HOUR_IN_SECONDS;
            }

                set_transient( 'globaltaxtree', $taxtree, $transient_expires );
            
        }

       return $taxtree;
    }

    public function ediciones() {
        $args = array( 'post_type' => 'ediciones', 'post_status' => 'publish');

        $ediciones = get_posts($args);
        $ediciones_data = [];
        foreach($ediciones as $key=>$edicion) {
            $ediciones_data[$key]['link'] = get_permalink($edicion->ID);
            $ediciones_data[$key]['title'] = $edicion->post_title;
            $ediciones_data[$key]['id'] = $edicion->ID;
            $ediciones_data[$key]['fecha'] = mysql2date( 'F Y', $edicion->post_date, true );
            $ediciones_data[$key]['content'] = SingleEdiciones::contenidos_edicion($edicion->ID);

        }

        return $ediciones_data;
    }

    public function navitems() {
        $navitems = [];
        $navitems['ediciones'] = App::ediciones();
        return $navitems;
    }
}