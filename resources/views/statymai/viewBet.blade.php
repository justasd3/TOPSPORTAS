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
                            <div class="card-header">Statymai
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Komanda, už kurią pastatyta</th>
                                        <th scope="col">Pastatyta suma (eurais)</th>
                                    </tr>
                                    </thead>
                                    @foreach($bets as $bet)
                                        <tr>
                                            <th scope="row">{{ $bet->id }}</th>
                                            <th scope="row">{{ $bet->Komanda}}</th>
                                            <th scope="row">{{ $bet->Statymo_suma }}</th>
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