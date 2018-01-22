@extends('admin.layouts.default')

@section('title', 'Listagem de Médico')

@section('content')

	<div class="content__form">
		<h1>Listagem de Médico</h1>
		{!!  $dataTable->table(['class' => 'table table-bordered table-sm js-datatable']) !!}
	</div>

@endsection

@section('scripts')
	{!! $dataTable->scripts() !!}
@endsection