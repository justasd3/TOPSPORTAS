@extends('layouts.app')
@section('content')
    <!doctype html>
    <body>
    <html lang="en">
    <div class="container">
        <form>
            <div class="container pt-4">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">ĮVYKIAI
                            <a href="{{route("ivykiai.kurti") }}">
                                @csrf
                                @if(Auth::user()->email == "admin@admin.admin")
                                <button type="button" class="btn btn-success float-right"> Kurti įvykį
                                </button>@endif

                            </a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Komanda 1</th>
                                        <th scope="col">Koeficientas 1</th>
                                        <th scope="col">Trukme</th>
                                        <th scope="col">Komanda 2</th>
                                        <th scope="col">Koeficientas 2</th>
                                        <th scope="col">Pradzia</th>
                                        <th scope="col">Laikas</th>

                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    @foreach($ivykiai as $ivyk)
                                            <tr>
                                                <th scope="row">{{ $ivyk->id }}</th>
                                                <th scope="row">{{ $ivyk->komanda_1}}</th>
                                                <th scope="row">{{ $ivyk->koeficientas_1 }}</th>
                                                <th scope="row">{{ $ivyk->trukme }}</th>
                                                <th scope="row">{{ $ivyk->komanda_2 }}</th>
                                                <th scope="row">{{ $ivyk->koeficientas_1}}</th>
                                                <th scope="row">{{ $ivyk->pradzia }}</th>
                                                <th scope="row">{{ $ivyk->laikas }}</th>
                                            @if(Auth::user()->email == "admin@admin.admin")
                                                <th scope="row"><a href="{{route('ivykiai.redaguoti', $ivyk->id)}}"><button type="button" class="btn btn-primary btn-sm">Redaguoti</button></a></th>
                                                <th scope="row"><a href="{{route('ivykiai.trinti', $ivyk->id)}}"><button type="button" class="btn btn-primary btn-sm">Trinti</button></a></th>
                                                @endif
                                                <th scope="row"><a href="/createBet/playerId=1&eventId={{$ivyk->id}}"><button type="button" class="btn btn-primary btn-sm">Kurti statymą</button></a></th>
                                            </tr>
                                            <tbody>
                                            @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </html>
@endsection
