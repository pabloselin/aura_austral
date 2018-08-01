@extends('layouts.app')

@section('content')
  <div class="container-fluid">
  	<div class="row no-gutters featured-row">
  		@php( $item = array_shift($home_items))
  		@include('partials.content-homeitem')
  	</div>
    <div class="row">
      @foreach($home_items as $item)
        @include('partials.content-carditem')
      @endforeach
    </div>
  </div>
@endsection
