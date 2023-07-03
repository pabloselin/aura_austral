@extends('layouts.app')

@section('content')
<header class="container archive-header">
  <div class="row">
    <div class="col">
      <h1>{{ the_archive_title() }}</h1>
    </div>
  </div>
</header>
<div class="container">
  <div class="row">
    
      @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
      @endif

      @while (have_posts()) @php(the_post())
      @include('partials.content-archiveitem-' . get_post_type() )
      @endwhile

      {!! get_the_posts_navigation() !!}
    </div>
  
</div>
@endsection
