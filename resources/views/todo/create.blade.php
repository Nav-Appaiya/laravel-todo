@extends('todo.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 my-5">
            <div class="pull-left">
                <h2>Todo toevoegen</h2>
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
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="title">
                    <input type="hidden" name="user_id" class="form-control" placeholder="user_id" value="{{ auth()->user()->id }}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-1 text-center">
                <button type="submit" class="btn btn-success">Toevoegen</button>
            </div>
        </div>
        <br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('todo.index') }}"> Terug</a>
        </div>
    </form>
@endsection
