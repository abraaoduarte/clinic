
<div class="row">

	<div class="col-6">
		<strong>Nome: </strong> {{ $patient->name }} <br>
		<strong>Sexo: </strong> 
		@if($patient->gender)
			Masculino 
		@else
			Feminino
		@endif  <br>
		<strong>CPF: </strong> {{ $patient->cpf }} <br>
		<strong>Endereço: </strong> {{ $patient->address }}, <strong>Nº </strong>
		{{ $patient->number_address }}<br>
		<strong>Cidade: </strong> {{ $patient->city }} / {{ $patient->state }}<br>
        <strong>Bebe?: </strong> 
		@if($patient->alcoholic)
			Sim 
		@else
			Não
		@endif  <br>
	</div>

	<div class="col-6">
		<strong>Nascimento: </strong> {{ $patient->birthday->format('d/m/Y') }} <br>
		<strong>Email: </strong> {{ $patient->email }} <br>
        <strong>RG: </strong> {{ $patient->rg }} <br>
		<strong>CEP: </strong> {{ $patient->zipcode }} <br>
		<strong>Pais: </strong> {{ $patient->country }} <br>
        <strong>Fumante?: </strong> 
		@if($patient->smoker)
			Sim 
		@else
			Não
		@endif  <br>
        <strong>Tipo Sanguíneo: </strong> {{ $patient->bloodtype }} <br>
	</div>
    <div class="col-12">
        <strong>Descrição: </strong> {{ $patient->description }} <br>
    </div>
	
	<hr>
	<div class="col-12">
		@if(count($patient->schedule))
		<ul class="list-group">
			<li class="list-group-item active">Agendamento</li>					
			@foreach($patient->schedule as $schedule)
				<li class="list-group-item">
					<strong>Dia: </strong>{{ $schedule->date->format('d/m/Y H:i') }} /
					<strong>Médico: </strong> {{ $schedule->doctor->name }}
				</li>
			@endforeach
		</ul>
		@else
			<div class="alert alert-danger">Nenhum agendamento marcado!</div>
		@endif		
	</div>

</div>



	