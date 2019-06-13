<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Emails;
use App\Models\Messages;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{

    public function create(Request $request) 
    {

        $rules = [
            'email'   =>  'required|unique:emails',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($rules);
        } else {
            
                $email = Emails::create([
    
                    'email'   =>  $request->email,
        
                ]);
                
                if ($email->save()) {
        
                    return redirect('show-emails');
        
                }
        }
    }

    public function show()
    {
        $emails = Emails::all();
        return view('show-emails', compact('emails')); 
    }

    public function store(Request $request) 
    {
        $rules = [
            'body'   =>  'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($rules);
        } else {
            
            $email = Messages::create([
    
                'body'   =>  $request->body,
    
            ]);
            
            if ($email->save()) {
    
                return redirect('show-emails');
    
            }
        }
    }

    public function sendMails(Request $request) {

        $rules = [
            'body'   =>  'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){

            return redirect()->back()->withErrors($rules);

        } else {
            
            $emailMessage = Messages::create([
    
                'body'   =>  $request->body,
    
            ]);
            
            $emailMessage->save();
        }

        $listMails = Emails::all();

        $emails = [];

        foreach ($listMails as $value) {

            $emails[] = $value->email;

        }

        $emailMessage = $request->body;

        Mail::send('mail', ['emailMessage' => $emailMessage], function ($message) use ($request, $emails)
        {
            $message->from('no-reply@yourdomain.com', 'Joe Smoe');
            $message->to( $emails);
            $message->subject("New Email From Your site");

        });

        return "Emails Send successfully!";
    }

    public function delete($id){

        $email = Emails::find($id);

        if ($email->delete()){

            return redirect('show-emails');

        }
    }
}

