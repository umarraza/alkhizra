<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTFactory;
use JWTAuth;


class AccountController extends Controller
{
    public function createAccount(Request $request) {

//Sends the message to Zoom
//Parameters:
//  $to - User or Channel to send to.  ex. xxxxxxxxxxxxxxxxxxxxxxxx@conference.xmpp.zoom.us
//  $content - object containing the head and body of the message

// $client_id = env('CLIENT_ID');
// $client_secret = env('CLIENT_SECRET');
// $redirect_uri = "http://localhost/alkhizra/get-autorization-code";
// $content = "https://zoom.us/oauth/authorize?response_type=code&client_id=.'$client_id'.&redirect_uri=.$redirect_uri";

$client_id = env('CLIENT_ID');
$client_secret = env('CLIENT_SECRET');
$content = "grant_type=authorization_code&client_id=$client_id&client_secret=$client_secret";
$token_url="https://zoom.us/oauth/token";


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

$access_token = $result->access_token;

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.zoom.us/v2/users?status=active&page_size=30&page_number=1",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array( "authorization: Bearer $access_token" ),
));


$requestData = curl_exec($curl);
curl_close($curl);
$getData = json_decode($requestData);

dd($getData);






        $client_id = env('CLIENT_ID');
        $client_secret = env('CLIENT_SECRET');
        $redirect_uri = "http://localhost/alkhizra/get-autorization-code";
        $content = "https://zoom.us/oauth/authorize?response_type=code&client_id=.'$client_id'.&redirect_uri=.$redirect_uri";

        $client = new \GuzzleHttp\Client();
        $request = $client->get("https://zoom.us/oauth/authorize?response_type=code&client_id=.'$client_id'.&redirect_uri=.$redirect_uri");
        $response = $request->getBody()->getContents();
        print_r($response);
        die();






        $token_url="https://zoom.us/oauth/token";

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            
            CURLOPT_URL => $content,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true
            // CURLOPT_POSTFIELDS => $content
        
        ));
        
        $data = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($data);

        dd($result);

        // Zoom gave an access token to alkhizra in order to managae Zoom user's meeting on user's behalf
        // alkhizra will send this token to authorize alkhizra to make changes/get rescources/ on the user's behalf 
        
        $access_token = $result->access_token;

        $client = new \GuzzleHttp\Client();
        
        $api_key = env('API_KEY');
        $api_secret = env('API_SECRET');
        
        $response = $client->request('POST', 'https://api.zoom.us/v2/accounts/', [

            'form_params' => [

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $request->password
            ],

            'headers' => [
                // 'jwt_token' => $jwt_token,
                'Accept' => 'application/json',
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Grant-Type' => 'Client Credentials',
                'Authorization'     => 'Bearer '. $access_token
            ],
        ]);
        $response = $response->getBody()->getContents();
        dd($response);
    }

    public function createAccountForm() {

        $api_key = env('API_KEY');
        $api_secret = env('API_SECRET');
        $client_secret = env('CLIENT_SECRET');
        return view('Accounts.createAccount',compact('api_key','api_secret','client_secret'));
    }
}
