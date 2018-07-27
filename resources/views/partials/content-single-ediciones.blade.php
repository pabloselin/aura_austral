<article @php(post_class())>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <header class="ediciones">

        <h1 class="entry-title">{{ get_the_title() }}</h1>
          
        </header>

        <div class="entry-content">
          @php(the_content())
        </div>
      </div>
      <div class="col-5 align-self-top offset-md-1">
         
         @foreach($contenidos_edicion as $item)
          @include('partials.content-homeitem')
         @endforeach
        
      </div>
    </div>
  </div>
  


</article>
