@extends('layouts.app')

@section('content')
    @if (session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
@endif

<form action="/wedstrijd/filter" method="GET">
    <input type="text" name="search" placeholder="Zoeken op naam...">
    <select name="team_filter">
        <option value="">alle</option>
        <option value="Dames">Dames</option>
        <option value="Heren">Heren</option>
    </select>
    <button type="submit">Zoeken en Filteren</button>
</form>

<h1> wedstrijd-overzicht</h1>

<div><p>wedstrijd <a href="/wedstrijd">bekijken</a></p></div>
<div><p>wedstrijd <a href="/wedstrijd/create">create</a></p></div>
@foreach($matches as $match)
    <table>
        <tr>
            <td>h</td>
            <td>h</td>
            <td>h</td>
        </tr>
    </table>
    <div class="">
        <strong>wedstrijd</strong> <p>{{$match->id}}</p>
        thuis team<p>{{$match->homeTeam->name}}</p>
        uit team <p>{{$match->awayTeam->name}}</p>
        @if(Auth::check() && Auth::user()->admin === 1)

        <a href="/wedstrijd/edit/{{$match->id}}"> edit</a>
            @endif
            <a href="/wedstrijd/{{$match->id}}"> bekijk</a>
        <form action="{{ route('wedstrijden.bekeken', $match) }}" method="POST">
            @csrf
            <button type="submit">Bekijk</button>
        </form>
    </div>

@endforeach
@endsection
