<div class="btn-group">
  <a href="{{ url('admin/user/edit/'.$user->id) }}" class="btn btn-primary btn-sm">
    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
  </a>
</div>
<div class="btn-group">
	{!! Form::open(['url' => ['admin/user/delete', $user->id],
                  'method' => 'delete']) !!}
  	{!! Form::button('<i class="fa fa-times" aria-hidden="true"></i>',
  		              ['type' => 'submit',
  		              'class' => 'btn btn-danger btn-sm js-button-delete'])
  	!!}
  {!! Form::close() !!}
</div>