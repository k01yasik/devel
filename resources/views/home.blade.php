@extends('layouts.master')

@section('content')
    <div class="centered">
        <a href="{{ route('greet', ['name' => 'Bzdykin']) }}">Greet</a>
        <a href="{{ route('hug') }}">Hug</a>
        <a href="{{ route('kiss') }}">Kiss</a>
    </div>
@endsection