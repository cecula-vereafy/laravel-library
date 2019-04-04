<?php
/**
 * This API manages all request to Cecula Vereafy services.
 * Initialization, Completion, Resend and Account Balance
 * 
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Guzzlehttp\guzzle;
use GuzzleHttp\Client;    


class vereafyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //
    private $header = [
        'Content-Type' => 'application/json',
        'authorization' => 'Bearer', //Paste your key after the bearer with a space here
        'cache-control' => 'no-cache'
    ];
    // Declaring the mobile variable as private
    private $mobile;
    // Declaring the pin ref variable as private
    private $pinRef;
    // Declaring the token variable as private
    private $token;

    /* Two factor Init
    * Only accept mobile request
    */
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

    /* Two factor Complete
    * Accept pin_ref and token request
    */
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

    /* Two factor Resend
    * Accept pin_ref and mobile request
    */
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

    /* Two factor Account Balance
    * This API only receive a GET method
    */
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
