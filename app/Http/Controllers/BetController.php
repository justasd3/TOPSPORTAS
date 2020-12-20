<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Bet;

use DB;

class BetController extends Controller
{
    public function playerIndex()
    {
        $players = DB::select('select * from person');
        return view('displayFunctions',['players'=>$players]);
    }

    public function index($playerId)
    {
        $bets = DB::select('select * from bets where ZaidejoId = ?',[$playerId]);
        return view('statymai/allBets',['bets'=>$bets]);
    }

    public function createSubmission($pid, $eid)
    //public function createSubmission($eid)
    {   
        $event = DB::select('select * from ivykiais where id = ?', [$eid]);
        $player = DB::select('select * from players where id = ?',[$pid]);
        return view('statymai/betAdd',['event'=>$event],['player'=>$player]);
    }

    public function createEdit($pid, $bid, $eid)
    {
        $event = DB::select('select * from ivykiais where id = ?',[$eid]);
        $player = DB::select('select * from players where id = ?',[$pid]);
        $bets = DB::select('select * from bets where id = ? AND ZaidejoId = ?', [$bid,$pid]);
        return view('statymai/betEdit')->with('data', [
            'event' => $event, 
            'player' => $player,
            'bets' => $bets
        ]);
    }

    public function postBet(Request $request) {

        $data = $request->input();
        $player = DB::select('select * from players where id = ?',[$data['playerId']]);
        $remain = ((int)$player[0]->Balance - (int)$data['bet']);
        DB::update('update players set Balance = ? where id = ?',[$remain,$data['playerId']]);
		try {
			$bet = new Bet;
            $bet->Komanda = $data['team'];
            $bet->Statymo_suma = $data['bet'];
            $bet->ZaidejoId = $data['playerId'];
            $bet->IvykioId = $data['eventId'];
            $bet->save();
            return redirect('../allBetsPlayer/playerId='.$data['playerId'])->with('Success',"Operation completed successfuly");
		}
		catch(Exception $e){
			return redirect('../allBetsPlayer/playerId='.$data['playerId'])->with('failed',"Operation failed");
		}
    }

    public function showBet($pid, $bid) {
        $bets = DB::select('select * from bets where id = ? AND ZaidejoId = ?', [$bid,$pid]);
        return view('statymai/viewBet',['bets'=>$bets]);
        }

    public function editBet(Request $request,$pid,$bid) {

        $data = $request->input();

        $player = DB::select('select * from players where id = ?',[$pid]);
        $oldBet = $data['oldBet'];
        $newBet = $data['bet'];
        if ($oldBet < $newBet) {
            $difference = $newBet - $oldBet;
            $remain = ((int)$player[0]->Balance - (int)$difference);
        } elseif ($oldBet > $newBet) {
            $difference = $oldBet - $newBet;
            $remain = ((int)$player[0]->Balance + (int)$difference);
        } else {
            $remain = ((int)$player[0]->Balance - (int)$data['bet']);
        }
        DB::update('update players set Balance = ? where id = ?',[$remain,$pid]);

        $team = $data['team'];
        $bet = $data['bet'];
        DB::update('update bets set Komanda = ?,Statymo_suma=? where id = ? AND ZaidejoId = ?',[$team,$bet,$bid,$pid]);
        return redirect('../allBetsPlayer/playerId='.$pid.'&betId='.$bid)->with('Success',"Operation completed successfuly");
    }

    public function payoutsGet($pid, $bid) {
        $bets = DB::select('select * from bets where id = ? AND ZaidejoId = ?', [$bid, $pid]);
        $player = DB::select('select * from players where id = ?',[$pid]);
        return view('statymai/payouts',['bets'=>$bets],['player'=>$player]);
    }

    public function payout($pid,$bid) {

        $player = DB::select('select * from players where id = ?',[$pid]);
        $bets = DB::select('select * from bets where id = ? AND ZaidejoId',[$bid, $pid]);

        $sum = ((int)$bets[0]->Statymo_suma / 2);

        $balance = ((int)$player[0]->Balance + $sum);

        $bank = ((int)$player[0]->Bank + $sum);

        DB::update('update players set Balance = ?, Bank = ? where id = ?',[$balance,$bank,$pid]);

        DB::update('update bets set Mokejimo_statusas = ? where id = ? AND ZaidejoId = ?',[1,$bid,$pid]);

        return redirect('/allBetsPlayer/playerId='.$pid)->with('Success',"Operation completed successfuly");
    }
}