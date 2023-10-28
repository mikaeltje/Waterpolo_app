@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white p-8 shadow-md mt-10 rounded-lg">
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline block mb-4">Terug</a>

        <form method="POST" action="/wedstrijd/{{ $match->id }}" class="mb-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="home_id" class="block text-gray-700 text-sm font-bold mb-2">Home Team</label>
                <select name="home_id" class="w-full bg-white border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" @if ($match->home_id == $team->id) selected @endif>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="away_id" class="block text-gray-700 text-sm font-bold mb-2">Away Team</label>
                <select name="away_id" class="w-full bg-white border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" @if ($match->away_id == $team->id) selected @endif>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-300" type="submit">Opslaan</button>
            </div>
        </form>
    </div>
@endsection
