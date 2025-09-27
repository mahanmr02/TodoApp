<?php

namespace App\Http\Controllers\App;

use App\Models\TodoList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function index(){
        if(auth()->check()){
            if(auth()->user()->lists()->count() > 0){
                dd('hi');
                return redirect()->route('app.lists.tasks.index');
            }else{
                return view('app.index');
            }
        }
    }

    public function storeList(Request $request){
        if(auth()->check()){
            $inputs = $request->validate([
                'name' => 'required|string|min:2' 
            ]);
            $inputs['user_id'] = auth()->id();
            $list = TodoList::create($inputs);

            if($list){
                return redirect()->back()->with('success','فهرست با موفقیت ایجاد و آماده درج تسک های شماست.');
            }else{
                return redirect()->back()->with('error','ایجاد فهرست با خطا مواجه شد.');
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function destroyList(TodoList $list){
        $list->jobs()->delete();
        $list->delete();
        if($list){
            return redirect()->back()->with('success', 'فهرست با موفقیت حذف شد.');
        }else{
            return redirect()->back()->with('error', 'حذف فهرست با خطا مواجه شد.');
        }
    }
}
