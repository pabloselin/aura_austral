<article @php(post_class()) style="background-image:url({{ get_the_post_thumbnail_url( null, 'large' ) }});">
  <div class="container">
    <div class="row">
      <div class="col">
        <header class="ediciones">
          <h1 class="entry-title"><a href="{{get_permalink()}}">{{ get_the_title() }}</a></h1>
        </header>

        <div class="entry-content excerpt">
          {{ $navitems['number_excerpt'] }}
       
          <div class="fullcontent">
            {{ the_content() }}
          </div>
          
         </div>
        <p class="more-section">
        <button class="btn continue">Seguir leyendo</button>
        </p>
      </div>
    </div>
    <div class="row">
         @foreach($contenidos_edicion as $item)
            @include('partials.content-editem')
         @endforeach
    </div>
  </div>
</article>

<div class="visualizacion_trigger"><i class="fas fa-project-diagram"></i></div>

<div class="visualizacion_wrapper">
  <div class="visualizacion_close"><i class="fas fa-times"></i></div>
  <div id="aura_visualizacion" data-url="@php(bloginfo('url'))" data-edicion="@php(_e($post->post_name))"></div>
</div>