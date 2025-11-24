<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return response()->json(User::all(), 200);
    }


  public function store(Request $request)
{
    $request->validate([
        'name' => 'nullable|string|max:255',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'username' => 'nullable|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'nullable|string|max:255',
        'profile' => 'nullable|string|max:255',
        'password' => 'required|string|min:6',
        'role' => 'required|in:admin,gestion,consultas',
    ]);

    $fullName = $request->name ?? ($request->first_name . ' ' . $request->last_name);

    $baseUsername = $request->username
        ?? strtolower(str_replace(' ', '', $request->first_name . $request->last_name));

    $finalUsername = $baseUsername;
    $i = 1;
    while (User::where('username', $finalUsername)->exists()) {
        $finalUsername = $baseUsername . $i;
        $i++;
    }

    $profileDefault = match ($request->role) {
        'admin' => 'Administrador',
        'gestion' => 'Gestión',
        default => 'Consultas',
    };

    $finalProfile = $request->profile ?? $profileDefault;

    $user = User::create([
        'name' => $fullName,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'username' => $finalUsername,
        'email' => $request->email,
        'phone' => $request->phone,
        'profile' => $finalProfile,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return response()->json($user, 201);
}




    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($user, 200);
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'username' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'phone' => 'sometimes|string|max:255',
            'profile' => 'sometimes|string|max:255',
            'password' => 'sometimes|string|min:6',
            'role' => 'sometimes|in:admin,gestion,consultas',
        ]);

        if ($request->has('first_name') || $request->has('last_name')) {
            $first = $request->first_name ?? $user->first_name;
            $last  = $request->last_name  ?? $user->last_name;
            $request->merge(['name' => $first . ' ' . $last]);
        }

        if ($request->has('password')) {
            $request['password'] = Hash::make($request->password);
        }

        $user->update($request->all());

        return response()->json($user, 200);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuario eliminado'], 200);
    }
}
