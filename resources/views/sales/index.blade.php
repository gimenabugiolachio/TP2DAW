@extends('layouts.app')
@section('title', 'Ventas del cliente')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="mb-0">Ventas de {{ $client->first_name }} {{ $client->last_name }}</h3>
                <small class="text-secondary">Cliente #{{ $client->id }}</small>
            </div>

            <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                ← Volver
            </a>
        </div>

        @if(is_null($sales) || count($sales) === 0)
            <div class="alert alert-dark text-center">
                Este cliente no tiene ventas registradas.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID Venta</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale['id'] ?? '-' }}</td>
                                <td>{{ $sale['date'] ?? $sale['fecha'] ?? '-' }}</td>
                                <td>
                                    {{ $sale['total'] ?? $sale['monto'] ?? '-' }}
                                </td>
                                <td>
                                    {{ $sale['detail'] ?? $sale['detalle'] ?? '—' }}
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
