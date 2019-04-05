<?php

namespace Cecula\Vereafy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Guzzlehttp\guzzle;
use GuzzleHttp\Client; 



class vereafyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Header
    private $header = [
        'Content-Type' => 'application/json',
        'authorization' => 'Bearer CCL.a0iu7wHUQBq1-20.vqqPZkKTt2HuBZ3iGdiZIqvq',
        'cache-control' => 'no-cache'
    ];
    // Mobile
    private $mobile;
    // Pin Ref
    private $pinRef;
    // Token
    private $token;

    public function init(Request $request)
    {
        $client = new Client([
            'headers' => $this->header
                ]);
        $res = $client->request('POST', 'https://api.cecula.com/twofactor/init',[
            'json' => [
                'mobile' => $this->mobile = $request->mobile
            ]
        ]);
        $data = $res->getBody();
        return $data;

    }

    public function complete(Request $request)
    {
        $client = new Client([
            'headers' => $this->header
                ]);
        $res = $client->request('POST', 'https://api.cecula.com/twofactor/complete',[
            'json' => [
                'pinRef' => $this->pinRef = $request->pin_ref,
                'token' => $this->token = $request->token
            ],
        ]);
        $data = $res->getBody();
        return $data;
    }

    public function resend(Request $request)
    {
        $client = new Client([
            'headers' => $this->header
                ]);
        $res = $client->request('POST', 'https://api.cecula.com/twofactor/resend',[
            'json' => [
                'pinRef' => $this->pinRef = $request->pin_ref,
                'mobile' => $this->mobile = $request->mobile
            ],
        ]);
        $data = $res->getBody();
        return $data;
    }

    public function balance()
    {
        $client = new Client([
            'headers' => $this->header
                ]);
        $res = $client->request('GET', 'https://api.cecula.com/account/tfabalance',[
        ]);
        $data = $res->getBody();
        return $data;
    }
   
}
