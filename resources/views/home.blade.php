@extends('layouts.app')
@section('title', 'Inicio')

@section('content')

<div class="card shadow-sm">
    <div class="card-body text-center">

        <h2 class="mb-2">Bienvenido a SysCo</h2>
        <p class="text-secondary mb-4">Seleccioná el módulo que querés usar</p>

        <div class="d-flex justify-content-center gap-3 flex-wrap">

            <a href="{{ route('clients.index') }}" class="btn btn-primary btn-lg px-5 py-3">
                Clientes
            </a>

            <a href="{{ route('users.index') }}" class="btn btn-dark btn-lg px-5 py-3">
                Usuarios
            </a>

        </div>

    </div>
</div>

@endsection
