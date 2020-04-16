<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href=" {{ asset('css/fonts.css') }} ">
	<link rel="stylesheet" href=" {{ asset('css/app.css') }} ">
	<link rel="stylesheet" href=" {{ asset('iconfonts/flaticon.css') }} ">

	<title>AsientosApp | @yield('title')</title>
</head>
<body>	
	@include('layout.navigation')
	@yield('content')
</body>
</html>