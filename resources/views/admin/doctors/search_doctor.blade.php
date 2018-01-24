
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
</div>



	