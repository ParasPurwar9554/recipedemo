<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function index()
    {
    	
        return view('adminlogin');
    }

    public function loginAdmin(Request $request){
    	 $username = trim($request->post('username'));
    	 $userpass = trim($request->post('userpass'));
    	 $request->session()->put('username', $username);
    	 $request->session()->put('userpass', $userpass);
    	 if($username =="admin" && $userpass == "admin"){
             return redirect()->action('CuisineController@index');
           // return view('adminlogin');
    	 }else{
    	 	echo "Invalid login"; die;
    	 }
    }

    public function logout(Request $request){
       $request->session()->flush();
       return redirect()->action('AdminLoginController@index');
    }
}
