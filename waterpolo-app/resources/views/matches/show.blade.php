@extends('layouts.app')

@section('content')

    <a href="/wedstrijd">terug</a>
    <h1>{{$match->homeTeam->name}}</h1>
    <h1>{{$match->awayTeam->name}}</h1>
    @if(Auth::check() && Auth::user()->admin === 1)
        <a href="/wedstrijd/{{$match->id}}/delete"> delete</a>

    @endif

@endsection

