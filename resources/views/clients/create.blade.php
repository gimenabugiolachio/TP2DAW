@extends('layouts.app')
@section('title', 'Nuevo Cliente')

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        <h3 class="mb-3">Nuevo Cliente</h3>

        <form action="{{ route('clients.store') }}" method="POST" autocomplete="off">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text"
                           name="first_name"
                           class="form-control @error('first_name') is-invalid @enderror"
                           value="{{ old('first_name') }}">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Apellido</label>
                    <input type="text"
                           name="last_name"
                           class="form-control @error('last_name') is-invalid @enderror"
                           value="{{ old('last_name') }}">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text"
                           name="phone"
                           class="form-control @error('phone') is-invalid @enderror"
                           value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Notas</label>
                    <textarea name="notes"
                              rows="3"
                              class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>
                    @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Volver</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>

    </div>
</div>

@endsection
