<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\User;
use App\Models\todoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TodoListController extends Controller
{

    public function index(Request $request)
    {
        $filters = $request->only(['search']);

        $todoLists = TodoList::filter($filters)->latest()->paginate(10);
        return view('admin.lists.index', compact('todoLists'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.lists.create', compact('users'));
    }

    public function store(Request $request)
    {
        $inputs = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|min:3|string'
        ]);

        TodoList::create($inputs);
        return redirect()->route('admin.lists.index')->with('success','لیست با موفقیت ایجاد شد.'); 
    }

    public function show(TodoList $todoList)
    {
        $users = User::all();
        return view('admin.lists.edit', compact('users','todoList'));
    }

    public function edit(TodoList $todoList)
    {
        $users = User::all();
        return view('admin.lists.edit', compact('users', 'todoList'));
    }

    public function update(Request $request,TodoList $todoList)
    {
        $inputs = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|min:3|string'
        ]);

        $todoList->update($inputs);
        return redirect()->route('admin.lists.index')->with('success','لیست با موفقیت ویرایش شد.'); 
    }

    public function destroy(TodoList $todoList){
        $todoList->delete();

        return redirect()->route('admin.lists.index')->with('success','فهرست با موفقیت حذف شد.');
    }
}
