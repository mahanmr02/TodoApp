<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\User;
use App\Models\TodoJob;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Http\Controllers\Controller;

class TodoJobController extends Controller
{
    public function index(Request $request, TodoList $todoList){
        $filters = $request->only(['search']);

        $todoJobs = $todoList->jobs()->filter($filters)->latest()->paginate(10);
        return view('admin.lists.tasks.index',compact('todoJobs','todoList'));
    }

    public function create(TodoList $todoList)
    {
        $users = User::all();
        return view('admin.lists.tasks.create', compact('users','todoList'));
    }

    public function store(Request $request, TodoList $todoList)
    {
        if($request->input('due_date') !== null){
            $raw = $request->input('due_date');
            $raw .= ':00';
    
            $request->merge([
                'due_date' => Jalalian::fromFormat('Y/m/d H:i:00', $raw)->toCarbon()->toDateTimeString()
            ]);
        }

        $inputs = $request->validate([
            'title' => 'required|min:3|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:todo,doing,done',
            'due_date' => 'nullable|date',
            'description' => 'nullable|max:100'
        ]);
        $inputs['todo_list_id'] = $todoList->id;
        TodoJob::create($inputs);
        return redirect()->route('admin.lists.tasks.index',$todoList)->with('success','تسک با موفقیت ایجاد شد.'); 
    }

    public function edit(TodoList $todoList, TodoJob $todoJob)
    {
        $users = User::all();
        return view('admin.lists.tasks.edit', compact('users', 'todoList', 'todoJob'));
    }

    public function update(Request $request,TodoList $todoList, TodoJob $todoJob)
    {

        if($request->input('due_date') !== null){
            $raw = $request->input('due_date');
            $raw .= ':00';
    
            $request->merge([
                'due_date' => Jalalian::fromFormat('Y/m/d H:i:00', $raw)->toCarbon()->toDateTimeString()
            ]);
        }

        $inputs = $request->validate([
            'title' => 'required|min:3|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:todo,doing,done',
            'due_date' => 'nullable|date',
            'description' => 'nullable|max:100'
        ]);

        $todoJob->update($inputs);
        return redirect()->route('admin.lists.tasks.index',$todoList)->with('success','لیست با موفقیت ویرایش شد.'); 
    }

    public function destroy(TodoList $todoList, TodoJob $todoJob){
        $todoJob->delete();

        return redirect()->route('admin.lists.tasks.index',$todoList)->with('success','فهرست با موفقیت حذف شد.');
    }

    public function changeStatus(TodoList $todoList, TodoJob $todoJob){
        if($todoJob->status == 'todo'){
            $todoJob->status = 'doing';
        }elseif($todoJob->status == 'doing'){
            $todoJob->status = 'done';
        }else{
            $todoJob->status = 'todo';
        }
        $todoJob->save();

        return redirect()->route('admin.lists.tasks.index',$todoList)->with('success','وضعیت تسک با موفقیت تغییر کرد.');
    }
}
