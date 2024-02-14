<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginRegisterController extends Controller
{
    public function loginRegisterForm()
    {

        return view('customer.auth.login-register');
    }
}
