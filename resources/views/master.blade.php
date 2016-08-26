<html>
<head>

</head>
<body>
<header>
 @if(Sentinel::check())
 	You are logged in. Username = {{Sentinel::getUser()->email}}
 	<a href='/logout'>Logout</a>
 @else
 	<a href='/login'>Login</a>
 @endif

</header>
<main>
@yield('content')

</main>
</body>
</html>
