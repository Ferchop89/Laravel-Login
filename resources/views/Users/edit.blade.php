@extends('layout')

@section('title',"Editar usuario.")

@section('content')

<div class="card">
  <h1 class="card-header">
    Editar Usuario
  </h1>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <h5>Por favor corrige los siguientes debajo</h5>
      <ul>
          @foreach ($errors->all() as $error)
            <li> {{ $error}}  </li>
          @endforeach
      </ul>
    </div>
    @endif

    <form method="POST" action="{{ url("usuarios/{$user->id}") }}">
      {{ method_field('PUT') }}
        {!! csrf_field() !!}

        <div class="form-group">
          <label for="name">Nombre:</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de usuario" value="{{ old('name',$user->name)}}"/>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="Usuario@net.com" value="{{ old('email',$user->email)}}"/>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="mayor a seis caracteres"/>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        <a href="{{ route('users') }}" class="btn btn-link">Regresar a la lista de usuarios</a>
    </form>
  </div>
</div>
@endsection
