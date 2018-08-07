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
    <div class="col">
      @foreach($glosario_content as $item)
        @include('partials.content-archiveitem-glosario' )
      @endforeach
    </div>
  </div>
</div>
@endsection
