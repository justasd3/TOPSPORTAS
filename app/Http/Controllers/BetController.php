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
        $bets = DB::select('select * from bets where PlayerId = ?',[$playerId]);
        return view('allBetsPlayer',['bets'=>$bets]);
    }

    public function createSubmission($pid)
    {   
        $teams = DB::select('select * from teams');
        $player = DB::select('select * from person where pId = ?',[$pid]);
        return view('betAdd',['teams'=>$teams],['player'=>$player]);
    }

    public function createEdit($pid, $bid)
    {
        $teams = DB::select('select * from teams');
        $player = DB::select('select * from person where pId = ?',[$pid]);
        $bets = DB::select('select * from bets where bId = ? AND PlayerId = ?', [$bid,$pid]);
        return view('betEdit')->with('data', [
            'teams' => $teams, 
            'player' => $player,
            'bets' => $bets
        ]);
        //return view('betEdit',['bets'=>$bets],['player'=>$player],['teams'=>$teams]);
    }

    public function postBet(Request $request) {

        $data = $request->input();
        $player = DB::select('select * from person where pId = ?',[$data['playerId']]);
        $remain = ((int)$player[0]->Balance - (int)$data['bet']);
        DB::update('update person set Balance = ? where pId = ?',[$remain,$data['playerId']]);
		try {
			$bet = new Bet;
            $bet->Team = $data['team'];
            $bet->Bet = $data['bet'];
            $bet->PlayerId = $data['playerId'];
            $bet->save();
            return redirect('../allBetsPlayer/playerId='.$data['playerId'])->with('Success',"Operation completed successfuly");
		}
		catch(Exception $e){
			return redirect('../allBetsPlayer/playerId='.$data['playerId'])->with('failed',"Operation failed");
		}
    }

    public function showBet($pid, $bid) {
        $bets = DB::select('select * from bets where bId = ? AND PlayerId = ?', [$bid,$pid]);
        return view('viewBet',['bets'=>$bets]);
        }

    public function editBet(Request $request,$pid,$bid) {

        $data = $request->input();

        $player = DB::select('select * from person where pId = ?',[$pid]);
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
        DB::update('update person set Balance = ? where pId = ?',[$remain,$pid]);

        $team = $data['team'];
        $bet = $data['bet'];
        DB::update('update bets set team = ?,bet=? where bId = ? AND PlayerId = ?',[$team,$bet,$bid,$pid]);
        return redirect('../allBetsPlayer/playerId='.$pid.'&betId='.$bid)->with('Success',"Operation completed successfuly");
        }
}