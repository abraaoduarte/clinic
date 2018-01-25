
<div class="row">

	<div class="col-6">
		<strong>Nome: </strong> {{ $doctor->name }} <br>
		<strong>Sexo: </strong> 
		@if($doctor->gender)
			Masculino 
		@else
			Feminino
		@endif  <br>
		<strong>CPF: </strong> {{ $doctor->cpf }} <br>
		<strong>Endereço: </strong> {{ $doctor->address }}, <strong>Nº </strong>
		{{ $doctor->number_address }}<br>
		<strong>Cidade: </strong> {{ $doctor->city }} / {{ $doctor->state }}<br>
		<strong>Especialidade: </strong> {{ $doctor->speciality }} <br>
	</div>

	<div class="col-6">
		<strong>Nascimento: </strong> {{ $doctor->birthday->format('d/m/Y') }} <br>
		<strong>CRM: </strong> {{ $doctor->crm }} <br>
		<strong>Email: </strong> {{ $doctor->email }} <br>
		<strong>CEP: </strong> {{ $doctor->zipcode }} <br>
		<strong>Pais: </strong> {{ $doctor->country }} <br>
		<strong>Hospital: </strong> {{ $doctor->hospital }} <br>
	</div>

	<hr>
	<div class="col-12">
		@if(count($doctor->schedule))
		<ul class="list-group">
			<li class="list-group-item active">Agendamento</li>					
			@foreach($doctor->schedule as $schedule)
				<li class="list-group-item">
					<strong>Dia: </strong>{{ $schedule->date->format('d/m/Y H:i') }} /
					<strong>Paciente: </strong> {{ $schedule->patient->name }}
				</li>
			@endforeach
		</ul>
		@else
			<div class="alert alert-danger">Nenhuma consulta marcada!</div>
		@endif		
	</div>

</div>



	