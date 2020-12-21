@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <form action="{{route('messages.send')}}" method="POST">
                    @csrf
                    <div class="form-group">
                                <label for="cars">Gavėjas:</label>
                                <select name="receiver" id="doesntmatter" required>
                                    @foreach($users as $usr)
                                        <option name="rec" value={{$usr->email}}>{{$usr->email}}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Turinys</label>
                        <input type="text" name="text" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Siūsti</button>
                </form>

            </div>
        </div>
    </div>
@endsection
