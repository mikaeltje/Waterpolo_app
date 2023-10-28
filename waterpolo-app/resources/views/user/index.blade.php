@extends('layouts.app')

@section('content')
    <h1> wedstrijd-overzicht</h1>

    @if(Auth::check() && Auth::user()->admin === 1)
        <div><p>wedstrijd <a href="/wedstrijd">bekijken</a></p></div>
        @endif
    <div><p>wedstrijd <a href="/wedstrijd/create">create</a></p></div>

    @if($matches->isEmpty())
        <p class="text-center text-xl font-bold">Je hebt nog geen wedstrijden aangemaakt</p>
    @else
    @foreach($matches as $match)
        <div class="flex flex-wrap justify-center items-center">

            <div class="bg-white p-6 rounded-lg shadow-lg m-4">

                <strong class="text-xl">Wedstrijd</strong>
                <p class="text-lg">{{ $match->id }}</p>
                <p class="text-lg">Thuis team: {{ $match->homeTeam->name }}</p>
                <p class="text-lg">Uit team: {{ $match->awayTeam->name }}</p>
                @if( $match->user_id == Auth::user()->id)
                    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out transform hover:scale-105 mt-4" href="/wedstrijd/edit/{{$match->id}}"> edit</a>

                @endif
                <form action="{{ route('wedstrijden.bekeken', $match) }}" method="POST">
                    @csrf
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md transition duration-300 ease-in-out transform hover:scale-105 mt-4" type="submit">Bekijk</button>
                </form>

            </div>

        </div>



    @endforeach
    @endif
@endsection
