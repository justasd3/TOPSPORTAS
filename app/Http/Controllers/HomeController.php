<?php

namespace App\Http\Controllers;

use App\Models\Ivykiai;
use App\Models\Komanda;
use App\Models\Bet;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $komandos = Komanda::all();
        $ivykiai = Ivykiai::all();
        $statymai = Bet::all();

        return view('home')->with('ivykiai',$ivykiai)->with('komandos',$komandos)->with('bets',$statymai);
    }

    public function komanda(Request $request)
    {
        $komanda = $request->route('pavadinimas');

        $kom = Komanda::where('pavadinimas','=',$komanda)->first();
        return view('ivykiai.komanda')->with('komanda', $kom);
    }
}
