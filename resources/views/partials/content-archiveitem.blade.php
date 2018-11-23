<article class="carditem col-lg-6 archiveitem"> 
  	<div class="wrap-carditem">
  	<a href="{{ get_permalink() }}">
      @if(has_post_thumbnail(  ))
  		  <img src="{{ get_the_post_thumbnail_url( null, 'medium' ) }}" alt="{{ get_the_title() }}">
      @endif
  		<h1>{{ get_the_title() }}</h1>
  		<p class="byline author vcard plain">
				{{ __('By', 'sage') }}
				{{ get_the_author() }}
			</p>	
  	</a>
  	</div>
</article>
