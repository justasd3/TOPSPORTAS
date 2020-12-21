<head>
    <script type="text/javascript">

    function validateBank(playerBank) {
        var a = parseInt(document.formAddBalance.addBalanceAmount.value);
        var b = parseInt(playerBank);
        if (a > b) {
            alert("Banko sąskaitoje nepakanka pinigų.");
            document.formAddBalance.addBalanceAmount.focus();
            return false;
        }
        else {
            return true;
        }
    }

    function validateBalance(playerBalance) {
        var a = parseInt(document.formRemoveBalance.removeBalanceAmount.value);
        var b = parseInt(playerBalance);
        if (a > b) {
            alert("Balanso likutis nepakankamas.");
            document.formRemoveBalance.removeBalanceAmount.focus();
            return false;
        }
        else {
            return true;
        }
    }
    </script>
</head>

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-8 offset-2">
            <div class="text-center">
                <h1>Mano balansas</h1>
            </div>
            <hr>
            <div class="text-center">
                <h4>Balanso likutis: <strong>{{ $player[0]->Balance }} €</strong></h4>
                <h6>( Banko sąskaitos likutis: <strong>{{ $player[0]->Bank }} €</strong> )</h6>
            </div>
            <hr class="mb-4">
            <div class="text-center">
                <h5><strong>
                    <a href="/my-balance/history/playerId=<?php echo $player[0]->id; ?>">Balanso istorija</a>
                </strong></h5>
            </div>
            <hr class="mb-4">
            <form name="formAddBalance" id="formAddBalance"  action="/my-balance/add-balance/playerId=<?php echo $player[0]->id; ?>" onsubmit="return(validateBank(<?php echo $player[0]->Bank; ?>));" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="playerId" value="<?php echo $player[0]->id; ?>">
                    <h4 class="mb-4"><strong>Balanso papildymas</strong></h4>
                    <label for="addBalanceAmount">Įveskite sumą, kuria norite papildyti savo balansą</label>
                    <input class="form-control" type="number" id="addBalanceAmount" name="addBalanceAmount" min="1" max="1000">
                    <small id="addBalanceAmountHelp" class="form-text text-muted">Galima suma nuo 1€ iki 1000 €</small>
                </div>
                <button type="submit" class="btn btn-primary">Pildyti balansą</button>
            </form>
            <hr class="mt-4 mb-4">
            <form name="formRemoveBalance" id="formRemoveBalance"  action="/my-balance/withdraw-to-bank/playerId=<?php echo $player[0]->id; ?>" onsubmit="return(validateBalance(<?php echo $player[0]->Balance; ?>));" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="playerId" value="<?php echo $player[0]->id; ?>">
                    <h4 class="mb-4"><strong>Lėšų atsiėmimas iš balanso</strong></h4>
                    <label for="removeBalanceAmount">Įveskite sumą, kurią norite atsiimti</label>
                    <input class="form-control" type="number" id="removeBalanceAmount" name="removeBalanceAmount" min="1" max="1000">
                    <small id="removeBalanceAmountHelp" class="form-text text-muted">Maksimali atsiėmimo suma iki {{ $player[0]->Balance }} €</small>
                </div>
                <button type="submit" class="btn btn-primary">Atsiimti lėšas</button>
            </form>
            <hr class="mt-4 mb-4">
        </div>
    </div>
@endsection
