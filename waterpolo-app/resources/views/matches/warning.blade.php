@extends('layouts.app')

@section('content')

    <div class="max-w-md mx-auto bg-white p-8 shadow-md mt-10 rounded-lg text-center">
        <a href="{{ route('home') }}" class="text-blue-500 hover:underline block mb-4">Terug</a>

        <h1 class="text-2xl font-bold mb-4">{{ $match->homeTeam->name }}</h1>
        <h1 class="text-2xl font-bold mb-4">{{ $match->awayTeam->name }}</h1>

        <form method="POST" action="">
            @csrf
            @method('DELETE')
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mb-4" type="submit">Ja</button>
        </form>

        <a href="{{ route('home') }}" class="block mb-4">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Nee</button>
        </a>
    </div>
@endsection
