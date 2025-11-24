@extends('layouts.app')
@section('title', 'Editar Cliente')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Editar Cliente</h3>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary btn-sm">
                Volver al listado
            </a>
        </div>

        <form action="{{ route('clients.update', $client) }}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text"
                           name="first_name"
                           class="form-control @error('first_name') is-invalid @enderror"
                           value="{{ old('first_name', $client->first_name) }}">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Apellido</label>
                    <input type="text"
                           name="last_name"
                           class="form-control @error('last_name') is-invalid @enderror"
                           value="{{ old('last_name', $client->last_name) }}">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $client->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text"
                           name="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           value="{{ old('phone', $client->phone) }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Notas</label>
                    <textarea name="notes"
                              rows="3"
                              class="form-control @error('notes') is-invalid @enderror">{{ old('notes', $client->notes) }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    Guardar cambios
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
