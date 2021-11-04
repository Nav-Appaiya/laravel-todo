@extends('todo.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Todo bewerken</h2>
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
    <form action="{{ route('todo.update',$todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="form-group">
                    <input type="text" name="title" value="{{ $todo->title }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success mt-3">Opslaan</button>
                </div>

            </div>

            <div class="pt-4 col-md-9">

            </div>
        </div>

    </form>
    <br>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('todo.index') }}"> Terug</a>
    </div>
@endsection
