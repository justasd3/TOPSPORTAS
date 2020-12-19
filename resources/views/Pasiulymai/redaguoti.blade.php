@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{route('pasiulymai.redaguoti.done')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pasiūlymų id</label>
                        <input  type="number" name="id" class="form-control" value= {{$pasiulymas->id}} readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pradžia</label>
                        <input type="date" id="age" name="start" value={{$pasiulymas->pradzia}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pabaiga</label>
                        <input type="date" id="age" name="end" value={{$pasiulymas->pabaiga}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Informacija</label>
                        <input type="text" name="informacija" class="form-control" value={{$pasiulymas->informacija}}>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pavadinimas</label>
                        <input type="text" name="pavadinimas" class="form-control" value={{$pasiulymas->pavadinimas}}>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
