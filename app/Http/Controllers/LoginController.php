<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function getPage()
    {
        return view('login');
    }

    public function postPage(Request $request)
    {
        return 'Le nom est ' . $request->input('id') . ' et le mot de passe est ' . $request->input('password');
    }
}
