<article class="homeitem {{ $item->width }}" style="background-image:url({{ $item->image }})"> 
  	<a href="{{$item->link}}">
  		<h1>{{ $item->title }}</h1>
  		<span class="post-type-name">{{ $item->type }}</span>
  	</a>
</article>
