@extends('admin.layouts.default')
@section('title', 'Pacientes Cadastrados')

@section('content')


	<div class="content__form">
		<h1>Pacientes Cadastrados</h1>
		{!! $dataTable->table(['class' => 'table table-bordered table-sm js-datatable']) !!}
	</div>

	<div class="modal fade bd-example-modal-lg" 
		tabindex="-1" 
		role="dialog" 
		aria-labelledby="mySmallModalLabel" 
		aria-hidden="true"
		id="modal-patient">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Informações do Paciente</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="result"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>		
	</div>
@endsection

@section('scripts')
<script>
		$('.js-datatable').on('click', '.js-open-modal', event => {
			event.stopPropagation();
			event.preventDefault();
			
			let idPatient = event.currentTarget.getAttribute('data-id');
			$.ajax({
				method: "GET",
				url: "/admin/patient/"+idPatient+"/show",
			})
			.done(function( data ) {
					$('#result').html(data);
					$("#modal-patient").modal();
			});
		});
	</script>
	{!! $dataTable->scripts() !!}
@endsection
