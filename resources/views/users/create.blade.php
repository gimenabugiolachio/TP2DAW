@extends('layouts.app')
@section('title', 'Crear usuario')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">

        <h3 class="mb-3">Nuevo usuario</h3>

        <form action="{{ route('users.store') }}" method="POST" novalidate>
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Nombre *</label>
                    <input type="text"
                           name="first_name"
                           class="form-control @error('first_name') is-invalid @enderror"
                           value="{{ old('first_name') }}"
                           required>
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Apellido *</label>
                    <input type="text"
                           name="last_name"
                           class="form-control @error('last_name') is-invalid @enderror"
                           value="{{ old('last_name') }}"
                           required>
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nombre completo *</label>
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Ej: Juan Pérez"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Debe existir porque la BD no permite NULL.</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Usuario (username) *</label>
                    <input type="text"
                           name="username"
                           class="form-control @error('username') is-invalid @enderror"
                           value="{{ old('username') }}"
                           required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Email *</label>
                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}"
                           required>
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

                <div class="col-md-6">
                    <label class="form-label">Rol *</label>
                    <select name="role"
                            class="form-select @error('role') is-invalid @enderror"
                            required>
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>Seleccioná un rol</option>
                        <option value="Administrador" {{ old('role')=='Administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="Gestión" {{ old('role')=='Gestión' ? 'selected' : '' }}>Gestión</option>
                        <option value="Consultas" {{ old('role')=='Consultas' ? 'selected' : '' }}>Consultas</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Perfil *</label>
                    <input type="text"
                           name="profile"
                           class="form-control @error('profile') is-invalid @enderror"
                           value="{{ old('profile') }}"
                           placeholder="Ej: Administrador / Gestión / Consultas"
                           required>
                    @error('profile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">Debe existir porque la BD no permite NULL.</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Contraseña *</label>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Repetir contraseña *</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           required>
                </div>

            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    Guardar
                </button>

                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Volver
                </a>
            </div>
        </form>

    </div>
</div>
@endsection
