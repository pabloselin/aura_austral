<?php

namespace App;

use Sober\Controller\Controller;

class Author extends Controller {
	public function author_name() {
		$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
		return $curauth;
	}
}