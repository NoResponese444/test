<?php

namespace App\Http\Controllers;

use App\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    public function login(){
        return view('/');
    }

    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;
        $data = ModelUser::where('Email',$email)->first();
        if($data){
            if($password == $data->Password){
                Session::put('Name',$data->Name);
                Session::put('Email',$data->Email);
                Session::put('login',TRUE);
                return redirect('menu');
            }
            else{
                return redirect('/')->with('alert','Password Salah!');
            }
        }
        else{
            return redirect('/')->with('alert','User belum terdaftar!');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/')->with('alert','Kamu sudah logout');
    }
    public function index(){
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('menu');
        }
    }
}
