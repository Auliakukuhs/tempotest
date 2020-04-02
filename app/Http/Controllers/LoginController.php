<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use Auth;
use Crypt;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function index()
    {
        if(Session::get('login')){
            return redirect('login/sukses');
        }
        else{
            return view('pengguna.login');
        }
    }

    function checklogin(Request $request)
    {
        $this->validate($request, [
            'login'   => 'required',
            'pswd'  => 'required'
        ]);

        $login = $request->login;
        $pswd = $request->pswd;

        $data = Pengguna::where('login',$login)->first();

        if($data){ //apakah email tersebut ada atau tidak
            if(Crypt::decryptString($data->pswd) == $pswd){
                Session::put('id_user',$data->login);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('login/sukses');
            }
            else{
                return back()->with('error', 'ID User atau Password Salah!');
            }
        }
        else{
            return back()->with('error', 'ID User atau Password Salah!');
        }
    }

    function successlogin()
    {
        if(!Session::get('login')){
            return redirect('login')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('pengguna.loginsukses');
        }
    }

    function logout()
    {
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }
}
