<?php

namespace App\Http\Controllers\App;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppListController extends Controller
{

    public function index(TodoList $list){
        $jobs = $list->jobs()->latest()->get();
        return view('app.show',compact('list','jobs'));
    }

    public function update(TodoList $list, Request $request){
        if($list->user_id != auth()->id()){
            return redirect()->back()->with('error','شما امکان ویرایش این فهرست را ندارید.');
        }

        $inputs = $request->validate([
            'name' => 'required|string|min:2'
        ]);

        $list->update($inputs);
        
        if($list){
            return redirect()->back()->with('success','ویرایش فهرست با موفقیت انجام شد.');
        }else{
            return redirect()->back()->with('success','ویرایش فهرست با خطا مواجه شد.');
        }
    }

    public function destroy(TodoList $list){
        $list->jobs()->delete();

        $list->delete();

        if($list){
            return redirect()->back()->with('success','حذف فهرست با موفقیت انجام شد.');
        }
    }
}
