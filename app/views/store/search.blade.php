@extends('layouts.frontpage')


@section('search')

@if (count($searchproducts) == 0)
	<div class="container">
		<div class="alert alert-danger search-results" role="alert">
			<p>Não foram encontrados resultados para {{ $keyword }}, tente outro produto!</p>
		</div>
	</div>
@else

	<div class="container">
		<div class="alert alert-info search-results" role="alert">
			<p>Resultados da pesquisa para: {{ $keyword }}</p>
		</div>
	</div>

@endif

@stop

@section('content')
	<div class="container">
		<div class="row">
			@foreach($products as $product)
				<div class="col-md-4 col-sm-12 col-xs-12">
					<div class="produto text-center trans">
						<div class="top-right-price">
							<div class="card-price button">{{ $product->price }}€</div>
						</div>
						<a href="/store/view/{{ $product->id }}">
							{{ HTML::image($product->image, $product->title, array('class' => 'imagem-produto'))}}
						</a>
						<div class="produto-titulo">
							<h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>
						</div>
						<div class="produto-disp">
							<h5>
								Disponibilidade:
								<span class="{{ Availability::displayClass($product->availability) }}">
									{{ Availability::display($product->availability) }}
								</span
							</h5>
						</div>
						<div class="produto-btns">
							<a href="/store/view/{{ $product->id }}" class="btn btn-default">Ver produto</a>
							<a href="#" class="btn btn-default ">Adicionar ao Carrinho</a>

						</div>
					</div>

				</div>

			@endforeach
		</div>
	</div>
@stop

