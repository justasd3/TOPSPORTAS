<?php

namespace App\Http\Controllers;
use App\Models\Pasiulymai;
use Illuminate\Http\Request;

class PasiulymuController extends Controller
{
    public function index()
    {
        $pasiulymai = Pasiulymai::all();
        return view('pasiulymai.index')->with('pasiulymai',$pasiulymai);
    }

    public function kurti()
    {
        return view('pasiulymai.kurti');
    }

    public function done(Request $request)
    {
        $pasiulymas = Pasiulymai::create([
            'pradzia' => $request->input('start'),
            'pabaiga' => $request->input('end'),
            'informacija' => $request->input('informacija'),
            'pavadinimas' => $request->input('pavadinimas')
        ]);
        $pasiulymas->save();
        return redirect('/pasiulymai');
    }

    public function redaguoti(Pasiulymai $id)
    {
        $pasiulymas = Pasiulymai::find($id)->first();
        return view('pasiulymai.redaguoti')->with('pasiulymas', $pasiulymas);
    }

    public function redaguoti_done(Request $request)
    {
        $pasiulymas = Pasiulymai::find($request->input('id'));
        $pasiulymas->pradzia = $request->input('start');
        $pasiulymas->pabaiga = $request->input('end');
        $pasiulymas->informacija = $request->input('informacija');
        $pasiulymas->pavadinimas = $request->input('pavadinimas');
        //dd($request);
        $pasiulymas->update();
        return redirect('/pasiulymai');
    }


}
