@extends('layouts.app')
@section('title', 'Clientes')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="mb-0">Clientes</h3>
                <small class="text-secondary">Listado general</small>
            </div>

            <div>
                <a href="{{ route('home') }}" class="btn btn-secondary me-2">
                    ← Inicio
                </a>

                <a href="{{ route('clients.create') }}" class="btn btn-primary">
                    + Nuevo cliente
                </a>
            </div>
        </div>

        {{-- ✅ FLASH ERRORS --}}
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- ⭐ FLASH SUCCESS (opcional) --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($clients->count() === 0)
            <div class="alert alert-dark text-center">
                No hay clientes cargados todavía.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->last_name }}</td>
                                <td>{{ $client->first_name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->phone ?? '-' }}</td>

                                <td class="text-end">
                                    <a href="{{ route('clients.sales.index', $client) }}"
                                       class="btn btn-sm btn-secondary">
                                        Ver ventas
                                    </a>

                                    <a href="{{ route('clients.show', $client) }}" class="btn btn-sm btn-info">
                                        Ver
                                    </a>

                                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-sm btn-warning">
                                        Editar
                                    </a>

                                    <form action="{{ route('clients.destroy', $client) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('¿Eliminar este cliente?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                                    </form>
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
