@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row no-gutters">
      @foreach($home_items as $item)
        @include('partials.content-homeitem')
      @endforeach
    </div>
  </div>
@endsection
