@extends('admin.layouts.default')

@section('title', 'Cadastrar Novo Médico')

@section('content')

	<div class="content__form">
		<h1>Cadastrar Novo Médico</h1>
		{!! Form::open(['route' => 'doctor.create', 'method' => 'post']) !!}

			<div class="row">
				<div class="col-6">
					<div class="form-group">
						{!! Form::label('name', 'Nome') !!}
						{!! 
							Form::text(
						  	'name',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('name') ? ' is-invalid' : '' ),
									'id' => 'name',
									'placeholder' => 'Nome'
								]
							) 
						!!}
						@if($errors->first('name'))
							<div class="invalid-feedback">
								{{ $errors->first('name') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-3">
					<div class="form-group">
						{!! Form::label('birthday', 'Data de Nascimento') !!}
						{!! 
							Form::text(
						  	'birthday',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('birthday') ? ' is-invalid' : '' ),
									'id' => 'birthday',
									'placeholder' => '99/99/9999'
								]
							) 
						!!}
						@if($errors->first('birthday'))
							<div class="invalid-feedback">
								{{ $errors->first('birthday') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-3">
					<div class="form-group">
						{{ Form::label('label', 'Sexo?') }} <br>
						<div class="custom-control custom-radio custom-control-inline">
							{{ Form::radio(
									'gender', 
									1, 
									true, 
									[
										'class' => 'custom-control-input'.
											($errors->has('gender') ? ' is-invalid' : '' ),
										'id' => 'masculino'
									]
								) 
							}}
							{{ Form::label(
									'masculino', 
									'Masculino', 
									[
										'class' => 'custom-control-label'
									]
								)
							}}
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							{{ Form::radio(
									'gender', 
									0, 
									false, 
									[
										'class' => 'custom-control-input'.
											($errors->has('gender') ? ' is-invalid' : '' ),
										'id' => 'feminino'
									]
								) 
							}}
							{{ Form::label('feminino', 'Feminino', ['class' => 'custom-control-label']) }}
						</div>
						@if($errors->first('gender'))
							<div class="invalid-feedback">
								{{ $errors->first('gender') }}
							</div>
						@endif
					</div>
				</div>

				<div class="col-4">
					<div class="form-group">
						{!! Form::label('cpf', 'Cpf') !!}
						{!! 
							Form::text(
						  	'cpf',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('cpf') ? ' is-invalid' : '' ),
									'id' => 'cpf',
									'placeholder' => '999.999.999-99'
								]
							) 
						!!}
						@if($errors->first('cpf'))
							<div class="invalid-feedback">
								{{ $errors->first('cpf') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-4">
					<div class="form-group">
						{!! Form::label('email', 'Email') !!}
						{!! 
							Form::text(
						  	'email',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('email') ? ' is-invalid' : '' ),
									'id' => 'email',
									'placeholder' => 'fulano@dominio.com'
								]
							) 
						!!}
						@if($errors->first('email'))
							<div class="invalid-feedback">
								{{ $errors->first('email') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-4">
					<div class="form-group">
						{!! Form::label('crm', 'Crm') !!}
						{!! 
							Form::text(
						  	'crm',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('crm') ? ' is-invalid' : '' ),
									'id' => 'crm',
									'placeholder' => 'CRM'
								]
							) 
						!!}
						@if($errors->first('crm'))
							<div class="invalid-feedback">
								{{ $errors->first('crm') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-4">
					<div class="form-group">
						{!! Form::label('address', 'Endereço') !!}
						{!! 
							Form::text(
						  	'address',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('address') ? ' is-invalid' : '' ),
									'id' => 'address',
									'placeholder' => 'Endereço'
								]
							) 
						!!}
						@if($errors->first('address'))
							<div class="invalid-feedback">
								{{ $errors->first('address') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-1">
					<div class="form-group">
						{!! Form::label('number_address', 'Nº') !!}
						{!! 
							Form::text(
						  	'number_address',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('number_address') ? ' is-invalid' : '' ),
									'id' => 'number_address',
									'placeholder' => 'Nº'
								]
							) 
						!!}
						@if($errors->first('number_address'))
							<div class="invalid-feedback">
								{{ $errors->first('number_address') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-2">
					<div class="form-group">
						{!! Form::label('zipcode', 'Cep') !!}
						{!! 
							Form::text(
						  	'zipcode',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('zipcode') ? ' is-invalid' : '' ),
									'id' => 'zipcode',
									'placeholder' => 'Cep: 99.999-999'
								]
							) 
						!!}
						@if($errors->first('zipcode'))
							<div class="invalid-feedback">
								{{ $errors->first('zipcode') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-2">
					<div class="form-group">
						{!! Form::label('city', 'Cidade') !!}
						{!! 
							Form::text(
						  	'city',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('city') ? ' is-invalid' : '' ),
									'id' => 'city',
									'placeholder' => 'Cidade'
								]
							) 
						!!}
						@if($errors->first('city'))
							<div class="invalid-feedback">
								{{ $errors->first('city') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-1">
					<div class="form-group">
						{!! Form::label('state', 'Estado') !!}
						{!! 
							Form::text(
						  	'state',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('state') ? ' is-invalid' : '' ),
									'id' => 'state',
									'placeholder' => 'SP'
								]
							) 
						!!}
						@if($errors->first('state'))
							<div class="invalid-feedback">
								{{ $errors->first('state') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-2">
					<div class="form-group">
						{!! Form::label('country', 'Pais') !!}
						{!! 
							Form::text(
						  	'country',
						  	null,
						  	[
						  		'class' => 'form-control'.
						  			($errors->has('country') ? ' is-invalid' : '' ),
									'id' => 'country',
									'placeholder' => 'Pais'
								]
							) 
						!!}
						@if($errors->first('country'))
							<div class="invalid-feedback">
								{{ $errors->first('country') }}
							</div>
						@endif
					</div>					
				</div>

				<div class="col-6">
					<div class="form-group">
						{!! Form::label('speciality', 'Especialidade') !!}
						{!! 
							Form::text(
						  	'speciality',
						  	null,
						  	[
						  		'class' => 'form-control',
									'id' => 'speciality',
									'placeholder' => 'Especialidade'
								]
							) 
						!!}
					</div>					
				</div>

				<div class="col-6">
					<div class="form-group">
						{!! Form::label('hospital', 'Hospital') !!}
						{!! 
							Form::text(
						  	'hospital',
						  	null,
						  	[
						  		'class' => 'form-control',
									'id' => 'hospital',
									'placeholder' => 'Hospital'
								]
							) 
						!!}
					</div>					
				</div>

				<div class="col-12">
					<div class="form-group">
						{!! Form::submit(
								'Inserir', 
									[
										'class' => 'btn btn-primary'
									]
								) 
						!!}
					</div>
				</div>


			</div>

		{!! Form::close() !!}
	</div>

@endsection