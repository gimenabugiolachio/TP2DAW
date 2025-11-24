<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('last_name')->get();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name'  => ['required','string','max:255'],
            'email'      => ['required','email','max:255','unique:clients,email'],
            'phone'      => ['nullable','string','max:50'],
            'notes'      => ['nullable','string'],
            // 'address' => ['nullable','string','max:255'],
        ], [
            'first_name.required' => 'El nombre es obligatorio.',
            'last_name.required'  => 'El apellido es obligatorio.',
            'email.required'      => 'El email es obligatorio.',
            'email.email'         => 'El email no es válido.',
            'email.unique'        => 'Ya existe un cliente con ese email.',
        ]);

        Client::create($data);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente creado correctamente.');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name'  => ['required','string','max:255'],
            'email'      => ['required','email','max:255','unique:clients,email,' . $client->id],
            'phone'      => ['nullable','string','max:50'],
            'notes'      => ['nullable','string'],
            // 'address' => ['nullable','string','max:255'],
        ], [
            'first_name.required' => 'El nombre es obligatorio.',
            'last_name.required'  => 'El apellido es obligatorio.',
            'email.required'      => 'El email es obligatorio.',
            'email.email'         => 'El email no es válido.',
            'email.unique'        => 'Ya existe un cliente con ese email.',
        ]);

        $client->update($data);

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Client $client)
    {        $client->delete();

        return redirect()
            ->route('clients.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}
