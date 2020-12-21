<?php

namespace App\Http\Controllers;

use App\Models\Ivykiai;
use App\Models\Komanda;
use Illuminate\Http\Request;

class IvykiuController extends Controller
{
    public function index()
    {
        $ivykiai = Ivykiai::all();
        return view('ivykiai.index')->with('ivykiai',$ivykiai);
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
            'komanda_1' => $request->input('Komanda_1'),
            'komanda_2' => $request->input('Komanda_2'),
            'laikas' => $request->input('laikas'),
            'status' => 0,
        ]);
        $ivykis->save();
        return redirect('/ivykiai');
    }

    public function redaguoti(Ivykiai $id)
    {
        $komanda = Komanda::all();
        $ivykis = Ivykiai::find($id)->first();
        return view('ivykiai.redaguoti')->with('ivykis', $ivykis)->with('komanda', $komanda);
    }
    public function redaguoti_done(Request $request)
    {
        $ivykis = Ivykiai::find($request->input('id'));
        $ivykis->pradzia = $request->input('start');
        $ivykis->trukme = $request->input('trukme');
        $ivykis->koeficientas_1 = $request->input('kof_1');
        $ivykis->koeficientas_2 = $request->input('kof_2');
        $ivykis->komanda_1 = $request->input('Komanda_1');
        $ivykis->komanda_2 = $request->input('Komanda_2');
        $ivykis->update();
        return redirect('/ivykiai');
    }

    public function trinti(Ivykiai $id)
    {
        $ivykis = Ivykiai::find($id)->first();
        $ivykis->delete();
        return redirect('/ivykiai');
    }
}
