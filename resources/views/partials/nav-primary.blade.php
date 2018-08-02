<nav class="nav-primary">
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<a class="logo" href="{{ home_url('/') }}"><img src="{{ App\get_logo('dark') }}" /></a>
			</div>
			<div class="col align-self-top"><a href="#" class="close"><i class="fas fa-times"></i></a></div>
		</div>
		
		<div class="row">
			<div class="col offset-md-1">
				@if (has_nav_menu('primary_navigation'))
				{!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
				@endif
				
			</div>
			<div class="col">
				@if (has_nav_menu('secondary_navigation'))
					{!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav']) !!}
				@endif

				<a class="social-link" href="{{ App\get_instagram() }}"><i class="fab fa-instagram"></i></a>
			</div>
		
		</div>
		
	</div>

</nav>