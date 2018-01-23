@extends('admin.layouts.default')

@section('title', 'Editar Agendamento')

@section('content')

	<div class="content__form">
		<h1>Editar Agendamento</h1>
		{!! Form::open(['route' => ['schedule.edit', $schedule->id], 'method' => 'put']) !!}
		<div class="row">
			

			<div class="col-4">
				<div class="form-group">
					{{ Form::label('doctor_id', 'Médico') }}
					{{ Form::select(
							'doctor_id', 
							$doctors, 
							$schedule->doctor_id, 
							[
								'class' => 'form-control'.
								($errors->has('doctor_id') ? ' is-invalid' : '' )
							]
						) 
					}}
					@if($errors->first('doctor_id'))
					<div class="invalid-feedback">
						{{ $errors->first('doctor_id') }}
					</div>
					@endif
				</div>
			</div>

			<div class="col-4">
				<div class="form-group">
					{{ Form::label('patient_id', 'Paciente') }}
					{{ Form::select(
							'patient_id', 
							$patients, 
							$schedule->patient_id, 
							[
								'class' => 'form-control'.
									($errors->has('patient_id') ? ' is-invalid' : '' )
							]
						) 
					}}
					@if($errors->first('patient_id'))
					<div class="invalid-feedback">
						{{ $errors->first('patient_id') }}
					</div>
					@endif
				</div>
			</div>

			<div class="col-4">
				<div class="form-group">
					{{ Form::label('date', 'Data & Hora da Consulta') }}
					{{ Form::text(
							'date',
							$schedule->date->format('d/m/Y H:i'),
							[
								'class' => 'form-control'.
									($errors->has('date') ? ' is-invalid' : '' ),
								'id' => 'date', 
								'placeholder' => '01/01/2000 12:00'
							]
						) 
					}}
					@if($errors->first('date'))
					<div class="invalid-feedback">
						{{ $errors->first('date') }}
					</div>
					@endif
				</div>
			</div>

			<div class="col-12">
				<div class="form-group">
					{{ Form::label('description', 'Descrição') }}
					{{ Form::textarea(
							'description',
							$schedule->description,
							[
								'class' => 'form-control',
								'id' => 'description', 
								'placeholder' => 'Descrição',
								'rows' => '4'
							]
						) 
					}}
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