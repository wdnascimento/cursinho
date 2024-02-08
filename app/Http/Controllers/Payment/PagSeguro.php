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
    }
    public function index(Request $request )
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://sandbox.api.pagseguro.com/orders', [
          'body' => '{"customer":{"name":"Wagner","email":"wagnerinfo@gmail.com","tax_id":"04429507996"},"reference_id":"11222"}',
          'headers' => [
            'Authorization' => 'Bearer 74964B5C438748BD8EC9F636C4DA4A91',
            'accept' => 'application/json',
            'content-type' => 'application/json',
          ],
        ]);

        dd ($response->getBody());

    }

    public function pedido($pedido){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://sandbox.api.pagseguro.com/orders/'.$pedido, [
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
