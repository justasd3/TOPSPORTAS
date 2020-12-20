@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="/payout/playerId=<?php echo $bets[0]->ZaidejoId; ?>&betId=<?php echo $bets[0]->id; ?>" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Patvirtinti</button>
                </form>

            </div>
        </div>
    </div>
@endsection
