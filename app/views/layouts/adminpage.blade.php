<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	{{ HTML::style('assets/css/backend/bootstrap.css') }}
	{{ HTML::style('assets/css/backend/main.css') }}
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container">
			<a href="/" class="navbar-brand">Loja</a>
			<ul class="nav navbar-nav navbar-right">
		        <li>{{ link_to('admin/categories/index', 'Categories')}}</li>
				<li>{{ link_to('admin/products/index', 'Products')}}</li>
		    </ul>
		</div>
	</div>
	@if(Session::has('message'))
		<div class="alert alert-info" role="alert">{{ Session::get('message') }}</div>
	@endif

	@yield('content')
</body>
</html>