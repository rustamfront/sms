<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    public function send(Request $request, string $action)
    {
        $url = 'https://postback-sms.com/api/';
        $data = $request->all();
        $data['token'] = '5994c91001f57eea808aff11738d752a';
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
