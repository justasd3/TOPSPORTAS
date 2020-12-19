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
                            <div class="card-header">Pasiūlymai
                            <a href="{{route("pasiulymai.kurti") }}">
                                @csrf
                                <button type="button" class="btn btn-success float-right"> Kurti pasiūlymą
                                </button>
                            </a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Pradzia</th>
                                        <th scope="col">Pabaiga</th>
                                        <th scope="col">Informacija</th>
                                        <th scope="col">Pavadinimas</th>


                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    @foreach($pasiulymai as $pas)
                                        <tr>
                                            <th scope="row">{{ $pas->id }}</th>
                                            <th scope="row">{{ $pas->pradzia}}</th>
                                            <th scope="row">{{ $pas->pabaiga }}</th>
                                            <th scope="row">{{ $pas->informacija }}</th>
                                            <th scope="row">{{ $pas->pavadinimas }}</th>
                                            <th scope="row"><a href="{{route('pasiulymai.redaguoti', $pas->id)}}"><button type="button" class="btn btn-primary">Redaguoti</button></a></th>
                                            <th scope="row"><a href="{{route('pasiulymai.trinti', $pas->id)}}"><button type="button" class="btn btn-primary">Trinti</button></a></th>
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
