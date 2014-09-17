@extends('layouts.frontpage')

@section('content')
<div class="container">
	<div class="produto-view">
		<div class="row">
				<div class="col-md-6">{{ HTML::image($product->image, $product->title, array('class' => 'imagem-produto-view'))}}</div>
				<div class="col-md-6 word-break">
					<h2>{{ $product->title }}</h2>
					<p class="ref">Referência:{{$product->id}}</p>
					@if ($product->availability == 1)
						<div class="price-stock">{{ $product->price }}€</div>
					@else
						<div class="price-nostock">Sem stock</div>
					@endif
					<div class="description"><p>{{$product->description}}</p></div>
					<div class="view-buy">
						<a href="#" class="btn btn-default btn-lg">Comprar já</a>
						<a href="#" class="btn btn-default btn-lg">Adicionar ao carrinho</a>
					</div>
				</div>
		</div>
	</div>
</div>
@stop
