<?php

namespace App;

use Sober\Controller\Controller;

class PageTemplateNovedades extends Controller
{
	public function postitems() {
		$content = [];
		$posts = get_posts( array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'numberposts' => -1
			)
		);

		foreach( $posts as $post ) {
			$postdata = (object) array(
				'title' => $post->post_title,
				'legend' => $post->post_content,
				'link' => get_permalink($post->ID),
				'date' => get_the_date( get_option('date_format'), $post->ID )
				);
			array_push($content, $postdata);
		}
		return $content;
	}
}
