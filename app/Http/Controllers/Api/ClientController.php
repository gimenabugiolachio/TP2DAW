<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(
            Client::orderBy('last_name')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name'  => ['required','string','max:255'],
            'email'      => ['required','email','max:255','unique:clients,email'],
            'phone'      => ['nullable','string','max:50'],
            'notes'      => ['nullable','string'],
        ]);

        $client = Client::create($data);

        return response()->json([
            'message' => 'Cliente creado',
            'client'  => $client
        ], 201);
    }

    public function show(Client $client)
    {
        return response()->json($client);
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:255'],
            'last_name'  => ['required','string','max:255'],
            'email'      => ['required','email','max:255','unique:clients,email,'.$client->id],
            'phone'      => ['nullable','string','max:50'],
            'notes'      => ['nullable','string'],
        ]);

        $client->update($data);

        return response()->json([
            'message' => 'Cliente actualizado',
            'client'  => $client
        ]);
    }

    public function destroy(Client $client)
    {
        $client->delete(); // soft delete

        return response()->json([
            'message' => 'Cliente eliminado'
        ]);
    }
}
