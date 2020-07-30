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
    <link rel="apple-touch-icon" href="{{asset('robust/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/bootstrap-admin-template/robust/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/vendors.min.css')}}">
    
    <!-- END VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/pages/login-register.min.css')}}">
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/app.min.css')}}">
    <!-- END ROBUST CSS-->

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/core/menu/menu-types/vertical-menu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('robust/app-assets/css/core/colors/palette-gradient.min.css')}}">

    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('robust/assets/css/style.css')}}">
    <!-- END Custom CSS-->
    
</head>
<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">


	@yield('content')







    

	<!--BEGIN VENDOR JS-->
    <script src="{{asset('robust/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('robust/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('robust/app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('robust/app-assets/js/core/app.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('robust/app-assets/js/scripts/forms/form-login-register.min.js')}}"></script>

    @yield('jsCode')


</body>
</html>