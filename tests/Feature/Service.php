<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Service extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetAllServices(): void
    {
        $clientToken = "E0D439EE522F44368DC78E1BFB03710C-D24FB11DBE31D4621C4817E028D9E1D";
        $accessToken = "C66EF7B239D24632943D115EDE9CB810-EA00F8FD8294692C940F6B5A8F9453D";
        $client = "Sample Clien.0.0";

        $httpClient = new \GuzzleHttp\Client();
        $response = $httpClient->post('https://api.mews-demo.com/api/connector/v1/services/getAll', [
            'json' => [
                'ClientToken' => $clientToken,
                'AccessToken' => $accessToken,
                'Client' => $client,
            ]
        ]);

        $this->assertEquals(200, $response->getStatusCode());

        $responseData = json_decode($response->getBody()->getContents(), true);
        $this->assertArrayHasKey('Services', $responseData);
        $this->assertNotEmpty($responseData['Services']);
        $this->assertArrayHasKey('Id', $responseData['Services'][0]);
        $this->assertArrayHasKey('IsActive', $responseData['Services'][0]);
        $this->assertArrayHasKey('Name', $responseData['Services'][0]);
        $this->assertArrayHasKey('Type', $responseData['Services'][0]);
    }
}
