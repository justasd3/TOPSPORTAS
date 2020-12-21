@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
        <form action="{{route('profile.detailedGet')}}" method="POST">
            @csrf
            <div class="container pt-4">
                <div class="card-header">Profilis
                </div>
                <div class="form-group">
                    <label for="cars">Vartotojas</label>
                    <select name="id" id="user_id" required>
                        @foreach($users as $usr)
                            <option name="selected_user" value={{$usr->id}}>{{$usr->email}}</option>
                        @endforeach
                    </select>
                </div>
                @isset($user)
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
                            <input type="text" name="address" class="form-control" value="{{$user->address}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefono numeris</label>
                            <input type="text" name="phoneNo" class="form-control" value="{{$user->phoneNo}}" disabled>
                        </div>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="card-header">Statymai</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Komanda, už kurią pastatyta</th>
                                <th scope="col">Pastatyta suma (eurais)</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            @foreach($bets as $bet)
                                <tr>
                                    <th scope="row">{{ $bet->id }}</th>
                                    <th scope="row">{{ $bet->Komanda}}</th>
                                    <th scope="row">{{ $bet->Statymo_suma }}</th>
                                    @if($bet->Mokejimo_statusas == 0)
                                        <td><a href = '../viewBet/playerId={{ $bet->ZaidejoId }}&betId={{ $bet->id }}'>Show</a></td>
                                    @endif
                                    @if($bet->Mokejimo_statusas == 1)
                                        <td id="win"><b>Laimėjimas išmokėtas</b></td>
                                    @endif
                                    <tbody>
                                    @endforeach
                                    </tbody>
                        </table>
                    </div>
                @endisset
                <button type="submit" class="btn btn-primary">Generuoti ataskaita</button>
            </div>
        </form>
    </div>
@endsection
