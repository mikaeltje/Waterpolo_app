@extends('layouts.app')

@section('content')

    <a href="/wedstrijd">terug</a>
    <h1>{{$match}}</h1><a href="/wedstrijd/{{$match->id}}/delete"> delete</a>

@endsection

