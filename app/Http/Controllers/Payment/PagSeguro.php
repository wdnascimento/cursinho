<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Config;

class PagSeguro extends Controller
{
    // private $token = env('PAGSEGURO_TOKEN','ddffads');
    // private $endpoint = 'https://sandbox.api.pagseguro.com';
    private $token, $endpoint;

    public function __construct()
    {
        // $this->token = env('PAGSEGURO_TOKEN','94dd346c-8922-4270-9f45-8c58ec67d2f7ce1579f4403892d08bfc4116ec664eb41b0a-ce6d-459d-9cd0-a879fac66345');
        $this->token = env('PAGSEGURO_TOKEN','74964B5C438748BD8EC9F636C4DA4A91');
        $this->endpoint = 'https://sandbox.api.pagseguro.com';
    }

    // public function index(Request $request )
    // {
    //     $client = new \GuzzleHttp\Client();

    //     $response = $client->request('POST', 'https://sandbox.api.pagseguro.com/orders', [
    //         'body' =>
    //             '{"reference_id":"ex-00001","customer":{"name":"Wagner Nascimento","email":"email@test.com","tax_id":"12345678909"
    //             ,"phones":[{"country":"55","area":"11","number":"999999999","type":"MOBILE"}]}
    //             ,"items":[{"reference_id":"referencia do item","name":"nome do item","quantity":1,"unit_amount":500}]
    //             ,"qr_codes":[{"amount":{"value":500}}]
    //             ,"notification_urls":["https://meusite.com/notificacoes"]}',
    //         'headers' => [
    //             'Authorization' => 'Bearer 74964B5C438748BD8EC9F636C4DA4A91',
    //             'accept' => 'application/json',
    //             'content-type' => 'application/json',
    //         ],
    //     ]);

    //     echo $response->getBody();
    // }

    public function index()
    {

        $body =[
            "reference_id" => "PED0001",
            "customer" => [
                "name" => "Wagner Nascimento",
                "email" => "wagnerinfo@hotmail.com",
                "tax_id" => "04429507996",
            ],
            "items" => [
                [
                    "name" => "Inscrição",
                    "quantity" => 1,
                    "unit_amount" => 500
                ]
            ],
            "qr_codes" => [
                [
                    "amount" => [
                    "value" => 500
                    ],
                    "expiration_date" => "2024-04-29T20:15:59-03:00",
                ]
            ],
            "notification_urls" => [
                "https://wnascimento.com.br"
            ]
        ];


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->endpoint.'/orders');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_CAINFO, public_path("certifify/cacert.pem"));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type:application/json',
            'Authorization: Bearer '.$this->token
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            var_dump($error);
            die();
        }

        $data = json_decode($response, true);

        return view('payment.index',compact('data'));
    }

    public function pedido($pedido){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $this->endpoint.'/orders/'.$pedido, [
            'headers' => [
                'Authorization' => 'Bearer '.$this->token,
                'accept' => 'application/json',
            ],
            ]);

            echo ($response->getBody());

    }

    public function return(Request $request){
        Log::critical($request);
    }


    public function pay($id)
    {

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->endpoint.'/pix/pay/'.$id);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_CAINFO, public_path("certifify/cacert.pem"));
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Content-Type:application/json',
            'Authorization: Bearer '.$this->token
        ]);


        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            var_dump($error);
            die();
        }

        $data = json_decode($response, true);

        echo ($data);

    }



}
