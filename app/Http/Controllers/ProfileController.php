<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function detailed()
    {
        $users = User::all();

        return view('profile.detailed')->with('users', $users);
    }

    public function detailedGet(Request $request)
    {
        $users = User::all();

        if ($request != null)
        {
            $user = User::where('id', $request->input('id'))->first();

            $bets = DB::select('SELECT * FROM bets where ZaidejoId = ?',[$request->input('id')]);

            return view('profile.detailed')
                ->with('users', $users)
                ->with('user', $user)
                ->with('bets', $bets);
        }

        return view('profile.detailed')->with('users', $users);
    }
}
