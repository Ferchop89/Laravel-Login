@extends('layouts.app')

@section('title',"Usuario {$user->id}")

@section('content')

<div class="card">
  <h4 class="card-header">Mostrado los detalles del usuario #{{ $user->id }}</h4>
  <div class="card-body">
    <div class="form-group">
      <label for="name">Nombre</label>
      <div class="form-control">Nombre del Usuario: {{ $user->name }}</div>
    </div>
    <div class="form-group">
      <label for="correo">Correo Electrónico</label>
      <div class="form-control">Correo Electrónico: {{ $user->email }}</div>
    </div>
    <a href="{{ route('users') }}" class="btn btn-link">Regresar a la lista de usuarios</a>
  </div>
</div>

@endsection
