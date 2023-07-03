@php($typeobj = get_post_type_object( get_post_type($post->ID) ))
<article class="plainitem col-lg-12"> 
  		<span class="post-type-name">
      {{ $typeobj->labels->name }}</span>
  		<h1><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h1>	
</article>
  