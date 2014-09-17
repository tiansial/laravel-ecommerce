<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BrandX</title>
	{{ HTML::style('assets/css/frontend/bootstrap.css') }}
	{{ HTML::style('assets/css/frontend/main.css') }}
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

	<!--<div class="navbar navbar-default navbar-fixed-top ">
		<div class="container ">
			<div class="brand">
				<a href="#">{{HTML::image('assets/pngs/brand.png', null, ['width' => '60'])}}</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
			        <li><a href="#">Link</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li class="divider"></li>
			            <li><a href="#">Separated link</a></li>
			          </ul>
			        </li>
			      </ul>



		</div>
	</div>-->
	@if(Auth::check())
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="container">
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
				<li><a href="#">{{Auth::user()->firstname}}</a></li>
				<li><a href="#">Sair</a></li>
				</ul>
				<ul class="nav navbar-nav">
					<li><a href="/">Explorar</a></li>
					<li>{{HTML::link_to_route('/store/products')}}</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<button type="button" class="btn btn-default navbar-btn"><i class="fa fa-shopping-cart"></i> Carrinho</button>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<div class="navbar-form" style="width:350px; margin-right:20px;">
						{{ Form::open(array('url' => 'store/search', 'method' => 'get', 'class'=>'input-group')) }}
						{{Form::text('keyword', null, array('placeholder' => '', 'class'=>'form-control'))}}
						<div class="input-group-btn">{{Form::submit('Procurar', array('class'=>'btn btn-default'))}}</div>
						{{Form::close()}}
					</div>
				</ul>

			</div>
		</div>
	</div>
	 @else
	 	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	 		<div class="navbar-header">
	 			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
	 				<span class="sr-only">Toggle navigation</span>
	 				<span class="icon-bar"></span>
	 				<span class="icon-bar"></span>
	 				<span class="icon-bar"></span>
	 			</button>
	 		</div>
			<div class="container">
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
								<li><a href="#">Registar</a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Entrar <b class="caret"></b></a>
									<ul class="dropdown-menu" style="padding: 15px;min-width: 250px;">
										<li>
											<div class="row">
												<div class="col-md-12">
													<form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
														<div class="form-group">
															<label class="sr-only" for="exampleInputEmail2">Email</label>
															<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" required>
														</div>
														<div class="form-group">
															<label class="sr-only" for="exampleInputPassword2">Password</label>
															<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
														</div>
														<div class="checkbox">
															<label>
																<input type="checkbox"> Lembrar
															</label>
														</div>
														<div class="form-group">
															<button type="submit" class="btn btn-default btn-block">Entrar</button>
														</div>
													</form>
												</div>
											</div>
										</li>

									</ul>
								</li>
					</ul>
					<ul class="nav navbar-nav">
						<li>{{HTML::link('/', 'Explorar')}}</li>
						<li>{{ HTML::link('/store/products', 'Produtos')}}</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<div class="navbar-form" style="width:350px; margin-right:20px;">
								{{ Form::open(array('url' => 'store/search', 'method' => 'get', 'class'=>'input-group')) }}
								{{Form::text('keyword', null, array('placeholder' => '', 'class'=>'form-control'))}}
								<div class="input-group-btn">{{Form::submit('Procurar', array('class'=>'btn btn-default'))}}</div>
								{{Form::close()}}
						</div>
					</ul>

				</div>
			</div>
		@endif
	</div>

	<div class="container">
		<div class="row">
			<div class="buyoptions">
				<div class="col-md-6 col-xs-12 options1">
					<a href="#">Trending</a>
					<a href="#">Mais Popular</a>
					<a href="#">Novo</a>
				</div>
				<div class="col-md-6 col-xs-12 text-right options2">
					<a href="">Tudo</a>
					<a href="">Menos que 10€</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container popup">
		<div class="alert alert-info" role="alert">
			<h1 class="text-center">Descubra os nossos produtos espectaculares, todos disponíveis na nossa loja.</h1>
				<div class="row">
					<a href="#" class="col-md-4 col-sm-12 col-xs-12">
						<div class="popup-card">
							<strong>Explore</strong> as nossas categorias.
						</div>
					</a>
					<a href="#" class="col-md-4 col-sm-12 col-xs-12">
						<div class="popup-card">
							<strong>Conheça</strong> melhor o que fazemos.
						</div>
					</a>
					<a href="#" class="col-md-4 col-sm-12 col-xs-12">
						<div class="popup-card">
							<strong>Subscreva</strong> a nossa newsletter.
						</div>
					</a>
				</div>
		</div>
	</div>
	@yield('search')
	@yield('content')
	<div class="container">
		<div class="row">
			<div class="col-md-3">

			</div>
			<div class="col-md-9">
				<div class="container">
					@yield('pagination')
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
					<p>Descubra os nossos produtos espectaculares, todos disponíveis na nossa loja.</p>
					<div class="links">
						<a href="#">Conheça-nos melhor</a>
						<a href="#">Loja</a>
						<a href="#">Questões</a>
					</div>
					<div class="smalltext">
						<p>©2014 brandx.com All rights reserved.</p>
					</div>
					<div class="social">
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<div class="footerquestion">
						<p>Quer os nossos produtos na sua caixa de entrada?</p>

					</div>
					<div class="newsletter">
						<p>Subscreva a nossa newsletter.</p>

						<form role="form">
						  <div class="form-group">
						    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Insira o seu email">
						  </div>
						</form>
						<button type="button" class="btn btn-default">Subscrever</button>
					</div>
				</div>
			</div>
		</div>
	</div>




</body>
</html>
