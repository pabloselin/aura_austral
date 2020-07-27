@extends('layouts.app')
@section('content')
<div class="container">
  @include('partials.page-header')
  @while(have_posts()) @php(the_post())
    <div class="entry-content">
    	@include('partials.content-page')
    </div>
  @endwhile
  </div>
@endsection
