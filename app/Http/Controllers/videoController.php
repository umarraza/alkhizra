<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class videoController extends Controller
{
    public function createMeeting($id) {

        $params = [
            "first_name" => "umar",
            "last_name" => "raza", 
            "email" => "umar@gmail.com",
            "password" => "1ds2d424s"
        ];

        $api_url = "https://api.zoom.us/v2/accounts";
        $url = rtrim($api_url,"?") . "?" . http_build_query($params);
        //get classId and create a meeting against this id
        // $api_url = "https://api.zoom.us/v2/users/".$id."/meetings";
        $curl = curl_init();
        curl_setopt_array($curl, array(

            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer safGb4J4RY_o_7A8aGKS6-9ss44d7UYxw",
                "content-type: application/json"
            ),
        ));

        // get the response against the created meeting. get the join url and send to all students to participate in meeting
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
        echo $response;
        }
    }
}
