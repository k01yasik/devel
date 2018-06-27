@extends('layouts.master')

@section('content')
    <div class="centered">
        <div class="col-4 offset-4 margin-bottom-1">
            @foreach($actions as $action)
                    <a href="{{ route('niceaction', ['action' => lcfirst($action->name)]) }}">{{ $action->name }}</a>
            @endforeach
        </div>
        @if (count($errors) > 0)
            <div class="col-4 offset-4">
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
        <form action="{{ route('add_action') }}" method="post" class="col-4 offset-4">
            @csrf
            <div class="form-group">
                <label for="name">Name of Action</label>
                <input type="text" id="name" class="form-control" name="name" />
            </div>
            <div class="form-group">
                <label for="niceness">Niceness:</label>
                <input type="text" id="niceness" class="form-control" name="niceness" />
            </div>
            <button type="submit" class="btn btn-primary btn-block">Do a nice action!</button>
        </form>
        <div class="col-4 offset-4 margin-top-3">
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Categories 1</th>
                        <th scope="col">Categories 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logged_actions as $logged_action)
                        <tr>
                            <th scope="row">{{$logged_action->id}}</th>
                            <td>{{$logged_action->nice_action->name}}</td>


                            @if (count($logged_action->nice_action->categories)===0)
                                <td>-</td>
                                <td>-</td>
                            @endif
                            @foreach($logged_action->nice_action->categories as $category)
                                @if ($loop->count === 1)
                                    <td>{{$category->name}}</td>
                                    <td>-</td>
                                @else
                                    <td>{{$category->name}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection