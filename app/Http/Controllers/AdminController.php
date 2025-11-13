<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.default');
    }

    public function forgotPassword()
    {
        return view('auth.forgotpassword');
    }
}
