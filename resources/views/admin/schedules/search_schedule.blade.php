
<div class="row">

	<div class="col-6">
		<strong>Marcado por: </strong> {{ $schedule->user->name }} <br>
        <strong>Paciente: </strong> {{ $schedule->patient->name }} <br>
		
	</div>

	<div class="col-6">
        <strong>Médico: </strong> {{ $schedule->doctor->name }} <br>
		<strong>Dia: </strong> {{ $schedule->date->format('d/m/Y H:i') }} <br>		
	</div>
    <div class="col-12">
        <strong>Descrição: </strong> {{ $schedule->description }} <br>
    </div>
</div>



	