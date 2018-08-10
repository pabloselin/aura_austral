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

        
        if($lastedicion) {
            $contenidos_edicion = SingleEdiciones::contenidos_edicion($lastedicion[0]->ID);
            $lastnumber['content'] = $contenidos_edicion;
        }

        return $lastnumber;
        
    }

    public function navitems() {
        $navitems = [];
        $homeitems = FrontPage::home_items();
        $first_item = array_shift($homeitems);
        $navitems['number_title'] = $first_item->title;
        $navitems['number_excerpt'] = $first_item->excerpt;
        $navitems['number_link'] = $first_item->link;
        $navitems['content'] = $homeitems;
        

        return $navitems;
    }
}