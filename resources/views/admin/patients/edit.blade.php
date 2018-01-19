@extends('admin.layouts.default')
@section('title', 'Editar Paciente')
@section('content')

<div class="content__form">
	<h1>Editar Paciente</h1>
	{!! Form::open(
                 ['url' => ['admin/patient/update', $patient->id],
                 'method' => 'put',
                 'class' => 'form-horizontal'])
  !!}
	<div class="row">
		<div class="col-6">
			<div class="form-group">
				{{ Form::label('name', 'Nome') }}
				{{ Form::text('name', $patient->name, ['class'       => 'form-control'.
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

		<div class="col-3">
			<div class="form-group">
				{{ Form::label('birthday', 'Data Nascimento') }}
				{{ Form::text('birthday', $patient->birthday->format('d/m/Y'), 
					           ['class'	=> 'form-control'.($errors->has('birthday') ? ' is-invalid' : '' ),
				              'id'	  => 'birthday',
				              'placeholder' => '99/99/9999']) }}
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
					{{ Form::radio('gender', 1, (($patient->gender == 1) ? true : false ), 
						            ['class' => 'custom-control-input',
						            'id' => 'masculino']) }}
					{{ Form::label('masculino', 'Masculino', ['class' => 'custom-control-label']) }}
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					{{ Form::radio('gender', 0, (($patient->gender == 0) ? true : false ), 
						            ['class' => 'custom-control-input',
						            'id' => 'feminino']) }}
					{{ Form::label('feminino', 'Feminino', ['class' => 'custom-control-label']) }}
				</div>
			  
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('cpf', 'Cpf') }}
				{{ Form::text('cpf', $patient->cpf, ['class'       => 'form-control'.
											                      ($errors->has('cpf') ? ' is-invalid' : '' ),
										                        'id'          => 'cpf',
										                        'placeholder' => '999.999.999-99']) }}
				@if($errors->first('cpf'))
	        <div class="invalid-feedback">
	          {{ $errors->first('cpf') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('rg', 'Rg') }}
				{{ Form::text('rg', $patient->rg, ['class'       => 'form-control'.
					                            		 ($errors->has('rg') ? ' is-invalid' : '' ),
						                               'id'          => 'rg',
						                               'placeholder' => '99.999.999-9']) }}
				@if($errors->first('rg'))
	        <div class="invalid-feedback">
	          {{ $errors->first('rg') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('phone', 'Telefone') }}
				{{ Form::text('phone', $patient->phone, ['class'       => 'form-control'.
										                             ($errors->has('phone') ? ' is-invalid' : '' ),
									                               'id'          => 'phone',
									                               'placeholder' => '(99) 99999-9999']) }}
				@if($errors->first('phone'))
	        <div class="invalid-feedback">
	          {{ $errors->first('phone') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('address', 'Endereço') }}
				{{ Form::text('address', $patient->address, 
					           ['class' => 'form-control'.($errors->has('address') ? ' is-invalid' : '' ),
											'id' => 'address',
											'placeholder' => 'Av Brasil']) }}
				@if($errors->first('address'))
	        <div class="invalid-feedback">
	          {{ $errors->first('address') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('number_address', 'Numero') }}
				{{ Form::text('number_address', $patient->number_address, 
					           ['class' => 'form-control'. 
					           ($errors->has('number_address') ? ' is-invalid' : '' ),
					           'id' => 'number_address',
					           'placeholder' => 'Nº 999']) }}
				@if($errors->first('number_address'))
	        <div class="invalid-feedback">
	          {{ $errors->first('number_address') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('zipcode', 'Cep:') }}
				{{ Form::text('zipcode', $patient->zipcode, ['class'       => 'form-control'.
										                             		 ($errors->has('zipcode') ? ' is-invalid' : '' ),
											                               'id'          => 'zipcode',
											                               'placeholder' => '99.999-999']) }}
				@if($errors->first('zipcode'))
	        <div class="invalid-feedback">
	          {{ $errors->first('zipcode') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('city', 'Cidade') }}
				{{ Form::text('city', $patient->city, ['class'       => 'form-control'.
					                            			   ($errors->has('city') ? ' is-invalid' : '' ),
				                               				 'id'          => 'city',
				                               				 'placeholder' => 'Franca']) }}
				@if($errors->first('city'))
	        <div class="invalid-feedback">
	          {{ $errors->first('city') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('state', 'Estado') }}
				{{ Form::text('state', $patient->state, ['class'       => 'form-control'.
										                             ($errors->has('state') ? ' is-invalid' : '' ),
									                               'id'          => 'state',
									                               'placeholder' => 'SP']) }}
				@if($errors->first('state'))
	        <div class="invalid-feedback">
	          {{ $errors->first('state') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{{ Form::label('country', 'Pais') }}
				{{ Form::text('country', $patient->country, ['class'       => 'form-control'.
											                            	 ($errors->has('country') ? ' is-invalid' : '' ),
										                               	'id'          => 'country',
										                               	'placeholder' => 'Brasil']) }}
				@if($errors->first('country'))
	        <div class="invalid-feedback">
	          {{ $errors->first('country') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-2">
			<div class="form-group">
				{{ Form::label('label', 'Fumante?') }} <br>
				<div class="custom-control custom-radio custom-control-inline">
					{{ Form::radio('smoker', 1, (($patient->smoker == 1) ? true : false ), 
						            ['class' => 'custom-control-input',
						            'id' => 'fumante_1']) }}
					{{ Form::label('fumante_1', 'Sim', ['class' => 'custom-control-label']) }}
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					{{ Form::radio('smoker', 0, (($patient->smoker == 0) ? true : false ), 
						            ['class' => 'custom-control-input',
						            'id' => 'fumante_2']) }}
					{{ Form::label('fumante_2', 'Não', ['class' => 'custom-control-label']) }}
				</div>
			  
			</div>
		</div>

		<div class="col-2">
			<div class="form-group">
				{{ Form::label('label', 'Bebe?') }} <br>
				<div class="custom-control custom-radio custom-control-inline">
					{{ Form::radio('alcoholic', 1, (($patient->alcoholic == 1) ? true : false ), 
						            ['class' => 'custom-control-input',
						            'id' => 'bebe_1']) }}
					{{ Form::label('bebe_1', 'Sim', ['class' => 'custom-control-label']) }}
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					{{ Form::radio('alcoholic', 0, (($patient->alcoholic == 0) ? true : false ), 
						            ['class' => 'custom-control-input',
						            'id' => 'bebe_2']) }}
					{{ Form::label('bebe_2', 'Não', ['class' => 'custom-control-label']) }}
				</div>
			  
			</div>
		</div>

		<div class="col-8">
			<div class="form-group">
				{{ Form::label('bloodtype', 'Tipo Sanguineo') }}
				{{ Form::text('bloodtype', $patient->bloodtype, 
					           ['class' => 'form-control'.($errors->has('bloodtype') ? ' is-invalid' : '' ),
				              'id'          => 'bloodtype',
				              'placeholder' => 'O negativo']) }}
				@if($errors->first('bloodtype'))
	        <div class="invalid-feedback">
	          {{ $errors->first('bloodtype') }}
	        </div>
	      @endif
			</div>
		</div>

		<div class="col-12">
			<div class="form-group">
				{{ Form::label('description', 'Descrição') }}
				{{ Form::textarea('description', $patient->description, 
					               ['class' => 'form-control',
					               'size' => '30x5',
					               'id' => 'description',
					               'placeholder' => 'Descrição']) }}
				@if($errors->first('description'))
	        <div class="invalid-feedback">
	          {{ $errors->first('description') }}
	        </div>
	      @endif
			</div>
		</div>

		

		<div class="col-12">
			<div class="form-group">
				{{ Form::submit('Atualizar', ['class' => 'btn btn-primary']) }}
			</div>
		</div>

	</div>
	{!! Form::close() !!}
</div>
@endsection