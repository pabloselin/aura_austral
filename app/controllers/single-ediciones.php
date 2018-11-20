<?php

namespace App;

use Sober\Controller\Controller;

class SingleEdiciones extends Controller
{
	public function contenidos_edicion( $postid = null ) {
		if($postid == null) {
			global $post;
			$postid = $post->ID;
		}
		$args = array(
			'post_type' => 'any',
			'numberposts' => -1,
		);
		$args['meta_query'] = array(
			array(
				'key' => '_aau_edicion',
				'value' => $postid
			));
		$contenidos = get_posts($args);
		$items = [];

		if($contenidos) {
			foreach($contenidos as $contenido) {
				$item = (object) array(
					'title' => $contenido->post_title,
					'image' => get_the_post_thumbnail_url( $contenido->ID, 'medium' ),
					'link'  => get_permalink( $contenido->ID ),
					'type'	=> get_post_type_name( $contenido->ID ),
					'author'=> get_the_author_meta( 'display_name',  $contenido->post_author)
				);
				array_push($items, $item);
			}
		}

		return $items;
	}
	
}
