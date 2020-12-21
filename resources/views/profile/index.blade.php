@extends('layouts.app')
@section('content')
    <!doctype html>
    <body>
    <html lang="en">
    <div class="container">
        <form method="POST" action="{{route ('profile.update')}}">
            <div class="container pt-4">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Profilis
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-Paštas</label>
                                        <input type="text" name="text" class="form-control" value="{{$user->email}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Slapyvardis</label>
                                        <input type="text" name="text" class="form-control" value="{{$user->nickname}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vardas</label>
                                        <input type="text" name="text" class="form-control" value="{{$user->name}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Slapyvardis</label>
                                        <input type="text" name="text" class="form-control" value="{{$user->nickname}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pavardė</label>
                                        <input type="text" name="text" class="form-control" value="{{$user->surname}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Adresas</label>
                                        <input type="text" name="text" class="form-control" value="{{$user->address}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Telefono numeris</label>
                                        <input type="text" name="text" class="form-control" value="{{$user->phoneNo}}">
                                    </div>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Išsaugoti pakeitimus</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </html>
@endsection
