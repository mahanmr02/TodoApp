<?php

namespace App\Http\Controllers\App;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Http\Controllers\Controller;
use App\Models\TodoJob;

class AppTaskController extends Controller
{
    public function index(){
        $lists = TodoList::latest()->where('user_id',auth()->id())->paginate(6);
        return view('app.tasks.index',compact('lists'));
    }

    public function store(Request $request){

        if($request->input('due_date') !== null){
            $raw = $request->input('due_date');
            $raw .= ':00';
    
            $request->merge([
                'due_date' => Jalalian::fromFormat('Y/m/d H:i:00', $raw)->toCarbon()->toDateTimeString()
            ]);
        }

        $inputs = $request->validate([
            'todo_list_id' => 'exists:todo_lists,id',
            'title' => 'required|min:3|string',
            'description' => 'nullable|string|max:1000',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:todo,doing,done',
            'due_date' => 'nullable|date'
        ]);

        $list = TodoList::find($request->input('todo_list_id'));
        if(!$list || $list->user_id != auth()->id()){
            return redirect()->back()->with('error','شما امکان ایجاد تسک برای این فهرست را ندارید.');
        }

        $job = TodoJob::create($inputs);
        return redirect()->back()->with('success','تسک با موفقیت ایجاد شد.');
    }

    public function changeStatus(TodoJob $task){
        if($task->list->user_id != auth()->id()){
            return redirect()->back()->with('error','شما امکان ویرایش این تسک را ندارید.');
        }
        if($task->status == 'todo'){
            $task->status = 'doing';
        }elseif($task->status == 'doing'){
            $task->status = 'done';
        }else{
            $task->status = 'todo';
        }
        $task->save();

        return redirect()->back()->with('success','وضعیت تسک با موفقیت تغییر کرد.');
    }

    public function update(Request $request, TodoJob $task){
        if($request->input('due_date') !== null){
            $raw = $request->input('due_date');
            $raw .= ':00';
    
            $request->merge([
                'due_date' => Jalalian::fromFormat('Y/m/d H:i:00', $raw)->toCarbon()->toDateTimeString()
            ]);
        }

        $inputs = $request->validate([
            'todo_list_id' => 'exists:todo_lists,id',
            'title' => 'required|min:3|string',
            'description' => 'nullable|string|max:1000',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:todo,doing,done',
            'due_date' => 'nullable|date'
        ]);

        $list = TodoList::find($request->input('todo_list_id'));
        if(!$list || $list->user_id != auth()->id()){
            return redirect()->back()->with('error','شما امکان ویرایش تسک برای این فهرست را ندارید.');
        }

        $task->update($inputs);
        return redirect()->back()->with('success','تسک با موفقیت ویرایش شد.');
    }

    public function destroy(TodoJob $task){
        if($task->list->user_id != auth()->id()){
            return redirect()->back()->with('error','شما امکان حذف این تسک را ندارید.');
        }
        $task->delete();
        return redirect()->back()->with('success','تسک با موفقیت حذف شد.');
    }
}
