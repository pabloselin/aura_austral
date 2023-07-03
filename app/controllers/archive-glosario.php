<?php

namespace App;

use Sober\Controller\Controller;

class ArchiveGlosario extends Controller {
	public function glosario_content() {
		$glosario_content = [];
		$args = array(
					'numberposts' => -1,
					'post_type' => 'glosario',
					'post_status' => 'any',
					'orderby' => 'name',
					'order' => 'ASC'
				);
		$glosario = get_posts($args);

		if($glosario) {
			foreach($glosario as $word) {
				$item = (object) array(
					'title' => $word->post_title,
					'link'  => get_permalink($word->ID),
					'content' => apply_filters('the_content', $word->post_content)

 				);

 				array_push($glosario_content, $item);
			}
			return $glosario_content;
		}
	}
}