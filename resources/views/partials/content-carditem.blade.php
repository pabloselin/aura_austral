<article class="carditem col-md-4 {{ $item->key }}"> 
  	<div class="wrap-carditem">
  	<a href="{{$item->link}}">
  		<img src="{{ $item->image_homeitem }}" alt="{{ $item->title }}">
  		<span class="post-type-name">{{ $item->type }}</span>
  		<h1>{{ $item->title }}</h1>
  		@include('partials/entry-meta-plain', ['author' => $item->author])
  		
  	</a>
  	</div>
</article>
