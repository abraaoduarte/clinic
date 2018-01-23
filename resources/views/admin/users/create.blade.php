@extends('admin.layouts.default')
@section('title', 'Criar Usuário')
@section('content')

<div class="content__form">
	<h1>Cadastrar Usuário</h1>
	{!! Form::open(['route' => 'user.create', 'method' => 'post']) !!}
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				{{ Form::label('name', 'Nome') }}
				{{ Form::text('name', null, ['class'       => 'form-control'.
					                           ($errors->has('name') ? ' is-invalid' : '' ),
				                             'id'          => 'name',
				                             'placeholder' => 'Nome']) }}
			  @if($errors->first('name'))
	        <div class="invalid-feedback">
	          {{ $errors->first('name') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-6">
			<div class="form-group">
				{{ Form::label('email', 'Email') }}
				{{ Form::email('email', null, ['class'       => 'form-control'.
					                             ($errors->has('email') ? ' is-invalid' : '' ),
				                               'id'          => 'email',
				                               'placeholder' => 'Ex: email@dominio.com']) }}
				@if($errors->first('name'))
	        <div class="invalid-feedback">
	          {{ $errors->first('name') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-6">
			<div class="form-group">
				{{ Form::label('is_active', 'Ativo?') }}
				{{ Form::select('is_active', ['1' => 'Sim', '0' => 'Não'], 1,
					                       ['class' => 'form-control',
				                          'id'    => 'is_active']) }}
			</div>
		</div>

		<div class="col-6">
			<div class="form-group">
				{{ Form::label('is_admin', 'Administrador?') }}
				{{ Form::select('is_admin', ['1' => 'Sim', '0' => 'Não'], 1,
					                          ['class' => 'form-control',
				                             'id'    => 'is_admin']) }}
			</div>
		</div>

		<div class="col-6">
			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', ['class'       => 'form-control'.
					                             ($errors->has('password') ? ' is-invalid' : '' ),
				                               'id'          => 'password',
				                               'placeholder' => 'Senha']) }}
				@if($errors->first('password'))
	        <div class="invalid-feedback">
	          {{ $errors->first('password') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-6">
			<div class="form-group">
				{{ Form::label('password_confirmation', 'Confirmar Senha') }}
				{{ Form::password('password_confirmation', 
					               ['class'       => 'form-control'.
					               ($errors->has('password_confirmation') ? ' is-invalid' : '' ),
				                 	'id'          => 'password_confirmation',
				                 'placeholder' => 'Confirmar Senha']) }}
				@if($errors->first('password_confirmation'))
	        <div class="invalid-feedback">
	          {{ $errors->first('password_confirmation') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-12">
			<div class="form-group">
				{{ Form::submit('Inserir', ['class' => 'btn btn-primary']) }}
			</div>
		</div>

	</div>
	{!! Form::close() !!}
</div>
@endsection