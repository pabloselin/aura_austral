<?php

namespace App;

use Sober\Controller\Controller;

class SingleEdiciones extends Controller
{

	public function principal() {
		global $post;
		$principal = (object) array(
			'id' => $post->ID,
			'title' => $post->post_title,
			'image' => get_the_post_thumbnail_url( $post->ID, 'medium' ),
			'link'  => get_permalink( $post->ID ),
			'type' => get_post_type_name($post->ID),
			'author' => get_the_author_meta( 'display_name', $post->post_author),
			'content' => $post->post_content,
			'excerpt' => $post->post_excerpt
		);

		return $principal;
	}
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
		$orden = get_post_meta( $postid, '_aau_edicion_orden', true);

		if($contenidos) {
			foreach($contenidos as $key=>$contenido) {

				$width = 'col-6';
					switch($key) {
				case(0):
					$width = 'col-md-12';
				break;
				default:
					$width = 'col-md-6';
				break;
				}
				$key++;
				$item = (object) array(
					'id'	=> $contenido->ID,
					'title' => $contenido->post_title,
					'image_homeitem' => get_the_post_thumbnail_url( $contenido->ID, 'medium' ),
					'image' => get_the_post_thumbnail_url( $contenido->ID, 'medium' ),
					'link'  => get_permalink( $contenido->ID ),
					'type'	=> get_post_type_name( $contenido->ID ),
					'author'=> get_the_author_meta( 'display_name',  $contenido->post_author),
					'width' => $width,
					'key'	=> 'numberitem-' . $key
				);
				$items[$contenido->ID] = $item;
			}
		}

		if($orden) {
			$items = array_replace(array_flip($orden), $items);
		}

		return $items;
	}
	
}
