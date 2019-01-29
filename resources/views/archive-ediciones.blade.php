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
<div class="viswrap">
  <div id="aura_visualizacion" data-url="@php(bloginfo('url'))" data-isglobal="true">
  </div>
  <div class="toggle-vis"> <button class="btn btn-outline-light ver-vis"> <span class="show">Ver</span><span class="hide">Cerrar</span> mapa</button> </div>
</div>
@endsection
