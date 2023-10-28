@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="max-w-md mx-auto bg-white p-8 shadow-md mt-10 rounded-lg">
        <a href="{{ route('home') }}" class="text-blue-600 hover:underline block mb-4">Terug</a>

        <p class="text-lg font-semibold mb-2">Gebruikersinformatie</p>
        <p class="text-gray-600">ID: {{ $user->id }}</p>
        <p class="text-gray-600">Naam: {{ $user->name }}</p>
        <p class="text-gray-600">E-mail: {{ $user->email }}</p>

        <a href="/profile/{{ $user->id }}/edit" class="text-blue-600 hover:underline mt-4 block">Wijzigen</a>
    </div>
@endsection

