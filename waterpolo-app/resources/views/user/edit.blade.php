@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-success">
            {{ session('error') }}
        </div>
    @endif
    <div class="max-w-md mx-auto bg-white p-8 shadow-md mt-10 rounded-lg">
        <form method="POST" action="/profile/{{ $user->id }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Naam:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">E-mail:</label>
                <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="text-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">Opslaan</button>
            </div>
        </form>
    </div>
@endsection
