@extends('layouts.app')
@section('title', 'Usuarios')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="mb-0">Usuarios</h3>
                <small class="text-secondary">Listado general</small>
            </div>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('users.create') }}" class="btn btn-primary">
                    + Nuevo usuario
                </a>
            @endif
        </div>

        @if($users->count() === 0)
            <div class="alert alert-dark text-center">
                No hay usuarios cargados todavía.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    <span class="badge bg-secondary text-uppercase">
                                        {{ $user->role }}
                                    </span>
                                </td>

                                <td class="text-end">

                                    <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-info">
                                        Ver
                                    </a>

                                    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'gestion')
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">
                                            Editar
                                        </a>
                                    @endif

                                    @if(auth()->user()->role === 'admin')
                                        <form action="{{ route('users.destroy', $user) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('¿Eliminar este usuario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        @endif

    </div>
</div>

@endsection
