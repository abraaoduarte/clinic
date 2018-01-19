@extends('admin.layouts.default')
@section('title', 'Pacientes Cadastrados')

@section('content')


<div class="content__form">
	<h1>Pacientes Cadastrados</h1>
	@include('flash::message')
	<table class="table table-bordered table-sm">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Nome</th>
	      <th scope="col">Endereço</th>
	      <th scope="col" width="80">Ação</th>
	    </tr>
	  </thead>
	  
	</table>
</div>
@endsection


@section('scripts')

<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('patient/dataTable') }}',
        columns: [
            {data: 'name', name: 'name'},
            {data: 'address', name: 'address'},
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});
</script>
@endsection