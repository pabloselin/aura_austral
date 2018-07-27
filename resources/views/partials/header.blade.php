<header class="banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col align-self-center">
				<a class="brand" href="{{ home_url('/') }}"><img src="{{ App\get_logo() }}" class="logo" /></a>
				
			</div>

			
			<div class="social col align-self-center">
				{{-- <a href="{{ App\get_instagram() }}"><i class="fab fa-instagram"></i></a> --}}
				<a href="#" class="toggle"><i class="fas fa-bars"></i></a>

				

			</div>
		</div>
	</div>
</header>
<nav class="nav-primary">
	<div class="container-fluid">
		<div class="row">

		<div class="col">
			<a class="brand" href="{{ home_url('/') }}"><img src="{{ App\get_logo('dark') }}" class="logo" /></a>
			@if (has_nav_menu('primary_navigation'))
			{!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
			@endif
			<a class="social-link" href="{{ App\get_instagram() }}"><i class="fab fa-instagram"></i></a>
		</div>
		<div class="col align-self-top"><a href="#" class="close"><i class="fas fa-times"></i></a></div>
		</div>
		
	</div>

</nav>
