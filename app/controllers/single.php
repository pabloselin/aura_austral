<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller
{
	public function header_image() {
		if(has_post_thumbnail()) {
			return wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', false);
		}
	}
}

// add_filter('sage/template/single/data', function (array $data) {
//     $data['header_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false);
//     return $data;
// });