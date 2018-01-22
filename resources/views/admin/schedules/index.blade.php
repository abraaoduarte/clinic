@extends('admin.layouts.default')

@section('title', 'Agendamento')

@section('content')

	<div class="content__form">
		<h1>Agendamento</h1>
		{!! $dataTable->table(['class' => 'table table-bordered table-sm js-datatable']) !!}
	</div>
@endsection

@section('scripts')
	{!! $dataTable->scripts() !!}
@endsection