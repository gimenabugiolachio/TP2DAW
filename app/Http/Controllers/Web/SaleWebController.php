<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Http;

class SaleWebController extends Controller
{
    public function index(Client $client)
    {
        $baseUrl = config('services.sales.url');
        $token   = config('services.sales.token');

        if (
            !$baseUrl ||
            str_contains($baseUrl, 'URL-DEL-SERVICIO-EXTERNO') ||
            !$token ||
            $token === 'PEGAR_TOKEN_JWT_ACA'
        ) {
            $sales = [
                [
                    'id' => 1,
                    'date' => now()->subDays(3)->format('Y-m-d'),
                    'total' => 15000,
                    'detail' => 'Venta demo del sistema'
                ],
                [
                    'id' => 2,
                    'date' => now()->subDays(1)->format('Y-m-d'),
                    'total' => 22000,
                    'detail' => 'Compra ficticia para presentación'
                ],
            ];

            return view('sales.index', compact('client', 'sales'))
                ->with('error', 'Servicio externo no configurado. Mostrando ventas de demostración.');
        }

        try {
            $request = Http::acceptJson();

            if (!empty($token)) {
                $request = $request->withToken($token);
            }

            $url = rtrim($baseUrl, '/') . "/clients/{$client->id}/sales";

            $response = $request->get($url);

            if ($response->failed()) {
                return back()->with('error', 'Error desde el servicio externo: ' . $response->status());
            }

            $sales = $response->json();

            return view('sales.index', compact('client', 'sales'));

        } catch (\Throwable $e) {
            return back()->with('error', 'Error de comunicación con servicio externo.');
        }
    }
}
