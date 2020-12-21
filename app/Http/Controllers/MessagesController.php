<?php

namespace App\Http\Controllers;

use App\Models\UserMessages;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $email = Auth::user()->email;
            $messages = UserMessages::where('receiver', $email)->get();

            return view('messages.index')->with('messages',$messages);
        }
        return view('messages.index');
    }

    public function create()
    {
        $users = User::all();

        return view('messages.create')->with('users', $users);
    }

    public function delete(int $id)
    {
        error_log($id);
        $message = UserMessages::where('id', $id)->first();
        var_dump($message);
        $message->delete();

        return redirect()->route('messages');
    }

    public function send(Request $request)
    {

        $message = UserMessages::create([
            'text'=>$request->input('text'),
            'sender'=>Auth::user()->email,
            'date'=>date("Y-m-d H:i:s"),
            'receiver'=>$request->input('receiver')
        ]);

        return redirect()->route('messages');
    }
}
