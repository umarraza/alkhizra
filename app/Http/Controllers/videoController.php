<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class videoController extends Controller
{
    public function getUsers($id) {


        //get classId and create a meeting against this id
        $api_url = "https://api.zoom.us/v2/users/".$id."/meetings";
        $curl = curl_init();

        curl_setopt_array($curl, array(

            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer 39ug3j309t8unvmlmslmlkfw853u8",
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
