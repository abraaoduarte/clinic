@extends('admin.layouts.default')

@section('title', 'Página Inicial')

@section('content')

  <div class="content__form">
    <h1>Área Administrativa</h1>
    Você está logado como: {{ Auth::user()->name }}
  </div>

@endsection
