<article class="homeitem mainedicion {{ $item->width }} {{ $item->key }}"> 
  	<div class="wrap-homeitem" style="background-image:url({{ $item->image }})">
  		<div class="editorial-numero">
	  		<h1>{{ $item->title }}</h1>
	  		<button class="show-intro btn btn-outline-light">+ Leer editorial</button>
	  		<div class="content-main">
	  			@php( _e(apply_filters('the_content', $item->content)))
	  		</div>
  		</div>
  	</div>
</article>
