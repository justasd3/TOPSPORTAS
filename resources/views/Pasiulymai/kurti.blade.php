@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{route('pasiulymai.done')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pradžia</label>
                        <input type="date" id="age" name="start">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pabaiga</label>
                        <input type="date" id="age" name="end">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Informacija</label>
                        <input type="text" name="informacija" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pavadinimas</label>
                        <input type="text" name="pavadinimas" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
