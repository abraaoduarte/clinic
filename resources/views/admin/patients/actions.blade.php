<div class="btn-group">
  <a href="{{ route('patient.edit', ['id' => $id]) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
  </a>
</div>
<div class="btn-group">
	{!! Form::open(['route' => ['patient.delete', $id],
                  'method' => 'delete']) !!}
  	{!! Form::button('<i class="fa fa-times" aria-hidden="true"></i>',
  		              ['type' => 'submit',
  		              'class' => 'btn btn-danger btn-sm js-button-delete'])
  	!!}
  {!! Form::close() !!}
</div>

<div class="btn-group">
  <a href="#" 
    class="btn btn-success btn-sm js-open-modal" 
    data-id="/admin/patient/{{ $id }}/show">
    <i class="fa fa-search" aria-hidden="true"></i>
  </a>
</div>