<style>
/*fonts*/
@import url(https://fonts.googleapis.com/css?family=PT+Sans:400,400italic);

@import url(https://fonts.googleapis.com/css?family=Droid+Serif);

html, body{
  background:#2F1E27;
}

body{
  counter-reset:section;
  text-align:center;
}

.container{
  position:relative;
  top:100px;
}

.container h1, .container span{
  font-family:"Pt Sans", helvetica, sans-serif;
}

.container h1{
  text-align:center;
  color:#fff;
  font-weight:100;
  font-size:2em; 
  margin-bottom:10px;
}

.container h2{
  font-family:"droid serif";
  font-style:italic;
  color:#d3b6ca; 
  text-align:center;
  font-size:1.2em;
}

.container form span:before {
  counter-increment:section;
  content:counter(section);
  border:2px solid #4c2639;
  width:40px;
  height:40px;
  color:#fff;
  display:inline-block;
  border-radius:50%;
  line-height:1.6em;
  font-size:1.5em;
  position:relative;
  left:-22px;
  top:-11px;
  background:#2F1E27;
}

form{
  margin-top:25px;
  display:inline-block;
}

.fields{
  border-left:2px solid #4c2639
}

.container span{
    margin-bottom:22px; 
    display:inline-block;
}

.container span:last-child{
   margin-bottom:-11px;
}

input,select{
  border:none;
  outline:none;
  display:inline-block;
  height:34px;
  vertical-align:middle;
  position:relative;
  bottom:14px;
  right:9px;
  border-radius:22px;
  width:220px;
  box-sizing:border-box;
  padding:0 18px; 
}

input[type="submit"]{ 
  background:rgba(197,62,126,.33);
  color:#fff;
  position:relative;
  left:9px;
  top:25px; 
  width:200px;
  cursor:pointer;
}
</style>

<head>
<script type="text/javascript">

function validate(playerBalance, sumBefore) {
  var a = parseInt(document.form.bet.value);
  var b = parseInt(playerBalance);
  var c = parseInt(sumBefore);
  if (a > c) {
    var a = a - c;
  }
  if (a > b) {
    alert("Not enough money to complete this bet");
    document.form.bet.focus();
    return false;
  }
}
</script>
</head>

<div class="container">
  <h1>Redaguoti statymą</h1>
  
  <form name="form" id="form" action = "/editBet/playerId=<?php echo $data['player'][0]->pId; ?>&betId=<?php echo $data['bets'][0]->bId; ?>" onsubmit="return(validate(<?php echo$data['player'][0]->Balance; ?>, <?php echo$data['bets'][0]->Bet; ?>));" method = "post">
  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    <div class="fields">
      <span>
      <input type = 'hidden' name = 'oldBet' value = '<?php echo$data['bets'][0]->Bet; ?>'/>
      <input type = 'text' name = 'bet' value = '<?php echo$data['bets'][0]->Bet; ?>'/>
    </span>
    <br />
     <span>
     <select name="team" id="team">
     <option value="<?php echo$data['bets'][0]->Team; ?>" selected>{{ $data['bets'][0]->Team }}</option>
      @foreach ($data['teams'] as $team)
      <option value="<?php echo$team->Name; ?>">{{ $team->Name }}</option>
      @endforeach
     </select>
     <script>
     var selectobject = document.getElementById("team");
     for (var i=1; i < selectobject.length; i++) {
        if (selectobject.options[i].value == '<?php echo $data['bets'][0]->Team; ?>')
          selectobject.remove(i);
      }
    </script>
    </span>
    </div>
    <div class="submit">
      <input class="submit" value="Išsaugoti" type="submit" />
    </div>
  </form>