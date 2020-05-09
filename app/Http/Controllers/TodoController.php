<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Models\Status;
use App\Models\Todo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    use SoftDeletes;

    public function index()
    {

    }

    public function create()
    {
        $statuses = Status::all()->pluck('name', 'id')->prepend('優先度を選択してください', '');

        return view('todos.create', compact('statuses'));
    }

    public function store(CreateTodoRequest $request)
    {
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->status_id = $request->status_id;
        $todo->user_id = $request->user_id;

        $todo->save();

        return redirect()->route('home')->with('success', 'Todoを作成しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    public function edit(Todo $todo)
    {
        $statuses = Status::all()->pluck('name', 'id')->prepend('優先度を選択してください', 'id');

        return view('todos.edit', compact('todo', 'statuses'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->status_id = $request->status_id;
        $todo->user_id = $request->user_id;

        $todo->save();

        return redirect()->route('home')->with('success', 'Todoを更新しました');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->back()->with('info', 'Todoを削除しました');
    }
}
