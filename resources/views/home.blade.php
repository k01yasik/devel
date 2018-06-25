@extends('layouts.master')

@section('content')
    <div class="centered">
        <div class="col-6 margin-bottom-1">
            @foreach($actions as $action)
                    <a href="{{ route('niceaction', ['action' => lcfirst($action->name)]) }}">{{ $action->name }}</a>
            @endforeach
        </div>
        @if (count($errors) > 0)
            <div class="col-6">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            </div>
        @endif
        <form action="{{ route('benice') }}" method="post" class="col-6">
            @csrf
            <div class="form-group">
                <label for="select-action">I want to...</label>
                <select class="form-control" id="select-action" name="action">
                    <option value="greet">Greet</option>
                    <option value="hug">Hug</option>
                    <option value="kiss">Kiss</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" />
            </div>
            <button type="submit" class="btn btn-primary btn-block">Do a nice action!</button>
        </form>
    </div>
@endsection