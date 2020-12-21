@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            <div class="container pt-4">
                <div class="card-header">Profilis
                </div>
                <div class="card-body">
                    <table class="table">
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-Paštas</label>
                            <input type="text" name="email" class="form-control" value="{{$user->email}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slapyvardis</label>
                            <input type="text" name="nickname" class="form-control" value="{{$user->nickname}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Vardas</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pavardė</label>
                            <input type="text" name="surname" class="form-control" value="{{$user->surname}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adresas</label>
                            <input type="text" name="address" class="form-control" value="{{$user->address}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefono numeris</label>
                            <input type="text" name="phoneNo" class="form-control" value="{{$user->phoneNo}}">
                        </div>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-primary">Išsaugoti pakeitimus</button>
            </div>
        </form>
    </div>
@endsection
