<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagSeguro extends Controller
{
    private $client ;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }
    public function index()
    {

        $response = $this->client->request('POST', 'https://sandbox.api.pagseguro.com/orders', [
            'body' => '{
                "customer":
                    {
                        "name":"Jose da Silva",
                        "email":"email@test.com",
                        "tax_id":"12345678909"
                    },
                "reference_id":"0199",
                "items": [
                    {
                      "name": "nome do item",
                      "quantity": 1,
                      "unit_amount": 500
                    }
                  ],
                  "qr_codes": [
                    {
                      "amount": {
                        "value": 500
                      }
                      ,"expiration_date":"2023-10-03T20:15:59-03:00"
                    }
                  ]
            }',
            'headers' => [
                'Authorization' => 'Bearer B58C13A3616137C664AE1FA4AD9621CB',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        echo $response->getBody();

    }

    public function pedido($pedido){
        $response = $this->client->request('GET', 'https://sandbox.api.pagseguro.com/orders/'.$pedido, [
            'headers' => [
                'Authorization' => '09FBF01FF51F41ABB052C150992A4532',
                'accept' => 'application/json',
            ],
            ]);

            echo $response->getBody();

    }



}
