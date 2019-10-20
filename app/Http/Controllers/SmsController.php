<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
class SmsController extends Controller
{
    public function send(Request $r)
    {
        $account_sid = getenv("ACaf9ab64b92f8efa8f24514bf49ba4b35");
        $auth_token = getenv("020c23a13ecc2cd8f8d1f641e6b254cb");
        $twilio_number = getenv("+12056354580");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, 
            ['from' => $twilio_number, 'body' => $message] );

            $client->messages->create("+855", $r->number,
             [
                'from' => $twilio_number, 
                'body' => $message
            ]);
    }
}
