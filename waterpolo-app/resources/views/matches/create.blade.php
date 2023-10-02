@extends('layouts.app')

@section('content')
    <div class="">
        <form method="POST" action="/wedstrijd">
        @csrf
            <div class="field">
                <label class="label" for="home_id">home_team</label>

                <select name="home_id">

                        <option value="1">yaran 1</option>
                        <option value="2">yaran 2</option>
                    <option value="3">yaran 3</option>
                    <option value="4">yaran 4</option>
                </select>
                <label class="label" for="away_id">home_team</label>

                <select name="away_id">
                    <option value="1">yaran 1</option>
                    <option value="2">yaran 2</option>
                        <option value="3">yaran 3</option>
                        <option value="4">yaran 4</option>

                </select>

                @error('home_id')
                <p class="help is-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
