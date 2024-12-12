<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SystemeService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('SYSTEME_API_KEY');
        $this->baseUrl = env('SYSTEME_BASE_URL', 'https://api.systeme.io/api/contacts');
    }

    public function addSubscriber($email, $listId, $firstName = null, $lastName = null)
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$this->apiKey}",
            'Accept' => 'application/json',
        ])->post("{$this->baseUrl}/contacts", [
            'email' => $email,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'tags' => [$listId], // Associate with a specific list or tag
        ]);

        return $response->json();
    }

    public function getContacts()
    {
        $response = Http::withHeaders([
            'X-API-Key' =>  $this->apiKey,  // Replace with your actual API key
        ])->get('https://api.systeme.io/api/contacts');

        if ($response->successful()) {
            return $response->json(); // Return the response data
        } else {
            return ['error' => 'Unable to fetch contacts']; // Return error message if the request fails
        }
    }
}
