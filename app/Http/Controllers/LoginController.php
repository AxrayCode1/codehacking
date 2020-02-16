<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Requests;

class LoginController extends Controller
{
    //
    public function redirect(){                 
        if(Auth::user()->role->name == 'administrator'){
            return redirect('/admin/users');
        }else{        
            return redirect('/');
        }
    } 
}
