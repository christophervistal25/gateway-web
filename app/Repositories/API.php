<?php
namespace App\Repositories;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class API 
{
    public function getClient()
    {
    	return new Client([
		    // Base URI is used with relative requests
		    'base_uri' => config('api.BASE_URL'),
            'http_errors' => false,
		]);
    }

    public function post(string $uri, array $data = []) :Response 
    {
    	return $this->getClient()
    				->request('POST', $uri, [
					    'form_params' => $data
					]);
    }

    
}
