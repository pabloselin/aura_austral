<article class="homeitem {{ $item->width }} {{ $item->key }}"> 
  	<div class="wrap-homeitem" style="background-image:url({{ $item->image }})">
  	<a href="{{$item->link}}">
  		<h1>{{ $item->title }}</h1>
  		@include('partials/entry-meta-plain', ['author' => $item->author])
  	</a>
  	</div>
</article>
