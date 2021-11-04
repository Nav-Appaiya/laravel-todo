<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Mail\DeleteMail;
use App\Models\Todo;
use App\Models\User;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve the todos through the user
        $todo = Auth()->user()->todos;
        $users = User::all();

        return view('todo.index',compact('todo','users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Todo::create($request->all());

        return redirect()->route('todo.index')
            ->with('success','Todo successvol aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todo.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todo.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required',
            'user_id' => 'required'
        ]);

        $todo->update($request->all());
        return redirect()->route('todo.index')
            ->with('success','Todo sucessvol bijgewerkt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        // On todo delete, schedule a job
        dispatch(new SendEmailJob($todo));

        $todo->delete();
        return redirect()->route('todo.index')
            ->with('success','Todo successvol verwijderd');
    }
}
