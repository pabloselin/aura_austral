@extends('layouts.app')

@section('content')
  <div class="container-fluid">
  	<div class="row no-gutters featured-row">
  		@php( $item = array_shift($home_items))
  		@include('partials.content-homeitem')
  	</div>
    <div class="row">
      @php( $texts = array_slice($home_items,0, 3))
      @foreach($texts as $item)
        @include('partials.content-carditem')
      @endforeach
    </div>
    <div class="row">
      @php( $visuales = array_slice($home_items, 3, 2))
      @foreach($visuales as $item)
        @include('partials.content-homeitem')
      @endforeach
    </div>
  </div>
@endsection
