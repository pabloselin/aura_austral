@extends('layouts.app')
@section('content')
<div class="container">
  @while(have_posts()) @php(the_post())
    <div class="entry-content">
    	<div class="page-header">
    		<h1 class="entry-title"> @php(get_the_title()) </h1>
    	</div>

    	 @include('partials.content-page')
    </div>
  @endwhile
  </div>
@endsection
