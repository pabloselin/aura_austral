
@section('content')
<div class="container-fluid">
  <div class="row no-gutters featured-row">
    @php( $item = $principal)
    @include('partials.content-mainedicion')
  </div>
<div class="viswrap">
  <div id="aura_visualizacion" data-url="@php(bloginfo('url'))" data-isglobal="false" data-edicion="@php(_e($post->post_name))">
  </div>
  <div class="toggle-vis"> <button class="btn btn-outline-light ver-vis"> <span class="show">Ver</span><span class="hide">Cerrar</span> mapa</button> </div>
</div>
   <div class="row">
      @php( $texts = array_slice($contenidos_edicion,0, 4))
      @foreach($texts as $item)
        @include('partials.content-carditem')
      @endforeach
    </div>
    <div class="row visuales-row">
      @php( $visuales = array_slice($contenidos_edicion, 4, 2))
      @foreach($visuales as $item)
        @include('partials.content-homeitem')
      @endforeach
    </div>

</div>


@endsection

