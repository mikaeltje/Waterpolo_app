@extends('layouts.app')

@section('content')

<a href="/wedstrijd">terug</a>
<h1>{{$match}}</h1>
<form method="POST" action="">
    @csrf
    @method('DELETE')
    <button type="submit">Yes</button>
</form>

<a href="/matches"><button>No</button></a>
@endsection
