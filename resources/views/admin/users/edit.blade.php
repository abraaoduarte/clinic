@extends('admin.layouts.default')
@section('title', 'Criar Usuário')
@section('content')

<div class="content__form">
	<h1>Editar Usuário <small class="text-dark">({{ $user->name }})</small></h1>
	{!! Form::open(['route' => ['user.edit', $user->id], 'method' => 'put']) !!}
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				{{ Form::label('name', 'Nome') }}
				{{ Form::text('name', $user->name, ['class'       => 'form-control'.
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
				{{ Form::email('email', $user->email, ['class'       => 'form-control'.
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
				{{ Form::select('is_active', ['1' => 'Sim', '0' => 'Não'], $user->is_active,
					                       ['class' => 'form-control',
				                          'id'    => 'is_active']) }}
			</div>
		</div>

		<div class="col-6">
			<div class="form-group">
				{{ Form::label('is_admin', 'Administrador?') }}
				{{ Form::select('is_admin', ['1' => 'Sim', '0' => 'Não'], $user->is_admin,
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
				                 'id'          => 'email',
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