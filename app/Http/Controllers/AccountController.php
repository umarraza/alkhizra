<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function createAccount(Request $request) {


        $client_id = env('CLIENT_ID');
        $client_secret = env('CLIENT_SECRET');

        
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
        
        $api_key = env('API_KEY');
        $api_secret = env('API_SECRET');
        
        $response = $client->request('POST', 'https://api.zoom.us/v2/accounts', [

            'form_params' => [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password
            ],

            'headers' => [
                'API Key' => $api_key,
                'API Secret' => $api_secret,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization'     => 'Bearer '. $access_token
            ],
        ]);
        $response = $response->getBody()->getContents();
        dd($response);
    }

    public function createAccountForm() {
        return view('Accounts.createAccount');
    }
}
