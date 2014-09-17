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
				    Criar novas categorias
				  </div>
				  <div class="panel-body">
				  	{{ Form::open(array('url' => 'admin/categories/create')) }}
				  	<p>
				  		{{ Form::label('nome') }}
				  		{{ FOrm::text('name') }}
				  	</p>
				  	{{ Form::submit('Criar categoria', array('class' => 'btn btn-success'))}}
				  	{{ Form::close() }}
				  </div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-success">
				  <div class="panel-heading">
				    Categorias
				  </div>
				  <div class="panel-body">
				  	<ul class="list-group">
				  		@foreach($categories as $category)
				  			 <li class="list-group-item">
				  			 	{{ $category->name }}
				  			 	{{ Form::open(array('url' => 'admin/categories/destroy')) }}
				  			 	{{ Form::hidden('id', $category->id) }}
				  			 	{{ Form::submit('delete', array('class' => 'btn btn-danger navbar-btn')) }}
				  			 	{{ Form::close() }}
				  			 </li>
				  		@endforeach
				  	</ul>
				  </div>
				</div>
			</div>
		</div>
	</div>


@stop