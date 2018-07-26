<header class="banner">
	<div class="container">
		<div class="row">
			<div class="col">
				<a class="brand" href="{{ home_url('/') }}"><img src="{{ App\get_logo() }}" class="logo" /></a>
				<nav class="nav-primary">
					@if (has_nav_menu('primary_navigation'))
					{!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
					@endif
				</nav>
			</div>
			<div class="social col align-self-center">
				<a href="{{ App\get_instagram() }}"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
	</div>
</header>
