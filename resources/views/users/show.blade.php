@extends('layouts.app')
@section('title', 'Detalle de usuario')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <h3 class="mb-3">Detalle de usuario</h3>

        <div class="row mb-4">

            <div class="col-md-6">
                <p><strong>Nombre:</strong> {{ $user->first_name }}</p>
                <p><strong>Apellido:</strong> {{ $user->last_name }}</p>
                <p><strong>Nombre completo:</strong> {{ $user->name }}</p>
                <p><strong>Usuario:</strong> {{ $user->username }}</p>
            </div>

            <div class="col-md-6">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Teléfono:</strong> {{ $user->phone ?? '-' }}</p>
                <p><strong>Perfil:</strong> {{ $user->profile }}</p>

                <p>
                    <strong>Rol:</strong>
                    <span class="badge
                        @if($user->role === 'Administrador') bg-danger
                        @elseif($user->role === 'Gestión') bg-warning
                        @else bg-info
                        @endif">
                        {{ strtoupper($user->role) }}
                    </span>
                </p>
            </div>

        </div>

        <hr>

        <div class="d-flex gap-2 mt-3">

            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                Volver
            </a>

            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">
                Editar
            </a>

            <form action="{{ route('users.destroy', $user) }}"
                  method="POST"
                  onsubmit="return confirm('¿Eliminar este usuario?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">
                    Eliminar
                </button>
            </form>

        </div>

    </div>
</div>

@endsection
