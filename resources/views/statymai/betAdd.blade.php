<head>
<script type="text/javascript">
function validate(playerBalance) {
  var a = parseInt(document.form.bet.value);
  var b = parseInt(playerBalance);
  if (a > b) {
    alert("Not enough money to complete this bet");
    document.form.bet.focus();
    return false;
  } else {
    return true;
  }
}
</script>
</head>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
              <div class="text-center">
                <h1>Naujas statymas</h1>
                <hr>
                <h4 class="mt-4">{{ $event[0]->komanda_1 }} - {{ $event[0]->komanda_2 }}</h4>
                <h6>{{ $event[0]->pradzia }}</h6>
                <h6 class="mb-4">{{ date('H:i', strtotime($event[0]->laikas)) }}</h6>
                <hr>
              </div>
                <form name="form" id="form" action="/createBet/playerId=<?php echo $player[0]->id; ?>&eventId=<?php echo $event[0]->id; ?>" onsubmit="return(validate(<?php echo$player[0]->Balance; ?>));" method="POST">
                    @csrf
                    <div class="form-group">
                    <input type = "hidden" name = "playerId" value = "<?php echo$player[0]->id; ?>">
                    <input type = "hidden" name = "eventId" value = "<?php echo$event[0]->id; ?>">
                                <label for="team">Pasirinkite komandą:</label>
                                <select required name="team" id="team">
                                <option value="" disabled selected hidden>Komandos pavadinimas</option>
                                <option value="<?php echo$event[0]->komanda_1; ?>">{{ $event[0]->komanda_1 }}</option>
                                <option value="<?php echo$event[0]->komanda_2; ?>">{{ $event[0]->komanda_2 }}</option>
                                </select>
                    </div>
                    <div class="form-group">
                        <label for="bet">Statymo suma</label>
                        <input required type="text" name="bet" class="form-control">
                    </div>
                    <div class="mb-4">
                      <strong><p>Balanso likutis: {{ $player[0]->Balance }} €</p></strong>
                    </div>
                    <button type="submit" class="btn btn-primary">Atlikti statymą</button>
                </form>
              
            </div>
        </div>
    </div>
@endsection