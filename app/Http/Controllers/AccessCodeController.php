<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Classes;


use App\Models\User;
use Auth;
use DB;


class AccessCodeController extends Controller
{

    public function accessCodeView() {
        
        return view('access_code');

    }

    public function checkAccessCode(Request $request) {

        $user = User::where('accessCode', '=', $request->accessCode)->first();
        if (!empty($user)) {

            $userId = $user->id;
            return view("enter_password", compact('userId'));
        }
    }

    public function newPassword(Request $request) {

        $password = Hash::make($request->password);
        $userId = $request->userId;

        if (!empty($password)) {

            $user = User::where('id', '=', $userId)->update([

                'password' => $password,

            ]);
            return view('welcome');
        }
    }


}
