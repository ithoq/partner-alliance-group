	<!-- build:js ../assets/js/core.min.js -->
	<script src="{{ asset('infinity_components/libs/bower/jquery/dist/jquery.js') }}"></script>
	<script src="{{ asset('infinity_components/libs/bower/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('infinity_components/libs/bower/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
	<script src="{{ asset('infinity_components/libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js') }}"></script>
	<script src="{{ asset('infinity_components/libs/bower/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
	<script src="{{ asset('infinity_components/libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
	<script src="{{ asset('infinity_components/libs/bower/PACE/pace.min.js') }}"></script>
	<!-- endbuild -->

	<!-- build:js ../assets/js/app.min.js -->
	<script src="{{ asset('infinity_components/assets/js/library.js') }}"></script>
	<script src="{{ asset('infinity_components/assets/js/plugins.js') }}"></script>
	<script src="{{ asset('infinity_components/assets/js/app.js') }}"></script>
	
	<!-- endbuild -->
	<script src="{{ asset('infinity_components/libs/bower/moment/moment.js') }}"></script>
	<script src="{{ asset('infinity_components/libs/bower/fullcalendar/dist/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('infinity_components/assets/js/fullcalendar.js') }}"></script>
	
	<!-- Page Scripts -->
	@yield('page-scripts')