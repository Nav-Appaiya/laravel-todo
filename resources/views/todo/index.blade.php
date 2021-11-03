@extends('todo.layout')
@section('content')
    <div class="row mt-5" style="margin: 50px  0px;">

        <div class="col-lg-12 margin-tb mt-5">
            <div class="pull-left">
                <h2>Nav-Todo with Laravel 8 </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('todo.create') }}"> Nieuwe Todo toevoegen</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($todo as $todoItem)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $todoItem->title }}</td>
                <td>
                    <form action="{{ route('todo.destroy',$todoItem->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('todo.show',$todoItem->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('todo.edit',$todoItem->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
