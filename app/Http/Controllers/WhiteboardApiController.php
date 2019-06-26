<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WhiteboardApiController extends Controller
{
    public function whiteboardApi(Request $request) {
    
        return $request;

        $type = $request->type;
        $roomToken = $request->room_token;
        $userId = $request->userId;
        $timestamp = $request->timestamp;


    }
}
