<nav class="nav-primary">
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<a class="logo-nav" href="{{ home_url('/') }}"><img src="{{ App\get_logo('dark') }}" /></a>
			</div>
			<div class="col align-self-top"><a href="#" class="close"><i class="fas fa-times"></i></a></div>
		</div>
	</div>
	<div class="container lastnumber">
		<div class="row">
			<div class="col-md-10">
				<div class="row">
			<div class="col">
				<h1 class="lastnumber-title">{{ $navitems['number_title'] }}</h1>
			</div>
		</div>
		<div class="row no-gutters">
			@foreach( $navitems['content'] as $item)
				@include('partials.content-editem-nav')
			@endforeach
		</div>
			</div>
			<div class="col-md-2 menus-top">
			
				
				<a href="{{ home_url('/') }}" class="link-home"><i class="fa fa-home"></i></a>

				@if (has_nav_menu('primary_navigation'))
				{!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
				@endif
				
			
				@if (has_nav_menu('secondary_navigation'))
					{!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav']) !!}
				@endif

				<a class="social-link" href="{{ App\get_instagram() }}"><i class="fab fa-instagram"></i></a>
			</div>
		
	
		</div>
		
		
		
		
	</div>
</nav>