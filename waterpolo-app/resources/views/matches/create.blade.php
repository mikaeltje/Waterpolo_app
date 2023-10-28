@extends('layouts.app')

@section('content')
    <div class="">
        <a href="{{route('home')}}">terug</a>

        <form method="POST" action="/wedstrijd">
        @csrf
            <div class="">
                <label class="label" for="home_id">home_team</label>

                <select name="home_id">
                    @foreach($teams as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>

                    @endforeach

                </select>

                <label class="label" for="away_id">home_team</label>

                <select name="away_id">
                    @foreach($teams as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                    @endforeach
                </select>
            </div>

                <div class="">
                    <button class="" type="submit">submit</button>
                </div>

        </form>
    </div>
@endsection
