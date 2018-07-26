<article @php(post_class())>
  <header style="background-image: url({{$header_image[0]}}); background-repeat: no-repeat; background-size: cover">
    <div class="overlay">
      <div class="container">
        <h1 class="entry-title">{{ get_the_title() }}</h1>
        @include('partials/entry-meta')
      </div>
    </div>
  </header>
  <div class="container">
    <div class="entry-content">
      @php(the_content())
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
