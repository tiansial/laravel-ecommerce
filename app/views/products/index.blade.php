@extends('layouts.adminpage')

@section('content')
	@if($errors->has())
		<div class="alert alert-danger">
			<p>Ocorreram os seguintes erros:</p>

			<ul>
				@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    Criar novos produtos
				  </div>
				  <div class="panel-body">
				  	{{ Form::open(array('url' => 'admin/products/create', 'files' => true )) }}
					  	<p>
					  		{{ Form::label('category_id', 'Categoria') }}
					  		{{ Form::select('category_id', $categories) }}
					  	</p>
					  	<p>
					  		{{ Form::label('nome') }}
					  		{{ Form::text('title') }}
					  	</p>
					  	<p>
					  		{{ Form::label('descrição') }}
					  		{{ Form::textarea('description', null, ['class' => 'form-control', 'size' => '30x4']) }}
					  	</p>
					  	<p>
					  		{{ Form::label('preço') }}
					  		{{ Form::text('price') }}
					  	</p>
					  	<p>
					  		{{ Form::label('image', 'Escolha uma imagem') }}
					  		{{ Form::file('image') }}
					  	</p>

				  	{{ Form::submit('Criar produto', array('class' => 'btn btn-success'))}}
				  	{{ Form::close() }}
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-success">
				  <div class="panel-heading">
				    Produtos
				  </div>
				  <div class="panel-body">
				  	<ul class="list-group">
				  		@foreach($products as $product)
				  			 <li class="list-group-item">
				  			 	<div class="row">
				  			 		<div class="col-md-4"> 
					  			 		<strong class="word-break">{{ $product->title }}</strong>
					  			 		<br>
						  			 	{{ HTML::image($product->image, $product->title, array('class' => 'product_img')) }}
						  			</div>
						  			<div class="col-md-4">
						  			 	{{ Form::open(array('url' => 'admin/products/toggle-availability')) }}
						  			 	{{ Form::hidden('id', $product->id) }}
						  			 	{{ Form::select('availability', array('1' => 'Em stock', '0' => 'Sem stock' ), $product->availability, array('class' => 'form-control')) }}
						  			 	{{ Form::submit('Actualizar', array('class' => 'btn btn-sm btn-info btn-form')) }}
						  			 	{{ Form::close() }}
									</div>
									<div class="col-md-4">
						  			 	{{ Form::open(array('url' => 'admin/products/destroy')) }}
						  			 	{{ Form::hidden('id', $product->id) }}
						  			 	{{ Form::submit('Apagar', array('class' => 'btn btn-sm btn-danger center-block')) }}
						  			 	{{ Form::close() }}
						  			 </div>
				  			 	</div>
				  			 </li>
				  		@endforeach
				  	</ul>
				  </div>
				</div>
			</div>
		</div>
	</div>


@stop