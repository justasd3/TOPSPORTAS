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
                            <div class="card-header">Žinutės
                            <a href="{{route("messages.create") }}">
                                @csrf
                                <button type="button" class="btn btn-success float-right"> Rašyti naują žintę
                                </button>
                            </a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Siuntėjas</th>
                                        <th scope="col">Gauta</th>
                                        <th scope="col">Turinys</th>

                                        <th scope="col"></th>
                                    </tr>
                                    </thead>
                                    @foreach($messages as $m)
                                            <tr>
                                                <th scope="row">{{ $m->sender }}</th>
                                                <th scope="row">{{ $m->date}}</th>
                                                <th scope="row">{{ $m->text }}</th>
                                                <th scope="row"><a href="{{route('messages.delete', $m->id)}}"><button type="button" class="btn btn-primary">Trinti</button></a></th>
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
