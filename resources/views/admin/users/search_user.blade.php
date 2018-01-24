
<strong>Nome: </strong> {{ $user->name }} <br>
<strong>Email: </strong> {{ $user->email }} <br>
<strong>Administrador: </strong>
@if($user->is_admin) 
	Sim 
@else
	Não
@endif 
<br>

<strong>Ativo: </strong>
@if($user->is_active) 
	Sim 
@else
	Não
@endif 
<br>
	