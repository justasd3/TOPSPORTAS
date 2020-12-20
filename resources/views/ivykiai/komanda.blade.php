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
                            <div class="card-header">{{$komanda->pavadinimas}}</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Tipas</th>
                                        <th scope="col">Laimejimai</th>
                                        <th scope="col">Pralaimejimai</th>
                                        <th scope="col">Kontaktai</th>
                                    </tr>
                                    </thead>
                                        <tr>
                                            <th scope="col">{{$komanda->tipas}}</th>
                                            <th scope="col">{{$komanda->laimejimai}}</th>
                                            <th scope="col">{{$komanda->pralaimejimai}}</th>
                                            <th scope="col">{{$komanda->kontaktai}}</th>
                                        </tr>
                                </table>

                            </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </html>
@endsection
