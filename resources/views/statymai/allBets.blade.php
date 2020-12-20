<style>
.container {
    display: flex;
    justify-content: center;
    align-items: center;
}
.styled-table {
    position:absolute;
    border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 800px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    top: 30%;
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: thin solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: thin solid #009879;
}

</style>

<div class="container">
<head>
<title>View All Bets</title>
</head>
<table class="styled-table">
    <thead>
        <tr>
            <th>Įvykis</th>
            <th>Komanda, už kurią pastatyta</th>
            <th>Pastatyta suma (eurais)</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($bets as $bet)
    <tr>
    <td>{{ $bet->bId }}</td>
    <td>{{ $bet->Team }}</td>
    <td>{{ $bet->Bet }}</td>
    <td><a href = 'editBet/{{ $bet->bId }}'>Edit</a></td>
    <td><a href = 'viewBet/{{ $bet->bId }}'>Show</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>