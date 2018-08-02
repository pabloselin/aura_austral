<?php

namespace App;

use Sober\Controller\Controller;

class ArchiveEdiciones extends Controller {
	public function getediciones() {
		$ediciones_content = [];
		$args = array(
					'numberposts' => -1,
					'post_type' => 'ediciones',
					'post_status' => 'any',
					'orderby' => 'date',
					'order' => 'ASC'
				);
		$ediciones = get_posts($args);

		if($ediciones) {
			foreach($ediciones as $edicion) {
				$item = (object) array(
					'title' => $edicion->post_title,
					'link'  => get_permalink($edicion->ID),
					'image' => get_the_post_thumbnail_url( $edicion->ID, 'medium' ),
					'status' => $edicion->post_status,
					'month' => get_the_date( 'F Y', $edicion->ID ),

 				);

 				array_push($ediciones_content, $item);
			}
			return $ediciones_content;
		}
	}
}