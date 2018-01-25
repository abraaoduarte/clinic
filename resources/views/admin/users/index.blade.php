@extends('admin.layouts.default')
@section('title', 'Usuários Cadastrados')

@section('content')
	<div class="content__form">
		<h1>Usuários Cadastrados</h1>		
		{!! $dataTable->table(['class' => 'table table-bordered table-sm js-datatable']) !!}
	</div>

	<div class="modal fade bd-example-modal-sm" 
		tabindex="-1" 
		role="dialog" 
		aria-labelledby="mySmallModalLabel" 
		aria-hidden="true"
		id="modal-search">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Informações do Usuário</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div id="result-search-modal"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>		
	</div>

@endsection



@section('scripts')
	{!! $dataTable->scripts() !!}
@endsection
