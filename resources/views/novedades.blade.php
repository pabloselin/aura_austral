{{--
  Template Name: Novedades
  --}}

  @extends('layouts.app')

  @section('content')
  @while(have_posts()) @php(the_post())
  @include('partials.page-header')

  @endwhile
  
  <div class="container">
  	<div class="row">
  		@foreach($postitems as $item)
  		<article class="carditem col archiveitem"> 
  			<div class="wrap-carditem">
  				<a href="{{ $item->link }}">
					<span class="date">{{ $item->date }}</span>
  					<h1>{{ $item->title }}</h1>
  				</a>
  			</div>
  		</article>

  		@endforeach
  	</div>
  </div>

  @endsection
