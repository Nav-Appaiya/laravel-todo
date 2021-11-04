@extends('todo.layout')
@section('content')
    <div class="row mt-5" style="margin: 50px  0px;">

        <div class="col-lg-12 margin-tb mt-5">
            <div class="pull">
                <h2><small>Hoii {{ auth()->user()->name  }}, jij bent player {{  auth()->user()->id }}</small> </h2>
                <small>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</small>
            </div>
            <br>
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

    <h2>Jouw Todo's:</h2>
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

    <br>
    <h2>Andere gebruikers en hun Todos:</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Todos</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                   {{ count($user->todos) }}
                </td>
            </tr>
        @endforeach
    </table>

@endsection
