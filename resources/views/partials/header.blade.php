<header class="banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col align-self-center brand">
				<a class="logo" href="{{ home_url('/') }}"><img class="d-none d-lg-block d-md-block" src="{{ App\get_logo() }}" /> <img class="d-md-none d-lg-none d-sm-block isotipo" src="{{ App\get_mobile_logo() }}" /></a>	
			</div>
		</div>
			<div class="social">
				{{-- <a href="{{ App\get_instagram() }}"><i class="fab fa-instagram"></i></a> --}}
				<a href="#" class="toggle"><i class="fas fa-bars"></i></a>
			</div>
	</div>
</header>
<nav class="nav-primary">
	<div class="container-fluid">
		<div class="row">

		<div class="col">
			<a class="logo" href="{{ home_url('/') }}"><img src="{{ App\get_logo('dark') }}" /></a>
			@if (has_nav_menu('primary_navigation'))
			{!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
			@endif
			<a class="social-link" href="{{ App\get_instagram() }}"><i class="fab fa-instagram"></i></a>
		</div>
		<div class="col align-self-top"><a href="#" class="close"><i class="fas fa-times"></i></a></div>
		</div>
		
	</div>

</nav>
