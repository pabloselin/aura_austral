@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      @foreach($home_items as $item)
        @include('partials.content-homeitem')
      @endforeach
    </div>
  </div>
@endsection
