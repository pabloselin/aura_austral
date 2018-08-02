@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="ediciones-title">Ediciones</h1>  
  <div class="ediciones-content">
    <div class="row">
      @foreach($getediciones as $item)
        @include('partials.content-edicioncard')
      @endforeach
    </div>
  </div>
</div>
@endsection
