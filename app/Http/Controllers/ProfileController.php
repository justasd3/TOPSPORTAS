<?php


namespace App\Http\Controllers;

use App\Models\User;
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
        User::where('id', Auth::user()->id)
            ->update(['address' => $request->input('address'),
                'phoneNo' => $request->input('phoneNo')]);

        return redirect()->route('profile');
    }
}
