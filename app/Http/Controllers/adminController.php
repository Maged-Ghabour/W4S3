<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{

    public function Create(){
        return view('Admin.create');
    }


    public function Store(Request $request){
        // code ......

        $data = $this->validate($request,[
           "name"   => "required|min:3",
           "email"  => "required|email|unique:users",
           "password" => ["required",Password::min(6)->letters()]
        ]);


        $data['password'] = bcrypt($data['password']);

       $op =   Admin :: create($data);

       if($op){
           $message = 'Raw Inserted';
       }else{
           $message = 'Error Try Again';
       }




     session()->flash('Message',$message);

     return redirect(url('/Admin/'));

    }


    ########################################################

            # login
            public function login(){
                return view('Admin.login');
            }



            public function doLogin(Request $request){

                // code ....

                $data = $this->validate($request,[
                  "email"  => "required|email",
                  "password" => ["required","Password::min(6)->letters()"]
               ]);


               if(auth()->attempt($data)){

                  return  redirect(url('/Admin/'));
               }else{
                   session()->flash('Message','Error IN yOUR Cred Try Again');
                   return  redirect(url('/Login/'));
               }


          }

}
