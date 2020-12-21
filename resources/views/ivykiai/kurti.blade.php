@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{route('ivykiai.done')}}" method="POST">
                    @csrf
                    <div class="form-group">
                                <label for="cars">Pasirinkite komandą:</label>
                                <select name="Komanda_1" id="cars" required>
                                    @foreach($komanda as $kom)
                                        <option name="kom_1" value={{$kom->pavadinimas}}>{{$kom->pavadinimas}}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Koeficientas</label>
                        <input  type="number" step="0.01" name="kof_1" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="cars">Pasirinkite komandą:</label>
                        <select name="Komanda_2" id="cars" required>
                            @foreach($komanda as $kom)
                                <option value={{$kom->pavadinimas}}>{{$kom->pavadinimas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Koeficientas</label>
                        <input  type="number" step="0.01" name="kof_2" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Trukmė</label>
                        <input type="text" name="trukme" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pradžia</label >
                        <input type="date" id="age" name="start" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Laikas</label>
                        <input type="time" id="age" name="laikas" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
