@extends('layouts.app')
@section('content')
<div class="container">
    <form>
        <div class="container">
            <!-- <div class="text-center mb-4">
                <h1>Transakcijų istorija</h1>
            </div> -->
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">Transakcijų istorija</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Suma</th>
                                    <th scope="col">Tipas</th>
                                    <th scope="col">Data</th>
                                </tr>
                                </thead>
                                @foreach($transactions as $transaction)
                                    @if($transaction->papildymas == 1)
                                        <tr class="text-success">
                                    @endif
                                    @if($transaction->papildymas == 0)
                                        <tr class="text-danger">
                                    @endif
                                            <th scope="row">{{ $transaction->id }}</th>
                                            <th scope="row">{{ $transaction->kiekis}} €</th>
                                            @if($transaction->papildymas == 1)
                                                <th scope="row">Papildymas</th>
                                            @endif
                                            @if($transaction->papildymas == 0)
                                                <th scope="row">Atsiėmimas</th>
                                            @endif
                                            <th scope="row">{{ $transaction->data }}</th>
                                        <tbody>
                                    
                                @endforeach
                                    </tbody>
                            </table>
                            <script>
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection