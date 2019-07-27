<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function createAccount(Request $request) {

        $clientID="4Z4EoIEtRV6MjEmga75K_w";
        $clientSecret="J3GsToxWSvPNv8Qx0tI8KXE496RW10Vr";
        $content = "grant_type=client_credentials&client_id=$clientID&client_secret=$clientSecret";
        $token_url="https://zoom.us/oauth/token";

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            
            CURLOPT_URL => $token_url,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $content
        
        ));
        
        $data = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($data);

        // Zoom gave an access token to alkhizra in order to managae Zoom user's meeting on user's behalf
        // alkhizra will send this token to authorize alkhizra to make changes/get rescources/ on the user's behalf 
        $access_token = $result->access_token;

        $client = new \GuzzleHttp\Client();
        
        
        $response = $client->request('POST', 'https://api.zoom.us/v2/accounts', [

            'form_params' => [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password
            ],

            'headers' => [
                'API Key' => 'mI8UalOgQp6xPLXUaYZedQ',
                'API Secret' => '8r3HYJdwBoeY6u47n9FvvF07RhWjWSj8kM56',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization'     => 'Bearer '. $access_token
            ],
        ]);
        $response = $response->getBody()->getContents();
        dd($response);
    }
}
