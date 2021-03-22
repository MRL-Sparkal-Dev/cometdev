<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     *  Show Admin Login Form
     */
    public function showAdminLoginForm(){
       return view('admin.login');
    }

    /**
     *  Show Admin Registration Form
     */
    public function showAdminRegisterForm(){
       return view('admin.register');
    }

    /**
     *  Show Admin Dashboard page
     */
    public function showAdminDashboard(){
       return view('admin.dashboard');
    }
}
