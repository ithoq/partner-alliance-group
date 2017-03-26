<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Admin, Dashboard, Bootstrap" />
<link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
<title>{{ settings('app_name') }} - @yield('page-title', 'Page Title')</title>

<link rel="stylesheet" href="{{ asset('infinity_components/libs/bower/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('infinity_components/libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css') }}">
<!-- build:css ../assets/css/app.min.css -->
<link rel="stylesheet" href="{{ asset('infinity_components/libs/bower/animate.css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('infinity_components/libs/bower/fullcalendar/dist/fullcalendar.min.css') }}">
<link rel="stylesheet" href="{{ asset('infinity_components/libs/bower/perfect-scrollbar/css/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('infinity_components/assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('infinity_components/assets/css/core.css') }}">
<link rel="stylesheet" href="{{ asset('infinity_components/assets/css/app.css') }}">
<!-- endbuild -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
<script src="{{ asset('infinity_components/libs/bower/breakpoints.js/dist/breakpoints.min.js') }}"></script>
<script>
	Breakpoints();
</script>

<!-- Page CSS -->
@yield('page-css')