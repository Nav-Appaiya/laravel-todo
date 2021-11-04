@extends('todo.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Bekijk Todo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('todo.index') }}"> Terug</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <br>
                <strong>Titel: </strong>{{ $todo->title }}<br>
                <strong>Gebruiker: </strong>{{ $todo->user->name }}<br>
                <strong>Gebruiker email:</strong> {{ $todo->user->email }}<br>
                <strong>Aangemaakt: </strong>{{ $todo->created_at }}<br>

            </div>
        </div>

    </div>
@endsection
