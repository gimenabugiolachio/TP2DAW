@extends('layouts.app')
@section('title', 'Detalle Cliente')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="mb-0">
                    {{ $client->first_name }} {{ $client->last_name }}
                </h3>
                <small class="text-secondary">Detalle del cliente</small>
            </div>

            <a href="{{ route('clients.index') }}" class="btn btn-secondary btn-sm">
                Volver
            </a>
        </div>

        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between">
                <strong>ID</strong>
                <span>#{{ $client->id }}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
                <strong>Email</strong>
                <span>{{ $client->email }}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between">
                <strong>Teléfono</strong>
                <span>{{ $client->phone ?? '-' }}</span>
            </li>

            <li class="list-group-item">
                <strong>Notas</strong>
                <div class="mt-1 text-secondary">
                    {{ $client->notes ?? 'Sin notas' }}
                </div>
            </li>

            <li class="list-group-item d-flex justify-content-between">
                <strong>Creado</strong>
                <span>{{ $client->created_at }}</span>
            </li>
        </ul>

        <div class="d-flex gap-2">
            <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">
                Editar
            </a>

            <form action="{{ route('clients.destroy', $client) }}" method="POST"
                  onsubmit="return confirm('¿Eliminar este cliente?')" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Eliminar</button>
            </form>

            <a href="#" class="btn btn-info ms-auto disabled">
                Ver ventas (próximo paso)
            </a>
        </div>

    </div>
</div>

@endsection
