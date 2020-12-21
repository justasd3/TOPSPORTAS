@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('TOPSPORT') }}</div>

                    <div class="card-body">
                        {{ __('Sveiki prisijunge į lažybų punka TopSport!') }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">ĮVYKIAI</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Komanda</th>
                                <th scope="col">Komanda</th>
                                <th scope="col">Laikas</th>
                            </tr>
                            </thead>
                            @foreach($ivykiai as $ivyk)
                            <tr>
                                    <th scope="col"><a href="{{route('ivykiai')}}"> {{$ivyk->komanda_1}}</a></th>
                                    <th scope="col"><a href="{{route('ivykiai')}}"> {{$ivyk->komanda_2}}</a></th>
                                    <th scope="col"><a href="{{route('ivykiai')}}"> {{$ivyk->pradzia}}</a></th>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div>

                <h1 class="pt-2"></h1>
                <div class="card">
                    <div class="card-header">KOMANDOS</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Komanda</th>
                                <th scope="col">Tipas</th>
                            </tr>
                            </thead>
                                @foreach($komandos as $kom)
                                <tr>
                                    <th scope="col"><a href="{{route('komanda',$kom->pavadinimas)}}">  {{$kom->pavadinimas}}</a></th>
                                    <th scope="col"> {{$kom->tipas}}</th>
                                </tr>

                            @endforeach
                        </table>

                    </div>
                </div>
        </div>
    </div>

@endsection
