@extends('layouts.app')

@section('content')
    <div class="">
        <form method="POST" action="/profile/{{$user->id}}">
            @csrf
            @method('PUT')

            <div class="">
                <label class="label" for="name">name:</label>

                <input type="text" name="name" value="{{ old('name', $user->name) }}">

                 <label class="label" for="email">email:</label>

                <input type="text" name="email" value="{{ old('email', $user->email) }}">


            </div>

            <div class="">
                <button class="" type="submit">submit</button>
            </div>

        </form>
    </div>
@endsection
