<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Facades\API;
use GuzzleHttp\Client;

class CredentialController extends Controller
{
    public function index()
    {
    	return view('client.credentials.index');
    }

    public function regenerate()
    {
    	$client = new Client();
    	
    	$credentials = ['Authorization' => session('token_type') . ' ' . session('token')];

		$response = $client->post(config('api.BASE_URL') . 'api/device/refresh',
        [
            'headers' => $credentials,
        ]);

		$token = $response->getBody()->getContents();

		session()->forget('token');

		session(['token' => $token]);
        

    	return response()->json(['success' => true, 'token' => $token]);
    }
}
