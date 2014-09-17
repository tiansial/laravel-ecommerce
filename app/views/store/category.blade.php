@extends('layouts.frontpage')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<ul class="list-group text-center">
					<li class="list-group-item">{{ HTML::link('/store/products/', "Recentes")}}</li>
				@foreach ($catnav as $cat)
					<li class="list-group-item">{{ HTML::link('/store/category/'.$cat->id, $cat->name)}}</li>
				@endforeach
			</ul>

		</div>
		<div class="col-md-9 word-break">
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
</div>

@stop

@section('pagination')

<ul class="pagination pagination-sm">
  {{ $products->links() }}
</ul>

@stop

