@extends('layouts.app')
@section('content')
    <!doctype html>
    <body>
    <html lang="en">
    <div class="container">
        <form>
            <div class="container pt-4">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Statymai</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Komanda, už kurią pastatyta</th>
                                        <th scope="col">Pastatyta suma (eurais)</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    @foreach($bets as $bet)
                                        <tr>
                                            <th scope="row">{{ $bet->id }}</th>
                                            <th scope="row">{{ $bet->Komanda}}</th>
                                            <th scope="row">{{ $bet->Statymo_suma }}</th>
                                            <td><a href = '../editBet/playerId={{ $bet->ZaidejoId }}&betId={{ $bet->id }}&eventId={{ $bet->IvykioId }}'>Edit</a></td>
                                            <td><a href = '../viewBet/playerId={{ $bet->ZaidejoId }}&betId={{ $bet->id }}'>Show</a></td>
                                            @if($bet->Mokejimo_statusas == 0)
                                                <td id="win"><a href = '../payout/playerId={{ $bet->ZaidejoId }}&betId={{ $bet->id }}'>Dalinis laimėjimas</a></td>
                                            @endif
                                            @if($bet->Mokejimo_statusas == 1)
                                            <td id="win"><b>Laimėjimas išmokėtas</b></td>
                                            @endif
                                        <tbody>
                                    @endforeach
                                        </tbody>
                                </table>
                                <script>
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </html>
@endsection