<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class MewsController extends Controller
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getConfiguration(): Factory|View|Application
    {
        try {
            $response = $this->client->request('POST', 'configuration/get', [
                'verify' => false,
                'json' => [
                    'ClientToken' => 'E0D439EE522F44368DC78E1BFB03710C-D24FB11DBE31D4621C4817E028D9E1D',
                    'AccessToken' => '7059D2C25BF64EA681ACAB3A00B859CC-D91BFF2B1E3047A3E0DEC1D57BE1382',
                    'Client' => 'NameOfYourCompanyOrApplication',
                ],
            ]);
        } catch(GuzzleException $e) {
            dd($e->getMessage());
        }

        $data = json_decode($response->getBody(), true);

        return view('getting-started', compact('data'));
    }
}

