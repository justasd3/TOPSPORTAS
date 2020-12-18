<?php

namespace App\Http\Controllers;

use App\Models\Ivykiai;
use App\Models\Komanda;
use Illuminate\Http\Request;

class IvykiuController extends Controller
{
    public function index()
    {
        return view('ivykiai.index');
    }

    public function kurti()
    {
        $komanda = Komanda::all();
        return view('ivykiai.kurti')->with('komanda', $komanda);
    }

    public function done(Request $request)
    {
        $ivykis = Ivykiai::create([
            'pradzia' => $request->input('start'),
            'trukme' => $request->input('trukme'),
            'koeficientas_1' => $request->input('kof_1'),
            'koeficientas_2' => $request->input('kof_2'),
            'status' => 0,
        ]);
        $ivykis->save();
        return redirect('/ivykiai');
    }
}
