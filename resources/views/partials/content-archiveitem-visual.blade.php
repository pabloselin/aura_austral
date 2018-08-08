<article class="archiveitem-visual col-md-6"> 
	<div class="wrap-archiveitem" style="background-image:url({{ get_the_post_thumbnail_url( null, 'medium' ) }});">
		<a href="{{ get_permalink() }}">
			<h1>{{ get_the_title() }}</h1>
			
			<p class="byline author vcard plain">
				{{ __('By', 'sage') }}
				{{ get_the_author() }}
			</p>

		</a>
	</div>
</article>
