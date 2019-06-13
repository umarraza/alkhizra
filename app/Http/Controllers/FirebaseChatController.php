<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FirebaseChatController extends Controller
{
    
    public function getUsers(Request $request) {

        $users = User::all();

    }

}
