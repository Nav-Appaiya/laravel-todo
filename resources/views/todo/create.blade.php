@extends('todo.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 my-5">
            <div class="pull-left">
                <h2>Todo toevoegen</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('todo.index') }}"> Terug</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Er zijn problemen met je invoer.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('todo.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Je TODO:</strong>
                    <input type="text" name="title" class="form-control" placeholder="title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </div>
        </div>
    </form>
@endsection
