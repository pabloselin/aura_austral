<article @php(post_class())>
  <header class="carousel-title">
    <h1>{{ get_the_title() }}</h1>
    <div class="row no-gutters">
    <p class="author col">{{ get_the_author() }}</p>
    <a class="insta col" target="_blank" href="{{ App\build_instagram_url($fields['instagram'])}}"><i class="fab fa-instagram"></i> {{ $fields['instagram'] }}</a>
    </div>
  </header>
  <div id="aura_carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      @foreach($visual_gallery as $key=>$image)
      <div class="carousel-item @if($key === 0) active @endif">
        <img src=" {{ $image->large[0] }}" alt="" class="d-block">
        {{-- <div class="carousel-caption d-none d-md-block">
          <h5>{{ $image->title }}</h5>
          <p>{{ $image->legend }}</p>
        </div> --}}
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
  <div class="content-visual">
    <div class="entry-content-visual">
      <h1>{{ get_the_title() }}</h1> 
      <div class="row no-gutters">
      <span class="author col">{{ get_the_author() }}</span> <a class="insta col" target="_blank" href="{{ App\build_instagram_url($fields['instagram'])}}"><i class="fab fa-instagram"></i> {{ $fields['instagram'] }}</a>
      </div>
       {{ the_content() }}

      <span class="close"><i class="fas fa-times-circle"></i></span>
    </div>
  </div>
</article>
