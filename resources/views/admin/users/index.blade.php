@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Vartotojų valdymas') }}</div>
                    <div class="card-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Vardas</th>
                            <th scope="col">E-paštas</th>
                            <th scope="col">Rolė</th>
                            <th scope="col">Veiksmai</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td>
                                    <a href="{{route('admin.users.edit',$user->id)}}" ><button type="button" class="btn btn-primary">Redaguoti</button></a>
                                    <a href="{{route('admin.users.destroy',$user->id)}}" ><button type="button" class="btn btn-primary">Trinti</button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
