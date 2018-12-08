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