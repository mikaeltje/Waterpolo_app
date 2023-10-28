@extends('layouts.app')

@section('content')

    <div class="max-w-md mx-auto bg-white p-8 shadow-md mt-10 rounded-lg">
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline block mb-4">Terug</a>

        <h1 class="text-2xl font-bold mb-2">{{ $match->homeTeam->name }}</h1>
        <h1 class="text-2xl font-bold mb-4">{{ $match->awayTeam->name }}</h1>

        @if ($match->user_id == Auth::user()->id || Auth::user()->admin === 1)
            <div class="flex space-x-4 mb-4">
                <a href="/wedstrijd/edit/{{ $match->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                <a href="/wedstrijd/{{ $match->id }}/delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</a>
            </div>
        @endif
    </div>

@endsection

