<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="apple-touch-icon" href="{{asset('robust/app-assets/images/ico/apple-icon-120.png')}}">

    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/vendors.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/vendors/css/forms/selects/select2.min.css')}}">

    <!-- dropify CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/plugins/dropify/dist/css/dropify.min.css')}}">

    <!-- datatable css-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/vendors/css/charts/morris.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/vendors/css/extensions/unslider.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/vendors/css/weather-icons/climacons.min.css')}}">

    <!-- END VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/pages/login-register.min.css')}}">

    <!-- BEGIN ROBUST CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/app.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/vendors/css/calendars/fullcalendar.min.css')}}">

    <!-- END ROBUST CSS-->

    <!-- BEGIN Page Level CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/core/colors/palette-gradient.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/plugins/calendars/clndr.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/fonts/meteocons/style.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/plugins/calendars/fullcalendar.min.css')}}">

    <!-- END Page Level CSS-->

    <!-- BEGIN Custom CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('robust/assets/css/style.css')}}">
    <!-- END Custom CSS-->
    
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

	@include('Layout.menu')


	@yield('content')





    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

	<!--BEGIN VENDOR JS-->
    <script src="{{asset('robust/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('robust/app-assets/plugins/dropify/dist/js/dropify.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/extensions/moment.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/extensions/fullcalendar.min.js')}}"></script>

    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{asset('robust/app-assets/vendors/js/charts/raphael-min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/charts/morris.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/charts/chart.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/extensions/moment.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/extensions/underscore-min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/extensions/clndr.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/charts/echarts/echarts.js')}}"></script>

    <script src="{{asset('robust/app-assets/vendors/js/extensions/unslider-min.js')}}"></script>

    <!-- END PAGE VENDOR JS-->
    
    <!-- BEGIN ROBUST JS-->
    <script src="{{asset('robust/app-assets/js/core/app-menu.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/js/core/app.min.js')}}"></script>

    <script src="{{asset('robust/app-assets/js/scripts/customizer.min.js')}}"></script>

    

    <!-- END ROBUST JS-->

    <!-- BEGIN PAGE LEVEL JS-->
   
    <!-- END PAGE LEVEL JS-->



    <script type="text/javascript" src="{{asset('robust/app-assets/js/scripts/forms/select/form-select2.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('robust/app-assets/js/scripts/forms/form-login-register.min.js')}}"></script>
    
    <script type="text/javascript" src="{{asset('robust/app-assets/js/scripts/extensions/fullcalendar.min.js')}}"></script>

     <script src="{{asset('robust/app-assets/js/scripts/pages/dashboard-ecommerce.min.js')}}"></script>

    

    @yield('jsCode')


</body>
</html>