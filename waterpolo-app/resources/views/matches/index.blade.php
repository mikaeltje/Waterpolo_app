@extends('layouts.app')

@section('content')
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
        thuis team<p>{{$match->homeTeam}}</p>
        uit team <p>{{$match->awayTeam}}</p><a href="/wedstrijd/edit/{{$match->id}}"> edit</a><a href="/wedstrijd/{{$match->id}}"> bekijk</a>
{{--    {{dd($match)}}--}}
{{--        {{dd(Auth::user()->isAdmin())}}}--}}
{{--        @if (Auth::user()->isAdmin())--}}
{{--            <a href="/create"><button>create</button></a>--}}
{{--        @else--}}
{{--            <p>No perms</p>--}}
{{--        @endif--}}
    </div>

@endforeach
@endsection
