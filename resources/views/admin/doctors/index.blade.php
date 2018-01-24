@extends('admin.layouts.default')

@section('title', 'Listagem de Médico')

@section('content')

	<div class="content__form">
		<h1>Listagem de Médico</h1>
		{!!  $dataTable->table(['class' => 'table table-bordered table-sm js-datatable']) !!}
	</div>

	<div class="modal fade bd-example-modal-lg" 
		tabindex="-1" 
		role="dialog" 
		aria-labelledby="mySmallModalLabel" 
		aria-hidden="true"
		id="modal-user">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Informações do Médico</h5>
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
			
			let idDoctor = event.currentTarget.getAttribute('data-id');
			$.ajax({
				method: "GET",
				url: "/admin/doctor/"+idDoctor+"/show",
			})
			.done(function( data ) {
					$('#result').html(data);
					$("#modal-user").modal();
			});
		});
	</script>
	{!! $dataTable->scripts() !!}
@endsection