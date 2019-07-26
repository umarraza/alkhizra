<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class videoController extends Controller
{
    function getAccessToken() 
    {

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
        
        $response = curl_exec($curl);
        curl_close($curl);
    
        $access_token = json_decode($response);
        dd($access_token);
    
    }
}
