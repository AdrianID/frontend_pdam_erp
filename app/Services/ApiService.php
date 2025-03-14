<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class ApiService
{
    protected $client;
    protected $baseUrl;
    protected $token;
    public function __construct()
    {
        $this->baseUrl = env('API_BASE_URL');
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 30,
        ]);
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function request($method, $endpoint, $data = [])
    {
        try {
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoxLCJlbWFpbCI6ImVsaTc4QGV4YW1wbGUuY29tIiwicm9sZSI6InBlbGFuZ2dhbiIsImV4cCI6MTc0MjAxNzE4OH0.R70Ycicfi3HvAgDLJN4kC3ZaGcLQ1cXlQFPuhJLQJes',
            ];

            $response = $this->client->request($method, $endpoint, [
                'headers' => $headers,
                'json' => $data,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Handle error appropriately
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
} 