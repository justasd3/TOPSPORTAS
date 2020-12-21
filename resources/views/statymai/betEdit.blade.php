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
                <form name="form" id="form" action="/editBet/playerId=<?php echo $data['player'][0]->id; ?>&betId=<?php echo  $data['bets'][0]->id; ?>&eventId=<?php echo $data['event'][0]->id; ?>" onsubmit="return(validate(<?php echo $data['player'][0]->Balance; ?>));" method="POST">
                    @csrf
                    <div class="form-group">
                    <input type = "hidden" name = "playerId" value = "<?php echo $data['player'][0]->id; ?>">
                    <input type = "hidden" name = "eventId" value = "<?php echo$data['event'][0]->id; ?>">
                    <input type = 'hidden' name = 'oldBet' value = '<?php echo$data['bets'][0]->Statymo_suma; ?>'/>
                                <label for="team">Pasirinkite komandą:</label>
                                <select name="team" id="team">
                                <option value="<?php echo$data['bets'][0]->Komanda; ?>" selected>{{ $data['bets'][0]->Komanda }}</option>
                                <option value="<?php echo$data['event'][0]->komanda_1; ?>">{{ $data['event'][0]->komanda_1 }}</option>
                                <option value="<?php echo$data['event'][0]->komanda_2; ?>">{{ $data['event'][0]->komanda_2 }}</option>
                                </select>
                                <script>
                                var selectobject = document.getElementById("team");
                                for (var i=1; i < selectobject.length; i++) {
                                  if (selectobject.options[i].value == '<?php echo $data['bets'][0]->Komanda; ?>')
                                  selectobject.remove(i);
                                }
                                </script>
                    </div>
                    <div class="form-group">
                        <label for="bet">Statymo suma</label>
                        <input type="text" name="bet" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection