<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    public function send(Request $request, string $action)
    {
        $url = config('services.api.url');
        $data = $request->all();
        $data['token'] = config('services.api.token');
        $data['action'] = $action;

        try {
            $response = Http::get($url, $data);
            return $response->json();
        } catch (\Exception $e) {
            return response()->json([
                'code' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
