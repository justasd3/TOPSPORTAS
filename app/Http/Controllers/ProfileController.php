<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController
{
    public function index()
    {
        return view('profile.index')->with('user', Auth::user());
    }

    public function update(Request $request)
    {

    }
}
