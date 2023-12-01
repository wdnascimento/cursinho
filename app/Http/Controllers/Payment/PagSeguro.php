<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PagSeguro extends Controller
{
    private $client ;

    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }
    public function index(Request $request )
    {
        $request = $request->only('name','mail','cpf','id','tax');
        $response = $this->client->request('POST', 'https://sandbox.api.pagseguro.com/orders', [
            'body' => '{
                "customer":
                    {
                        "name":"'.$request['name'].'",
                        "email":"'.$request['mail'].'",
                        "tax_id":"'.$request['cpf'].'"
                    },
                "reference_id":"0199",
                "items": [
                    {
                      "name": "Inscrição Aluno ." '.$request['id'].',
                      "quantity": 1,
                      "unit_amount": '.$request['tax'].'
                    }
                  ],
                  "qr_codes": [
                    {
                      "amount": {
                        "value": '.$request['tax'].'
                      }
                      ,"expiration_date":"2023-12-03T20:15:59-03:00"
                    }
                  ]
            }',
            'headers' => [
                'Authorization' => 'Bearer 74964B5C438748BD8EC9F636C4DA4A91',
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        echo $response->getBody();

    }

    public function pedido($pedido){
        $response = $this->client->request('GET', 'https://sandbox.api.pagseguro.com/orders/'.$pedido, [
            'headers' => [
                'Authorization' => 'Bearer 74964B5C438748BD8EC9F636C4DA4A91',
                'accept' => 'application/json',
            ],
            ]);

            echo ($response->getBody());

    }

    public function return(Request $request){
        Log::critical($request);
    }



}
