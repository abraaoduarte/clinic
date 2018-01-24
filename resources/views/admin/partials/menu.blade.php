<div class="container__menu">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ route('home') }}">Clínica</a>
    <button 
      class="navbar-toggler" 
      type="button" 
      data-toggle="collapse" 
      data-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" 
      aria-expanded="false" 
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('home') }}">
            Início <span class="sr-only">(current)</span>
          </a>
        </li>        
        <li class="nav-item dropdown {{ Request::is('admin/user*') ? 'active' : '' }}">
          <a class="nav-link dropdown-toggle" 
            href="#" 
            id="navbarDropdown" 
            role="button" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="false">
            Usuários
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item {{ Request::is('admin/user/create') ? 'active' : '' }}" 
              href="{{ route('user.create') }}">
              Criar Usuário
            </a>
            <a class="dropdown-item {{ Request::is('admin/users') ? 'active' : '' }}" 
              href="{{ route('users') }}">
              Relatório
            </a>
          </div>
        </li>
        <li class="nav-item dropdown {{ Request::is('admin/doctor*') ? 'active' : '' }}">
          <a class="nav-link dropdown-toggle" 
            href="#" id="navbarDropdown" 
            role="button" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="false">
            Médicos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item {{ Request::is('admin/doctor/create') ? 'active' : '' }}" 
              href="{{ route('doctor.create') }}">
              Criar Médicos
            </a>
            <a class="dropdown-item {{ Request::is('admin/doctors') ? 'active' : '' }}" 
              href="{{ route('doctors') }}">
              Relatório
            </a>
          </div>
        </li> 
        <li class="nav-item dropdown {{ Request::is('admin/patient*') ? 'active' : '' }}">
          <a class="nav-link dropdown-toggle" 
            href="#" id="navbarDropdown" 
            role="button" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="false">
            Pacientes
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item {{ Request::is('admin/patient/create') ? 'active' : '' }}" 
              href="{{ route('patient.create') }}">
              Criar Paciente
            </a>
            <a class="dropdown-item {{ Request::is('admin/patients') ? 'active' : '' }}" 
              href="{{ route('patients') }}">
              Relatório
            </a>
          </div>
        </li> 
        <li class="nav-item dropdown {{ Request::is('admin/schedule*') ? 'active' : '' }}">
          <a class="nav-link dropdown-toggle" 
              href="#" id="navbarDropdown" 
              role="button" 
              data-toggle="dropdown" 
              aria-haspopup="true" 
              aria-expanded="false">
            Agendamento
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item {{ Request::is('admin/schedule/create') ? 'active' : '' }}" 
              href="{{ route('schedule.create') }}">
              Marcar Consulta
            </a>
            <a class="dropdown-item {{ Request::is('admin/schedules') ? 'active' : '' }}" 
              href="{{ route('schedules') }}">
              Relatório
            </a>
          </div>
        </li>        
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          {!! Form::open(['route' => 'logout', 'method' => 'post']) !!}
            {{ Form::submit('Sair', ['class' => 'btn btn-primary']) }}
          {!! Form::close() !!}
          
        </li>
      </ul>
     
    </div>
  </nav>
</div>