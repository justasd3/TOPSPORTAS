<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use DB;

class BalanceController extends Controller
{
    public function index($pid)
    {
        $player = DB::select('SELECT * FROM players WHERE id = ?',[$pid]);
        return view('my-balance.index', ['player'=>$player]);
    }

    public function addBalance(Request $request) {
        $data = $request->input();
        $player = DB::select('SELECT * FROM players WHERE id = ?',[$data['playerId']]);
        $newBalance = ((int)$player[0]->Balance + (int)$data['addBalanceAmount']);
        $newBank = ((int)$player[0]->Bank - (int)$data['addBalanceAmount']);

        DB::update('UPDATE players SET Balance = ? WHERE id = ?', [$newBalance, $data['playerId']]);
        DB::update('UPDATE players SET Bank = ? WHERE id = ?', [$newBank, $data['playerId']]);

        $transaction = Transaction::create([
            'kiekis' => $request->input('addBalanceAmount'),
            'papildymas' => '1',
            'data' => date('Y-m-d'),
            'ZaidejoId' => $request->input('playerId')
        ]);
        $transaction->save();

		return redirect('../my-balance/playerId='.$data['playerId']);
    }

    public function withdrawToBank(Request $request) {
        $data = $request->input();
        $player = DB::select('SELECT * FROM players WHERE id = ?',[$data['playerId']]);
        $newBalance = ((int)$player[0]->Balance - (int)$data['removeBalanceAmount']);
        $newBank = ((int)$player[0]->Bank + (int)$data['removeBalanceAmount']);

        DB::update('UPDATE players SET Balance = ? WHERE id = ?', [$newBalance, $data['playerId']]);
        DB::update('UPDATE players SET Bank = ? WHERE id = ?', [$newBank, $data['playerId']]);

        $transaction = Transaction::create([
            'kiekis' => $request->input('removeBalanceAmount'),
            'papildymas' => '0',
            'data' => date('Y-m-d'),
            'ZaidejoId' => $request->input('playerId')
        ]);
        $transaction->save();

		return redirect('../my-balance/playerId='.$data['playerId']);
    }

    public function history($pid)
    {
        $player = DB::select('SELECT * FROM players WHERE id = ?',[$pid]);
        $transactions = DB::select('SELECT * FROM transactions WHERE ZaidejoId = ?', [$pid]);

        return view('my-balance.history', ['player'=>$player], ['transactions'=>$transactions]);
    }
}
