<article @php(post_class())>
  <div class="container">
    <div class="entry-content">
  <header class="post-single">
        <h1 class="entry-title">{{ get_the_title() }}</h1>
        <span class="date">{{ get_the_date() }}</span>
  </header>
  
    
      @php(the_content())
    </div>
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
