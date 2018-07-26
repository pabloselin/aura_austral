<article @php(post_class())>
  <header class="carousel-title">
    <h1>{{ get_the_title() }}<h1>
  </header>
  <div id="aura_carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      @foreach($visual_gallery as $key=>$image)
      <div class="carousel-item @if($key === 0) active @endif">
        <img src=" {{ $image->large[0] }}" alt="" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block">
          <h5>{{ $image->title }}</h5>
          <p>{{ $image->legend }}</p>
        </div>
      </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#aura_carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#aura_carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
