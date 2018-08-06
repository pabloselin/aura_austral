<footer class="content-info">
	<div class="container-fluid">
		@php(dynamic_sidebar('sidebar-footer'))
		<div class="row no-gutters justify-content-end">
			<div class="col-md-4 seremi">
				@if(is_home())
				<img src="{{ get_template_directory_uri() . '/assets/images/logo_seremi.png' }}" alt="SEREMI">
				<p>
				<strong>Financia:</strong><br/>
				Fondo Nacional de Desarrollo Cultural y las Artes, Fondart Regional
				</p>	
				@endif
			</div>
		</div>
	</div>
</footer>
